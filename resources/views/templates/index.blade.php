@extends('adminlte::page')

@section('title', 'All Report Fields | EO')

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
          <b>Report</b> Templates
        </h1>
      </div>
      <!-- /.card-header -->

      <div class="text-center card-body">
        <div class="container">
          <form method="POST" action="{{ route('report.template.store') }}">
            @csrf
            @method('PUT')
            <div class="col-sm-12 col-md-12 col-lg-12 mt-3">

              <div class="input-group mb-3">
                <div class="input-group-prepend wide-prepend">
                  <label class="input-group-text overflow-auto" for="report">
                    Choose a Report Category:
                  </label>
                </div>
                <select class="form-control overflow-y-auto" name="report_id">
                  @forelse ($unsyncedReports as $report)
                  <option value="{{ $report->id }}">{{ $report->name }}</option>
                  @empty
                  <option disabled selected>No Report Categories Found</option>
                  @endforelse
                </select>

                @error('report_id')
                    <p class="text-red-700 text-sm bg-red-100 py-2">{{ $message }}</p>
                @enderror
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend wide-prepend">
                  <label class="input-group-text overflow-auto" for="template">
                    Choose a Report Template:
                  </label>
                </div>
                <select class="form-control overflow-y-auto" name="report_template_name">
                  @forelse ($unsyncedTemplates as $template)
                  {{-- @dd(basename($template)) --}}
                  <option value="{{ $template }}">{{ ucwords(str_replace('.blade.php', '', $template)) }}</option>
                  @empty
                  <option disabled selected>No template Template Found</option>
                  @endforelse
                </select>

                @error('report_template_name')
                    <p class="text-red-700 text-sm bg-red-100 py-2">{{ $message }}</p>
                @enderror
              </div>

            </div>

            <div class="text-center col-sm-12 my-3">
              <button class="btn btn-primary btn-round px-4">
                <i class="fas fa-link"></i>
                &nbsp;
                Sync Template
              </button>
            </div>

          </form>

          <div class="table-responsive">
            <table class="table text-center m-b-0 table-bordered">
              <thead class="bg-slate-300 text-gray-700">
                <tr>
                  <th width="5%">
                    <a href="#">#</a>
                  </th>
                  <th width="40%" class="text-left">
                    <a href="#" role="button">Report Category</a>
                  </th>
                  <th width="" class="text-left">
                    <a href="#" role="button">Template</a>
                  </th>
                  <th width="15%">
                    <a href="#">Action</a>
                  </th>
                </tr>
              </thead>

              <tbody>
                @foreach ($allTemplates as $template)
                <tr class="hover:bg-slate-100">
                  <td>
                    {{ $loop->iteration }}
                  </td>
                  <td class="text-left">
                    {{ $allReports->where('id', $template->report_id)->first()->name }}
                  </td>
                  <td class="text-left">
                    {{ ucwords(str_replace('.blade.php', '', $template->report_template_name)) }}
                  </td>
                  <td>
                    <a href="{{ route('report.template.delete', $template->id) }}">
                      <button class="btn btn-block rounded bg-red-600 text-white hover:bg-red-700 px-4 py-1">
                        <i class="fas fa-unlink"></i>
                        &nbsp;
                        De-Sync
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
      <!-- card-body -->

      <div class="card-footer">
        {{ $allTemplates->links() }}
      </div>
      <!-- /.card-footer -->

    </div>
    <!-- /.card -->

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
