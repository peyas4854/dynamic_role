@extends('layouts.app')
@inject('permission','App\Http\Controllers\PermissionController')

@section('content')
   <setting

       permission={{ $permission->canManageSettings() }}
   ></setting>
@endsection
