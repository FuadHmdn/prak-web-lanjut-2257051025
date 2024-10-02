<?php

namespace App\Http\Controllers; 

use App\Http\Requests\UserRequest;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{

    public $userModel; 
    public $kelasModel;
    public function __construct(){
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
        // $kelasModel = new Kelas();
        $kelas = $this->kelasModel->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(UserRequest $request)
    {
        $this->userModel->create([ 
            'nama' => $request->input('nama'), 
            'npm' => $request->input('npm'), 
            'kelas_id' => $request->input('kelas_id'), 
            ]); 
        
            return redirect()->to('/user'); 
    }
}
