<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory;
    protected $table = 'tbl_kontrak';
    protected $guarded = ['id_kontrak'];
    public $timestamps = false;
    protected $primaryKey = 'id_kontrak';
    protected $keyType = 'int';
    public $incrementing = false;
}
