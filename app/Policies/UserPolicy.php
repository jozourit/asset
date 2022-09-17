<?php

namespace App\Policies;

class UserPolicy extends JozourPermissionsPolicy
{
    protected function columnName()
    {
        return 'users';
    }
}
