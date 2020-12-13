<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewOrder extends Model
{
    Protected $fillable = ['name','table_num','order'];
    Protected $primarykey = 'id';
}
