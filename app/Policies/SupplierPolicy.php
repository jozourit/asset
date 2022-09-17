<?php

namespace App\Policies;

class SupplierPolicy extends JozourPermissionsPolicy
{
    protected function columnName()
    {
        return 'suppliers';
    }
}
