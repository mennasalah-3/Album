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
                        <h4>My Albums <small class="text-secondary">({{ auth()->user()->albums->count() }}
                                )</small>
                        </h4>
                    </div>

                </div>

                <div class='container-fluid'>

                    <div class="card-body">

                        <br>
                        <form method="POST" action="{{route('albums.store_photos',$album->id)}}"
                              autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="option" value="delete">

                            @if(! auth()->user()->albums->isEmpty())
                                {{--                            <div class='col-md-3'>--}}
                                <div class='row module-row'>
                                    @foreach(auth()->user()->albums as $albums)
                                        @if($albums->id != $album->id)

                                            <div class='col-md-3'>
                                                <div class='card'>
                                                    {{--                                                <div class='card-header '>--}}
                                                    {{--                                                    <div>{{$album->name}}</div>--}}
                                                    {{--                                                </div>--}}
                                                    <div class='card-body module-card-body'>
                                                        {{--                                                    <h4 style="text-align:center;"></h4>--}}
                                                        <div><input class="form-check-input" type="radio" name="id"
                                                                    id="option" value="{{$albums->id}}">
                                                            {{$albums->name}}
                                                        </div>

                                                    </div>

                                                </div>
                                                <br>
                                            </div>
                                        @endif

                                    @endforeach

                                    {{--                                </div>--}}
                                </div>
                                <br>
                                <button type="submit"
                                        class="btn btn-primary">Move
                                </button>
                        </form>

                    </div>

                    @else

                        <div class="container">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 style="text-align:center;">Sorry ! You dont have any other
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

@endsection
