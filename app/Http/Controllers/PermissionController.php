<?php

namespace App\Http\Controllers;

use App\Libraries\Permissions;


class PermissionController extends Controller
{
    public function permissionCheck()
    {
        $controller = new Permissions;
        return $controller;
    }
    public function canManageDhaka()
    {
        if ($this->permissionCheck()->hasPermission('can_manage_dhaka') || $this->permissionCheck()->isAdmin()) {
            return 'manage';

        } else {
            if ($this->permissionCheck()->hasPermission('can_see_dhaka')) {
                return 'read_only';

            } else {
                return 0;

            }
        }

    }
}
