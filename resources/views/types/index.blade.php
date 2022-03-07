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
          <b>All</b> Report Fields
        </h1>

        <div class="row mt-3 mb-1">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="col d-flex mb-3 px-0">
              <input class="form-control mr-4" type="search" name="search" placeholder="Search..." value="{{ request('search') }}">
              <div class="text-center">
                <button class="btn btn-primary btn-round px-4">
                  Search
                </button>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.card-header -->

      <div class="text-center card-body">

        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="table-responsive">
              <table class="table table-bordered text-center mb-0">
                <thead class="bg-slate-300 text-gray-700">
                  <tr>
                    <th width="5%">#</th>
                    <th class="text-left">Report Name</th>
                    <th class="text-left">Report Field</th>
                    <th class="text-left">Report Description</th>
                    <th width="12%" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($types as $key => $type)
                  <tr class="hover:bg-slate-100">
                    <td>{{ $types->firstItem() + $key }}</td>
                    <td class="text-left">{{ $type->report->name . '(' . $type->report->id . ')' }}</td>
                    <td class="text-left">{{ $type->name }}</td>
                    <td class="text-left">{{ $type->description }}</td>
                    <td class="text-center">
                      <a href="{{ route('report.type.edit', $type->id) }}">
                        <button class="btn btn-block rounded bg-yellow-400 hover:bg-yellow-500 mb-2">
                          <i class="fas fa-edit"></i>
                          &nbsp; Edit
                        </button>
                      </a>
                      <a href="{{ route('report.type.delete', $type->id) }}">
                        <button class="btn btn-block rounded bg-red-600 text-white hover:bg-red-700">
                          <i class="fas fa-trash">
                            &nbsp; Del
                          </i>
                        </button>
                      </a>
                    </td>
                  </tr>
                  @empty
                  <tr class="bg-red-400 text-center text-gray-900 text-lg font-bold rounded py-5 m-3">
                    <td colspan="5">
                      <h2>No Record Found</h2>
                    </td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- card-body -->

      <div class="card-footer">
        <div class="mx-2">
          {{ $types->links() }}
        </div>
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
