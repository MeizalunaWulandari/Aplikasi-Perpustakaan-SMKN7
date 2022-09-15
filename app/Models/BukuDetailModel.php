<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuDetailModel extends Model
{
    use HasFactory;

    protected $table = 'tbelib_buku_detail';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
}
