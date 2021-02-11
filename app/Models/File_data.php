<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File_data extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at' => 'datetime:H:i',
        'updated_at' => 'datetime:H:i',
        'delivered_at' => 'datetime:H:i'
    ];
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
    public function ie_data()
    {
        return $this->belongsTo(Ie_data::class);
    }


    public function data_users()
    {
        return $this->hasMany(Data_user::class);
    }

    public function operator()
    {
        return $this->belongsTo(User::class);
    }
}
