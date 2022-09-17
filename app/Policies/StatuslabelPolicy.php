<?php

namespace App\Policies;

class StatuslabelPolicy extends JozourPermissionsPolicy
{
    protected function columnName()
    {
        return 'statuslabels';
    }
}
