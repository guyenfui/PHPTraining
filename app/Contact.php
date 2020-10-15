<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email','phone','address','type','gender', 'message'];

//    use HasFactory;
}
