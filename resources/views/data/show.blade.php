<div class="mb-4 row">
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
            <input class="form-control" wire:model.debounce.200ms="searchField" type="text" placeholder="Search">
        </div>
    </div>

</div>
@if (optional($reportUsers)->count() > 0)
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="table-responsive">
                <table class="table text-center m-b-0 table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="5%"><a href="#">
                                    ID
                                </a>
                            </th>

                            <th width="10%">
                                <a href="#">
                                    Action
                                </a>
                            </th>

                            <th><a href="#" wire:click.prevent="sortBy('title')" role="button">
                                    Title
                                    {{-- @include('includes.sorticons',['field'=> 'title']) --}}
                                </a>
                            </th>
                            <th><a href="#" wire:click.prevent="sortBy('short_code')" role="button">
                                    Short Code
                                    {{-- @include('includes.sorticons',['field'=> 'short_code']) --}}
                                </a>
                            </th>

                            <th><a href="#" wire:click.prevent="sortBy('thumbnail_url')" role="button">
                                    Thumbnail Url
                                    {{-- @include('includes.sorticons',['field'=> 'thumbnail_url']) --}}
                                </a>
                            </th>

                            {{-- <th><a href="#" wire:click.prevent="sortBy('description')" role="button">
                                Description
                                @include('includes.sorticons',['field'=> 'description'])
                            </a>
                        </th> --}}
                            <th><a href="#" wire:click.prevent="sortBy('intro_video')" role="button">
                                    Intro Video
                                    {{-- @include('includes.sorticons',['field'=> 'course_category_id']) --}}
                                </a>
                            </th>

                            <th><a href="#" role="button">
                                    Original Charges

                                </a>
                            </th>

                            <th><a href="#" role="button">
                                    Discounted Charges

                                </a>
                            </th>

                            <th><a href="#" wire:click.prevent="sortBy('course_category_id')" role="button">
                                    Course Category
                                    {{-- @include('includes.sorticons',['field'=> 'course_category_id']) --}}
                                </a>
                            </th>

                            <th><a href="#" wire:click.prevent="sortBy('interval_count')" role="button">
                                    Interval Count
                                    {{-- @include('includes.sorticons',['field'=> 'interval_count']) --}}
                                </a>
                            </th>

                            <th><a href="#" wire:click.prevent="sortBy('course_allowed_period_id')" role="button">
                                    Course Allowed Period
                                    {{-- @include('includes.sorticons',['field'=> 'course_allowed_period_id']) --}}
                                </a>
                            </th>

                            <th><a href="#" wire:click.prevent="sortBy('is_quiz_required')" role="button">
                                    Is Quiz Required
                                    {{-- @include('includes.sorticons',['field'=> 'is_quiz_required']) --}}
                                </a>
                            </th>

                            <th><a href="#" wire:click.prevent="sortBy('is_active')" role="button">
                                    Is Active
                                    {{-- @include('includes.sorticons',['field'=> 'is_active']) --}}
                                </a>
                            </th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($reportUsers as $index => $course)
                            <tr @if (!$course->is_active) class="table-secondary" @endif>

                                {{-- <td>{{$index+1}}</td> --}}
                                <td>{{ $course->id }}</td>
                                <td width="100">
                                    <a href="#Edit">
                                        <button wire:click.prevent="edit({{ $course->id }})"
                                            class="btn btn-xs btn-round btn-primary btn-block mb-1">
                                            Edit</button>

                                    </a>
                                    {{-- @if ($course->is_active)
                            <button wire:click.prevent="disable({{$course->id}})"
                            class="btn btn-xs btn-round btn-warning btn-block">In-Active</button>
                            @else
                            <button wire:click.prevent="enable({{$course->id}})" class="btn btn-xs btn-round btn-success btn-block">Active</button>
                            @endif --}}

                                    <button wire:click.prevent="destroy({{ $course->id }})"
                                        class="btn btn-xs btn-round btn-danger btn-block">Delete</button>

                                </td>

                                <td>{{ $course->title }} </td>
                                <td> {{ $course->short_code }} </td>
                                <td class="pop" data-toggle="tooltip" data-placement="top"
                                    title="{{ $course->thumbnail_url }}">
                                    {!! mb_strimwidth($course->thumbnail_url, 0, 20, '...') !!} </td>
                                {{-- <td> {!! mb_strimwidth($course->description, 0, 100, "...") !!}</td>

                        {!! html_entity_decode($course->description) !!} --}}
                                <td> {{ $course->intro_video }} </td>
                                {{-- <td> {{ $course->charges->where('is_active', true)->pluck('original_charges')->first() }}
                                </td>
                                <td> {{ $course->charges->where('is_active', true)->pluck('discount_charges')->first() }}
                                </td>
                                <td> {{ $courseCategories->where('id', $course->course_category_id)->pluck('title')->first() }}
                                </td>
                                <td> {{ $course->interval_count }} </td>
                                <td> {{ $courseAllowedPeriods->where('id', $course->course_allowed_period_id)->pluck('title')->first() }}
                                </td> --}}
                                <td> {{ $course->is_quiz_required ? 'YES' : 'NO' }} </td>
                                <td> {{ $course->is_active ? 'YES' : 'NO' }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4 row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="col">

                        {{-- {{ $reportUsers->links() }} --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="text-right col text-muted">
                        {{-- Showing {{ $reportUsers->firstItem() }} to {{ $reportUsers->lastItem() }} out of
                        {{ $reportUsers->total() }} results --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@else
    <div class="clearfix row">
        <div class="col-lg-12 col-md-12">
            {{-- <div class="header">
                <h2><strong>Existing</strong> Countries</h2>
            </div> --}}
            <div class="body">
                <strong> Sorry...! </strong>
                <p> No record found in the system. </p>
            </div>

        </div>
    </div>

@endif



{{-- <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-100">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-s font-medium text-black font-bold uppercase tracking-wider">
                                id</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-s font-medium text-black font-bold uppercase tracking-wider">
                                User</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-s font-medium text-black font-bold uppercase tracking-wider">
                                Group</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-s font-medium text-black font-bold uppercase tracking-wider">
                                Data</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($reportUsers as $reportUser)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-black">{{ $reportUser->id }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-700">
                                        {{ $users->where('id', $reportUser->user_id)->pluck('name')->first() }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-700">
                                        {{ optional($reports->find($reportUser->report_id))->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @forelse ($reportUser->report_user_data as $data)
                                        <div class="text-sm font-medium text-gray-700">
                                            <span class="font-bold text-black">
                                                {{ optional($reportTypes->find($data->report_type_id))->name }} :
                                            </span>
                                            {{ $data->value }}
                                        </div>
                                    @empty
                                        <div class="text-sm font-medium text-red-600">
                                            No Record Entered.
                                        </div>
                                    @endforelse
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}
