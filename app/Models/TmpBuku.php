<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmpBuku extends Model
{
    use HasFactory;

    protected $table = 'tmp_buku';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;
}
