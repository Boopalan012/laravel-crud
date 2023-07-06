<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
     //table name
     protected $table = 'address';
     //attributes of table
     protected $fillable = ['id','doorno','street','district','state'];
     public function student(){
        return $this->belongsTo(students::class,'id');
     }
     
     }

