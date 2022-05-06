@extends('layouts.app')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    <div class="row justify-content-center">

        <div class="col-md-9">

            <div class="card">
                <div class="card-header">
                    <div class="col-md-8">
                        <h4>My Albums <small class="text-secondary">({{ $albums->count() }}
                                )</small>
                        </h4>
                    </div>

                </div>

                <div class='container-fluid'>

                    <div class="card-body">
                        <div>
                            <a class="btn btn-primary " href="{{route('albums.create')}}" style="float:right;">
                                create an album
                            </a>
                        </div>
                        <br>
                        @if(! $albums->isEmpty())
                            {{--                            <div class='col-md-3'>--}}
                            <div class='row module-row'>
                                @foreach($albums as $album)
                                    <div class='col-md-3'>
                                        <div class='card'>
                                            {{--                                                <div class='card-header '>--}}
                                            {{--                                                    <div>{{$album->name}}</div>--}}
                                            {{--                                                </div>--}}
                                            <div class='card-body module-card-body'>
                                                {{--                                                    <h4 style="text-align:center;"></h4>--}}
                                                <div><a href="{{route('albums.show',$album->id)}}"
                                                        style="color:#737373"
                                                        class="nav-link">{{$album->name}}</a></div>

                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                @endforeach

                                {{--                                </div>--}}
                            </div>
                        @else

                            <div class="container">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 style="text-align:center;">Sorry ! You dont have any
                                                albums !</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
