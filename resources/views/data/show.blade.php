@extends('adminlte::page')

@section('title', 'Reports | EO')

@section('content_header')
<div class="my-2"></div>
@stop

@section('content')

<div class="clearfix row">
  <div class="col-lg-12 col-md-12">
    <div class="card">
      <!-- card-header -->
      <div class="card-header m-3">
        <h1 class="card-title text-3xl">
          <b>EO</b> Reports
        </h1>
      </div>
      <!-- /.card-header -->

      <!-- card-body -->
      <div class="card-body">
        @if (optional($reportUsers)->count() > 0)
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="table-responsive">
              <table class="table text-center m-b-0 table-bordered">
                <thead class="bg-slate-300 text-gray-700">
                  <tr>
                    <th width="5%">
                      <a href="#">#</a>
                    </th>
                    <th width="12%">
                      <a href="#" role="button">User</a>
                    </th>
                    <th width="12%">
                      <a href="#" role="button">Report</a>
                    </th>
                    <th>
                      <a href="#" role="button">Data</a>
                    </th>
                    <th width="18%">
                      <a href="#">Action</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($reportUsers as $reportUser)
                  <tr class="hover:bg-slate-100">
                    <td>
                      {{ $loop->iteration }}
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
                    <td>
                      @if ($reportUser->report_id == $reportTemplates->where('report_id', $reportUser->report_id)->pluck('report_id')->first())
                      
                      <a href="{{ route('view-report', ['reportName' => str_replace('.blade.php', '', $reportTemplates->where('report_id', $reportUser->report_id)->pluck('report_template')->first()), 'data' => $reportUser->id, 'isChineseEnabled' => 0]) }}">
                        <button class="btn btn-block rounded bg-blue-400 text-white hover:bg-blue-500 py-1 mb-2">
                          <i class="fas fa-eye"></i>
                          &nbsp;
                          View in ENG
                        </button>
                      </a>
                      <a href="{{ route('view-report', ['reportName' => str_replace('.blade.php', '', $reportTemplates->where('report_id', $reportUser->report_id)->pluck('report_template')->first()), 'data' => $reportUser->id, 'isChineseEnabled' => 1]) }}">
                        <button class="btn btn-block rounded bg-blue-400 text-white hover:bg-blue-500 py-1 mb-2">
                          <i class="fas fa-eye"></i>
                          &nbsp;
                          View in ENG & CHN
                        </button>
                      </a>

                      @else

                      <a href="#">
                        <button disabled class="btn btn-block rounded bg-blue-500 text-white hover:bg-blue-600 py-1 mb-2">
                          <i class="fas fa-ban"></i>
                          &nbsp;
                          View Not Available
                        </button>
                      </a>

                      @endif
                      <a href="{{ route('report.data.delete', $reportUser->id) }}">
                        <button class="btn btn-block rounded bg-red-600 text-white hover:bg-red-700 px-4 py-1">
                          <i class="fas fa-trash"></i>
                          &nbsp;
                          Delete
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
