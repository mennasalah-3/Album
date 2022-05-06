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

                        <form method="POST" action="{{route('albums.store')}}"
                              autocomplete="off"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Name</label>
                                                <input type="text" name="name"
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
                                        <br>
                                        <div>
                                            <button type="submit"
                                                    class="btn btn-primary">create
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
    {{--    </div>--}}


@endsection
