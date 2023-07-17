<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistanceMap extends Model
{
    protected $table = 'yandex_map';

    protected $fillable = ['place'];

    public $timestamps = false;
}
