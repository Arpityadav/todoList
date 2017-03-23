<?php

namespace Todo\Policies;

use Todo\User;
use Todo\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
