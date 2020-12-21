<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //tambah fillable property utk update data
    protected $fillable = ['name','description','price'];

    //training belong to user
    //belongTo sebab ada Foreign Key
    public function user(){
        
        return $this->belongsTo('App\Models\User');
    }
}
