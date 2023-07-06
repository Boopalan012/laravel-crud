<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class students extends Model
{
    use HasFactory;
    //table name
    protected $table = 'students';
    //attributes of table
    protected $fillable = ['name', 'password', 'email', 'phonenumber', 'city'];
    public function address(){
        return $this->hasOne(address::class,'id');
    }
     
}
