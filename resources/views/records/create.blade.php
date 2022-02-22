@extends('adminlte::page')

@section('title', 'Create Report Category | EO')

@section('content_header')
    <div class="my-2"></div>
@stop

@section('content')

    <div class="clearfix row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <!-- card-header -->
                <div class="card-header m-3 d-flex flex-column">
                    <h1 class="card-title text-3xl d-block mb-3">
                        <b>Create</b> Report Category
                    </h1>
                </div>
                <!-- /.card-header -->

                <div class="text-center card-body">

                    <div class="container">
                        <form method="POST" action="{{ route('report.store') }}">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-12 col-md-12 col-lg-12 mt-3 px-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend wide-prepend">
                                        <label class="input-group-text overflow-auto" for="name">Enter Report Category
                                            Name:</label>
                                    </div>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        placeholder="Enter Report Category Name">

                                    @error('name')
                                        <p class="text-red-700 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center col-sm-12 my-3">
                                <button class="btn btn-primary btn-round">
                                    Create
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .input-group>.input-group-prepend {
            flex: 0 0 20%;
        }

        .input-group .input-group-text {
            width: 100%;
        }

    </style>
@stop

@section('js')
    <script>
        console.log('Hi There!');
    </script>
@stop
