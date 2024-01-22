<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Tip_Bilet',
        'Pret',
        'ID_Event',
        'ID_Participant'

    ];
    public function event()
    {
        return $this->belongsTo(Event::class, 'ID_Event');
    }
    public function participant()
    {
        return $this->belongsTo(Participant::class, 'ID_Participant');
    }
}
