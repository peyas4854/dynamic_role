<?php

namespace App\Http\Controllers;

use App\Libraries\Permissions;


class PermissionController extends Controller
{
    public $permission_check;

    public function __construct()
    {
        //creating new instance for permission library.
        $this->permission_check = new Permissions();
    }


    public function canSeeDashboard()
    {
        if ($this->permission_check->hasPermission('can_see_dashboard') || $this->permission_check->isAdmin()) {
            return true;

        } else {

            return false;

        }
    }

    public function canManageDhaka()
    {
        if ($this->permission_check->hasPermission('can_manage_dhaka') || $this->permission_check->isAdmin()) {
            return 'manage';

        } else {
            if ($this->permission_check->hasPermission('can_see_dhaka')) {
                return 'read_only';

            } else {
                return 0;

            }
        }
    }

    public function canManageSettings()
    {
        if ($this->permission_check->hasPermission('can_edit_setting') || $this->permission_check->isAdmin()) {
            return 'manage';

        } else {
            if ($this->permission_check->hasPermission('can_see_setting')) {
                return 'read_only';

            } else {
                return 0;

            }
        }
    }

    public function canManageUser()
    {
        if ($this->permission_check->hasPermission('can_edit_user_list') || $this->permission_check->isAdmin()) {
            return 'manage';

        } else {
            if ($this->permission_check->hasPermission('can_see_user_list')) {
                return 'read_only';

            } else {
                return 0;

            }
        }
    }
}
