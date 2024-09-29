<?php

namespace App\Http\Controllers; 

use App\Http\Requests\UserRequest;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
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
        return view('create_user', [
            'kelas' => Kelas::all()
        ]);
    }

    public function store(UserRequest $request)
    {
        $validateData = $request->validate([
            'nama'=> 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        // $model = new UserModel;
        // $model->nama = $request->nama;
        // $model->kelas = $request->kelas;
        // $model->npm = $request->npm;
        // $model->save();

        $user = UserModel::create($validateData);
        $user -> load('kelas');
        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas Tidak Ditemukan'
        ]);

        // return redirect('profile');
    }
}
