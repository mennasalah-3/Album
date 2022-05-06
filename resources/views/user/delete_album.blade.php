@extends('layouts.app')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-8">

                    <div class="card">
                        {{-- create modal start --}}
                        <div class="card-header">
                            <div class="col-sm-6 p-md-0">
                                <div class="welcome-text">
                                    <h4>New album</h4>
                                </div>
                            </div>
                        </div>

                        <form method="POST" id="from1"
                              autocomplete="off" action="{{route('albums.destroy' ,$album->id)}}"
                              enctype="multipart/form-data">
                            @csrf
                            {{ method_field('delete') }}


                            <input type="hidden" name="album_id" value="{{$album->id}}">

                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="form-row">
                                            <div class="form-row col-md-12">

                                                <div class="form-check col-md-12">
                                                    <input class="form-check-input" type="radio" name="option"
                                                           id="option" value="move">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Move the photos to another album?
                                                    </label>
                                                </div>
                                                {{--                                                <div class="form-row  col-md-12">--}}
                                                {{--                                                    <h5>OR</h5>--}}
                                                {{--                                                </div>--}}
                                                <div class="form-check col-md-12">
                                                    <input class="form-check-input" type="radio" value="delete"
                                                           name="option"
                                                           id="flexRadioDefault2" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Delete all photos ?
                                                    </label>
                                                </div>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-danger" onclick="fn()" name="sub"
                                            >Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function fn() {
            document.querySelector('#from1').addEventListener('submit', function (e) {
                var form = this;
                swal('Are you sure you want to do this?').then(function (isConfirm) {
                    if (isConfirm) {
                        form.submit();
                    }
                });
            });
        }
        {{--        function confirmation() {--}}
        {{--            var result = confirm("Are you sure to delete?");--}}
        {{--            if (result) {--}}
        {{--                value = $('input[name="option"]:checked').val();--}}
        {{--                var url = "{{route('albums.delete_album' , ':id')}}";--}}
        {{--                url = url.replace(':id', {{$album->id}});--}}
        {{--                if (value == "delete") {--}}
        {{--                    $.ajax({--}}
        {{--                        type: "Get",--}}
        {{--                        url: url,--}}
        {{--                        datatype: 'JSON',--}}
        {{--                        success: function (data) {--}}
        {{--                            console.log(data);--}}
        {{--                            if (data.status == true) {--}}
        {{--                                let destroy = "{{route('albums.destroy' , ':id')}}";--}}
        {{--                                destroy = destroy.replace(':id', data.data.album.id);--}}
        {{--                                console.log(destroy);--}}
        {{--                                $('#delete_form').attr('action', destroy);--}}
        {{--                            }--}}
        {{--                        },--}}
        {{--                        error: function (reject) {--}}
        {{--                            alert(reject);--}}
        {{--                        }--}}
        {{--                    });--}}
        {{--                }--}}
        {{--                // Delete logic goes here--}}

        {{--            }--}}
        {{--        }--}}
    </script>

@endsection
