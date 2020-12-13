<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serve extends Model
{
    protected $table = 'served';
    Protected $fillable = ['name','table_num','order'];
}
