<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_user extends Model
{
    use HasFactory;

    public function file_data(){
        return $this->belongsTo(File_data::class) ;
    }

    public function user(){
        return $this->belongsTo(User::class) ;
    }
}
