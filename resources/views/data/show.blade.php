@extends('adminlte::page')

@section('title', 'EO | Reports')

@section('content_header')
    <div class="my-2"></div>
@stop

@section('content')

    <div class="clearfix row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header m-3">
                    <h1 class="card-title text-3xl">
                        <b>EO</b> Reports
                    </h1>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        {{-- <span class="badge badge-primary">Label</span> --}}
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    {{-- <div class="mb-4 row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="col form-inline">
                            Per Page: &nbsp;
                            <select class="form-control" wire:model="perPage">
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="col">
                            <input class="form-control" wire:model.debounce.200ms="searchField" type="text"
                                placeholder="Search">
                        </div>
                    </div>
                </div> --}}
                    @if (optional($reportUsers)->count() > 0)
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table text-center m-b-0 table-bordered">
                                        <thead class="bg-slate-300 text-gray-700">
                                            <tr>
                                                <th width="5%">
                                                    <a href="#">ID</a>
                                                </th>
                                                <th>
                                                    <a href="#" role="button">User</a>
                                                </th>
                                                <th>
                                                    <a href="#" role="button">Report</a>
                                                </th>
                                                <th>
                                                    <a href="#" role="button">Data</a>
                                                </th>
                                                <th width="10%">
                                                    <a href="#">Action</a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reportUsers as $reportUser)
                                                <tr class="hover:bg-slate-100">
                                                    <td>
                                                        {{ $reportUser->id }}
                                                    </td>
                                                    <td>
                                                        {{ $users->where('id', $reportUser->user_id)->pluck('name')->first() }}
                                                    </td>
                                                    <td>
                                                        {{ $reports->find($reportUser->report_id)->name }}
                                                    </td>
                                                    <td>
                                                        @forelse ($reportUser->report_user_data as $data)
                                                            <table class="min-w-full table-sm text-gray-700">
                                                                <tr class="hover:bg-slate-200">
                                                                    <td class="w-1/3 text-left font-bold">
                                                                        {{ optional($reportTypes->find($data->report_type_id))->name }}
                                                                    </td>
                                                                    <td class="w-full text-left">
                                                                        {{ $data->value }}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        @empty
                                                            <div class="text-md font-bold text-red-600">
                                                                No Record Entered
                                                            </div>
                                                        @endforelse
                                                    </td>
                                                    <td width="100">
                                                        <a href="#">
                                                            <button class="btn btn-warning btn-round px-2 py-1 mb-2">
                                                                <i class="fas fa-edit"></i>
                                                                &nbsp;
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <a href="#">
                                                            <button class="btn btn-round btn-danger py-1">
                                                                <i class="fas fa-trash"></i>
                                                                &nbsp;
                                                                Del
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="mt-4 row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="col">
                                        {{ $reportUsers->links() }}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="text-right col text-muted">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @else
                        {{-- If there is no record found in $reportUsers table --}}
                        <div class="clearfix row">
                            <div class="col-lg-12 col-md-12">
                                <div class="body">
                                    <strong> Sorry...! </strong>
                                    <p> No record found in the system. </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- /.card-body -->
                {{-- <div class="card-footer">
                The footer of the card
            </div> --}}
                <!-- /.card-footer -->
            </div>
        </div>
    </div>
    <!-- /.card -->

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
@stop

@section('js')
    <script>
        console.log('Hi There!');
    </script>
@stop
