<?php

namespace App\Admin\Model;

use Illuminate\Database\Eloquent\Model;

    class Rol extends Model
    {
        protected $table = "rol";
        protected $guarded = ['id'];
        protected $fillable = ['nombre', 'status'];
    }