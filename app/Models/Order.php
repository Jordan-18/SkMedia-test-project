<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nomor',
        'id_admin',
        'id_transport',
        'id_driver',
        'id_approver',
        'awal_pinjam',
        'akhir_pinjam',
        'bbm_awal', 
        'bbm_akhir', 
        'status', 
    ];
    public function idadmin(){
        return $this->hasOne(User::class,'id','id_admin');
    }
    public function idtransport(){
        return $this->hasOne(Transport::class,'id','id_transport');
    }
    public function iddriver(){
        return $this->hasOne(Driver::class,'id','id_driver');
    }
    public function idapprover(){
        return $this->hasOne(User::class,'id','id_approver');
    }
}
