<?php

namespace App\Policies;

class AssetModelPolicy extends JozourPermissionsPolicy
{
    protected function columnName()
    {
        return 'models';
    }
}
