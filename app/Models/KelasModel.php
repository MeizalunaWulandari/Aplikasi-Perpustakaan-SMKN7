<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    use HasFactory;

    protected $table = 'tbelib_kelas';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
}
