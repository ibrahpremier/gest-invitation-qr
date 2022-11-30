<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        // 'prenom',
        'table_id',
        'nb_place',
        'telephone',
        'photo',
        'code_unique',
    ];


    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
