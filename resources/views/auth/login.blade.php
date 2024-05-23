@extends('layouts.auth')

@section('content')
<h1>Login</h1>
<p class="account-subtitle">Access to our dashboard</p>
@if (session('login_error'))
<x-alerts.danger :error="session('login_error')" />
@endif

