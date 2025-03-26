<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory, Notifiable;
    protected $fillable=["name","brand"];
    //
}
