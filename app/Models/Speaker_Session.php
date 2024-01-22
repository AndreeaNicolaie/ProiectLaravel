<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker_Session extends Model
{
    use HasFactory;
    protected $table = 'speakers_sessions';
    public $fillable =
    [
        'id',
        'ID_Speaker',
        'ID_Sesiune'
    ];
    public function speaker()
    {
        return $this->belongsTo(Speaker::class, 'ID_Speaker','id');
    }
    public function session()
    {
        return $this->belongsTo(Session::class, 'ID_Sesiune','id');
    }
}

