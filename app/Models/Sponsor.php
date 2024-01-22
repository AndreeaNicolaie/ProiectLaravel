<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'id',
        'Nume_Sponsor', 
        'Descriere',
        'Contact_Nume',
        'Contact_Email',
        'Contact_Telefon',
        'ID_Event',

    ];
    public function event()
    {
        return $this->belongsTo(Event::class, 'ID_Event','id');
    }
}