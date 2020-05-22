<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    protected $table = 'logs';
    protected $primaryKey = 'id';
 
    public $timestamps = false;
    
    protected $fillable = [
        'user', 'accion','time','name',
    ];
    
}
