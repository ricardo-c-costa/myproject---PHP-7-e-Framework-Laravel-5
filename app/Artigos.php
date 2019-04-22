<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artigos extends Model
{
    protected $fillable = ['titulo', 'link','user_id'];
}
