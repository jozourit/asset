<?php

namespace App\Policies;

class CustomFieldsetPolicy extends JozourPermissionsPolicy
{
    protected function columnName()
    {
        /**
         * Proxy the authorization for custom fieldsets down to custom fields.
         * This allows us to use the existing permissions in use and have more
         * semantically correct authorization checks for custom fieldsets.
         *
         * See: https://github.com/jozour/jozour-it/pull/5795
         */
        return 'customfields';
    }
}