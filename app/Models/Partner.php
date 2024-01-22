<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nume_Partener', 
        'Descriere',
        'Contact_Nume',
        'Contact_Email',
        'Contact_Telefon',
        'ID_Event',
        'ID_Package',

    ];
    public function package()
    {
        return $this->belongsTo(Package::class, 'ID_Package');
    }
    public function event()
    {
        return $this->belongsTo(Event::class, 'ID_Event');
    }
}
