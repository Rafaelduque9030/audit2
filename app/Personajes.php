<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personajes extends Model
{
    //
    protected $table = 'personajes';
    protected $fillable = ['Foto','Archivo'];// estoy haciendo mass assigment estos atributos
}
