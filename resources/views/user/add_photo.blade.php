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
                        <form method="POST" action="{{route('albums.store_photo')}}"
                              autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="album_id" value="{{$album->id}}">
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="basic-form">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>image</label>
                                                <input type="file" name="image" required
                                                       class="form-control image @error('image') is-invalid @enderror"
                                                       >
                                                @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
{{--                                            <div class="form-row">--}}
{{--                                                <output id='result' class="row"/>--}}
{{--                                            </div>--}}
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Name</label>
                                                <input type="text" name="name" required
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       value="{{ old('name') }}"
                                                       placeholder="name">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit"
                                            class="btn btn-primary">create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
{{--<script>--}}
{{--    window.onload = function () {--}}
{{--        //Check File API support--}}
{{--        if (window.File && window.FileList && window.FileReader) {--}}
{{--            var filesInput = document.getElementById("files");--}}
{{--            // console.log(filesInput.value);--}}
{{--            filesInput.addEventListener("change", function (event) {--}}

{{--                var files = event.target.files; //FileList object--}}
{{--                document.getElementById("result").innerHTML = "";--}}
{{--                // output.className='row';--}}
{{--                var output = document.getElementById("result");--}}

{{--                for (var i = 0; i < files.length; i++) {--}}
{{--                    var file = files[i];--}}
{{--                    //Only pics--}}
{{--                    if (!file.type.match('image'))--}}
{{--                        continue;--}}
{{--                    var picReader = new FileReader();--}}
{{--                    picReader.addEventListener("load", function (event) {--}}
{{--                        var picFile = event.target;--}}
{{--                        var div = document.createElement("div");--}}
{{--                        div.className = 'col-md-3';--}}
{{--                        div.innerHTML = "<img class='img-thumbnail w-100' src='" + picFile.result + "'" +--}}
{{--                            "title='" + picFile.name + "'/>";--}}
{{--                        output.insertBefore(div, null);--}}
{{--                    });--}}
{{--                    //Read the image--}}
{{--                    picReader.readAsDataURL(file);--}}
{{--                }--}}
{{--            });--}}
{{--        } else {--}}
{{--            console.log("Your browser does not support File API");--}}
{{--        }--}}
{{--        document.getElementById('close').onclick = function () {--}}
{{--            this.parentNode.parentNode.parentNode--}}
{{--                .removeChild(this.parentNode.parentNode);--}}
{{--            return false;--}}
{{--        };--}}
{{--    }--}}

{{--    --}}{{--    <script>--}}
{{--    --}}{{--        $(".multi-select").select2()--}}
{{--    --}}{{--    </script>--}}
{{--</script>--}}
