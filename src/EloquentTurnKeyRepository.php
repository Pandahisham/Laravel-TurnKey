<?php

namespace DraperStudio\TurnKey;

use DraperStudio\TurnKey\Contracts\TurnKeyRepository;

class EloquentTurnKeyRepository implements TurnKeyRepository
{
    /**
     * Remove a user entity and all relationships.
     */
    public function erase($userId)
    {
        $model = app()->make(config('turnkey.model'));

        return $model->find($userId)->delete();
    }
}
