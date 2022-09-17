<?php

namespace App\Policies;

class DepartmentPolicy extends JozourPermissionsPolicy
{
    protected function columnName()
    {
        return 'departments';
    }
}
