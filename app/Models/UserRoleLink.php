<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoleLink extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'authority_id',
        'user_id'
    ];

    public function userData()
    {
        return $this->belongsTo(UserData::class, 'user_id', 'userid');
    }
}
