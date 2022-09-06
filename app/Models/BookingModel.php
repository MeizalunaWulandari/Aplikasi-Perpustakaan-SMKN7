<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;

    protected $table = 'tbelib_booking';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
