<?php

namespace App\Policies;

class CategoryPolicy extends JozourPermissionsPolicy
{
    protected function columnName()
    {
        return 'categories';
    }
}
