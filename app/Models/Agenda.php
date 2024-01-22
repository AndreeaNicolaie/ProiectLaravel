<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_Event',
        'Nume_Sesiune',
        'Ora_Start',
        'Ora_Finish',
        'Descriere',
    ];
    protected $casts = [
        'Data_Start' => 'datetime',
        'Data_Finish' => 'datetime',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class, 'ID_Event', 'id'); 
    }
}
