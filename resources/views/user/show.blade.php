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
                    <div class="col-md">
                        <div>
                            {{--                            <button type="button" class="btn btn-danger" style="float:right;margin: 0 10px;"--}}
                            {{--                                    data-toggle="modal"--}}
                            {{--                                    data-target="#ModalDelete"--}}
                            {{--                                    onclick="deletefn({{$album->id}})">--}}
                            {{--                                Delete--}}
                            {{--                            </button>--}}
                            <a class="btn btn-danger" href="{{route('delete',$album->id)}}"
                               style="float:right;margin: 0 10px;">
                                delete</a>
                        </div>
                        <div>
                            <a class="btn btn-primary " href="{{route('albums.edit',$album->id)}}"
                               style="float:right;margin: 0 10px;">
                                Edit
                            </a>
                        </div>
                        <h4>{{$album->name}} <small class="text-secondary">({{ $album->images->count() }} photos
                                )</small>
                        </h4>


                    </div>
                </div>
                <div class='container-fluid'>

                    <div class="card-body">
                        @if(! $album->images->isEmpty())
                            <div>
                                <a class="btn btn-primary " href="{{route('albums.add_photo',$album->id)}}"
                                   style="float:right;">
                                    Add photo
                                </a>

                            </div>
                            <div class='row module-row'>

                                @foreach($album->images as $image)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class='card-body module-card-body'>
                                                <img class="img-thumbnail w-100"
                                                     src="{{asset('uploads/'.$image->image)}}"
                                                     alt="image">
                                                <h5>{{$image->name}}</h5>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="container">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <a class="btn btn-success"
                                                   href="{{route('albums.add_photo',$album->id)}}"
                                                   style="float:right;">
                                                    Add photo
                                                </a>
                                            </div>
                                            <h4 style="text-align:center;">It's an empty album ! </h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.delete_modal')
    <script>
        function delete_fn(id) {
            var url = "{{route('albums.delete_album' , ':id')}}";
            url = url.replace(':id', id);
            $.ajax({
                type: "Get",
                url: url,
                datatype: 'JSON',
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        let destroy = "{{route('albums.destroy' , ':id')}}";
                        destroy = destroy.replace(':id', data.data.album.id);
                        $('#delete_form').attr('action', destroy);
                    }
                },
                error: function (reject) {
                    alert(reject);
                }
            });
        }
    </script>
@endsection
