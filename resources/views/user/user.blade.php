@extends('layouts.app')
@inject('permission','App\Http\Controllers\PermissionController')

@section('content')

   <user-list
       permission={{ $permission->canManageUser() }}

   ></user-list>
@endsection
