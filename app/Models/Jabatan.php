<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'tbl_jabatan';
    protected $guarded = ['id_jabatan'];
    public $timestamps = false;
    protected $primaryKey = 'id_jabatan';
    protected $keyType = 'int';
    public $incrementing = false;
}
