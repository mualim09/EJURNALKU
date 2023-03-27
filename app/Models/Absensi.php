<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at'];

    public function namasiswa()
    {
        return $this->belongsTo(datasiswa::class, 'usersiswa', 'id');
    }

    public function user()
	{
    	return $this->belongsTo(User::class);
	}

}