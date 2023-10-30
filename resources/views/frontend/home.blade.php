@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
<div class="d-flex gap-2">
    <div class="btn btn-primary">
        <form role="form" method="get" action="{{ route('login') }}" id="login-form">
            @csrf
            <a href="{{ route('login') }}"
               onclick="event.preventDefault(); document.getElementById('login-form').submit();"
               class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Log in</span>
            </a>
        </form>
    </div>

    @auth
    <div class="btn btn-danger">
        <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
            @csrf
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Log out</span>
            </a>
        </form>
    </div>
    @endauth

</div>
@endsection
