<?php

namespace App\Policies;

class LocationPolicy extends JozourPermissionsPolicy
{
    protected function columnName()
    {
        return 'locations';
    }
}
