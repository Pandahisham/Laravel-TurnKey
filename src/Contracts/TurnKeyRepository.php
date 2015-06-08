<?php

namespace DraperStudio\TurnKey\Contracts;

interface TurnKeyRepository
{
    /**
     * Remove a user entity and all relationships.
     */
    public function erase($user);
}
