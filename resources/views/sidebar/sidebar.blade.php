
@inject('permission','App\Http\Controllers\PermissionController')
<?php
$data = "$_SERVER[REQUEST_URI]";
?>
<sidebar
    route={{$data}}
    dhaka={{ $permission->canManageDhaka() }}
    user_list={{ $permission->canManageUser() }}

></sidebar>

