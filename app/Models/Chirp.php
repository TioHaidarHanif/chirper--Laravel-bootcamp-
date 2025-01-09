<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    // fillable digunakan untuk menentukan field mana saja yang boleh diubah (database)
    protected $fillable = ['message']; 
    //
}
