<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $guarded = ['id'];
    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function getUser($id = null)
{
    $query = $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                  ->select('user.id', 'user.nama', 'user.npm', 'user.foto', 'kelas.nama_kelas as nama_kelas');

    if ($id) {
        return $query->where('user.id', $id)->first(); // Mengembalikan data user berdasarkan id
    }

    return $query->get();
}

}
