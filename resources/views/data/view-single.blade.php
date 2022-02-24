@extends('adminlte::page')

@section('title', 'View Report | EO')

@section('content_header')
    <div class="my-2"></div>
@stop

@section('content')

    <div class="clearfix row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header m-3">
                    <h1 class="card-title text-3xl">
                        <b>EO</b> Single Report View
                    </h1>
                </div>
                <!-- /.card-header -->

                <div class="text-center card-body">
                    <div>
                        <div class="form-group">

                            <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend wide-prepend">
                                        <label class="input-group-text overflow-auto"
                                            for="user">User Name:</label>
                                    </div>
                                    <input type="text" name="user" class="form-control bg-light" disabled
                                        value="{{ $user->name }}">

                                    <input type="hidden" name="report_id" value="{{ $singleReport->report_id }}">

                                </div>
                            </div>

                            @foreach ($singleReportType as $type)
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend wide-prepend">
                                            <label class="input-group-text overflow-auto"
                                                for="report_type">{{ $type->name }}:</label>
                                        </div>
                                        <input type="text" name="{{ $type->id }}" class="form-control bg-light" disabled
                                            value="{{ $reportData->where('report_user_id', $singleReport->id)->where('report_type_id', $type->id)->first()->value ?? '' }}">

                                        <input type="hidden" name="report_id" value="{{ $singleReport->report_id }}">

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="css/admin_custom.css">
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
