@inject('permission','App\Http\Controllers\PermissionController')

@extends('layouts.app')

@section('content')

    <example-component

        permission={{ $permission->canSeeDashboard() }}
    ></example-component>
@endsection
