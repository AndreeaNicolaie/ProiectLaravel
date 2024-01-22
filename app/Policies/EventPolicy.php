<?php

namespace App\Policies;
use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    // EventPolicy.php

public function update(User $user, Event $event)
{
    // Verifică dacă utilizatorul este administrator
    return $user->hasRole('admin');
}

public function delete(User $user, Event $event)
{
    // Verifică dacă utilizatorul este administrator
    return $user->hasRole('admin');
}

}
