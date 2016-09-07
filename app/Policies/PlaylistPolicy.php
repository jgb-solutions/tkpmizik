<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Playlist;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlaylistPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Playlist $playlist)
    {
        return $user->id === $playlist->user_id || $user->admin;
    }
}
