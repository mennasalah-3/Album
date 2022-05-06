@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-2">

                <div class="card">
                    <ul class="navbar-nav " style="text-align: center;" id="menu">
                        <li class="nav-item">
                            <a href="{{route('albums.index')}}" class="nav-link" style="color:#737373">Albums</a>

                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
