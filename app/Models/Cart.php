<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Protect against mass assignment
    protected $fillable = [
        'user_id',
        'ticket_id',
        'quantity',
        'price'
    ];

    /**
     * Define the relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship with the Ticket model.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * Get the total price for the cart item.
     */
    public function getTotalAttribute()
    {
        return $this->quantity * $this->price;
    }
}
