<?php

namespace App\Policies;

class ManufacturerPolicy extends JozourPermissionsPolicy
{
    protected function columnName()
    {
        return 'manufacturers';
    }
}
