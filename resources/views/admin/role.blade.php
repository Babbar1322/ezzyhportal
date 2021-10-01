
@extends('layouts.admin_app')
@section('content')


$user = $request->user();

print_r()
dd($user->hasRole('developer')); //will return true, if user has role
dd($user->givePermissionsTo('create-tasks'));// will return permission, if not null
dd($user->can('create-tasks')); // will return true, if user has permission

@endsection