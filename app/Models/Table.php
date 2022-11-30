<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'place',
        'disponible'
    ];


    public function invites()
    {
        return $this->hasMany(Invite::class);
    }
}
