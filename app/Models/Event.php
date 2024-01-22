<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Nume_Eveniment',
        'Descriere',
        'Image_path',
        'Data_Start',
        'Data_Finish',
        'Locatie',
        'Numar_Participant_Maxim',
    ];
    protected $casts = [
        'Data_Start' => 'datetime',
        'Data_Finish' => 'datetime',
    ];

}
