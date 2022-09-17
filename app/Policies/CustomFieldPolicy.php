<?php

namespace App\Policies;

class CustomFieldPolicy extends JozourPermissionsPolicy
{
    protected function columnName()
    {
        return 'customfields';
    }
}
