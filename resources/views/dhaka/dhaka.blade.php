@extends('layouts.app')
@inject('permission','App\Http\Controllers\PermissionController')
@section('content')
    <dhaka
        permission={{ $permission->canManageDhaka() }}
    ></dhaka>
@endsection
