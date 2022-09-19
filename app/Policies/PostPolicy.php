<?php

namespace App\Policies;

use App\Models\PostModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, PostModel $post){
        return $user->id === $post->user_id;
    }
}
