<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'tbl_pegawai';
    protected $guarded = ['nik'];
    public $timestamps = false;
    protected $primaryKey = 'nik';
    protected $keyType = 'int';
    public $incrementing = false;
}
