<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountModel extends Model
{
    use HasFactory;

    protected $table = 'tbelib_count';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
