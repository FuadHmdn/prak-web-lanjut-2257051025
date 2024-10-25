<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\Models\JurusanModels;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{

    public $userModel;
    public $kelasModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $users = $this->userModel->getUser();

        $data = [
            'title' => 'Create User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function profile($nama = "", $kelas = "", $npm =
    "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];

        return view('profile', $data);
    }

    public function create()
    {
        $kelas = $this->kelasModel->getKelas();
        $jurusanModel = new JurusanModels();
        $jurusan = $jurusanModel->getJurusan();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
            'jurusan' => $jurusan,
        ];

        return view('create_user', $data);
    }

    public function store(UserRequest $request)
    {
        $request->validate([
            'nama' => 'required',
            'npm' => 'required',
            'kelas_id' => 'required',
            'jurusan_id' => 'required',
            'foto' => 'image|file|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $request->foto->extension();
            $file->move(public_path('uploads'), $filename);
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'jurusan_id' => $request->input('jurusan_id'),
            'foto' => isset($filename) ? 'uploads/' . $filename : null,
        ]);

        return redirect()->to('/user')->with('success', 'User Berhasil dibuat');
    }

    public function show($id)
    {
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];

        return view('profile', $data);
    }

    public function edit($id)
    {

        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(UserRequest $request, $id)
    {

        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $user->foto = 'uploads/' . $fileName;
        }

        $user->save();

        return redirect()->route('users.list')->with('sucess', 'User update successfully');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('users.list')->with('success', 'User has been deleted successfully');
    }
}
