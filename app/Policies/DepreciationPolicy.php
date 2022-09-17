<?php

namespace App\Policies;

class DepreciationPolicy extends JozourPermissionsPolicy
{
    protected function columnName()
    {
        return 'depreciations';
    }
}
