<?php

namespace App\Policies;

class CompanyPolicy extends JozourPermissionsPolicy
{
    protected function columnName()
    {
        return 'companies';
    }
}
