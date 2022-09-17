<?php

namespace App\Policies;

class PredefinedKitPolicy extends JozourPermissionsPolicy
{
    protected function columnName()
    {
        return 'kits';
    }
}
