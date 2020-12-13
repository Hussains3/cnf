<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File_data extends Model
{
    use HasFactory;

    public function agent(){
        return $this->belongsTo(Agent::class) ;
    }
    public function ie_data(){
        return $this->belongsTo(Ie_data::class) ;
    }


    public function data_users(){
        return $this->hasMany(Data_user::class) ;
    }

}
