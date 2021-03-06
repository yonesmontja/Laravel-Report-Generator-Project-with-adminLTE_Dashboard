@extends('adminlte::page')

@section('title', 'Generate Report | EO')

@section('content_header')
    <div class="my-2"></div>
@stop

@section('content')

    <div class="clearfix row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header m-3">
                    <h1 class="card-title text-3xl">
                        <b>Add</b> New Report
                    </h1>
                </div>
                <!-- /.card-header -->

                <div class="text-center card-body">

                    <div class="container px-0">
                        <form action="{{ route('report.data.index') }}" method="get">
                            <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend wide-prepend">
                                        <label class="input-group-text overflow-auto" for="report">
                                            Choose a Report Category:
                                        </label>
                                    </div>
                                    <select class="form-control overflow-y-auto" name="report">
                                        @forelse ($allReports as $report)
                                            <option value="{{ $report->id }}"
                                                @if ($report->id == request('report')) selected @elseif($report->id == old('report')) selected @endif>
                                                {{ $report->name }}
                                            </option>
                                        @empty
                                            <option disabled>No Reports Found</option>
                                        @endforelse
                                    </select>
                                </div>

                                <button class="btn btn-primary btn-round px-3">
                                    Show Form
                                </button>
                            </div>
                        </form>
                    </div>

                    <div>
                        <form method="POST" action="{{ route('report.data.store') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                @forelse ($allTypes as $type)
                                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend wide-prepend">
                                                <label class="input-group-text overflow-auto"
                                                    for="report_type">{{ $type->name }}:</label>
                                            </div>
                                            <input type="text" name="{{ $type->id }}" required class="form-control"
                                                placeholder="Enter {{ $type->name }}">

                                            <input type="hidden" name="report_id" value="{{ request('report') }}">
                                        </div>
                                    </div>
                                @empty
                                    <h3
                                        class="bg-red-400 text-center text-gray-900 text-lg font-bold rounded py-5 mt-5 mb-3 mx-3">
                                        This Report Has No Fields.<br>
                                        Or Click On <span class="underline">Show Form</span> Button To Show The Form.
                                    </h3>
                                @endforelse
                            </div>

                            @if (!$allTypes->isEmpty())
                                <div class="text-center col-sm-12 mb-3">
                                    <button class="btn btn-primary btn-round">
                                        Submit
                                    </button>
                                </div>
                            @endif

                        </form>
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
            flex: 0 0 25%;
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
