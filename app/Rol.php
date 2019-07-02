<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $primaryKey = 'idrol';
    protected $fillable = ['nombre','descripcion','estado'];
    public $timestamps = false;
}
