@extends('adminlte::page')

@section('title', 'EO | Add Report')

@section('content_header')
    <h1>Add a New Report</h1>
@stop

@section('content')

<div class="clearfix row">
    <div class="col-lg-12 col-md-12">
        <div class="card ">
            <div class="header m-3" id="head">
                <h2><strong>Add</strong> new course

                </h2>
            </div>
            {{-- <x-alert></x-alert> --}}

            <div class="text-center body">

                <div wire:loading.remove wire:target="edit,update,submit">


                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 pl-3 pr-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend wide-prepend">
                                <label class="input-group-text overflow-auto" for="last_name">Title:</label>
                            </div>
                            <input type="text" name="title" wire:model="title"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ old('title') }}" placeholder="Enter the course title" autofocus>

                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 pl-3 pr-3">
                        <div class="mb-3 input-group">
                            <div class="input-group-prepend wide-prepend">
                                <label class="input-group-text overflow-auto" for="last_name">Short Code
                                    (Optional):</label>
                            </div>
                            <input type="text" name="short_code" wire:model="shortCode"
                                class="form-control {{ $errors->has('shortCode') ? 'is-invalid' : '' }}"
                                placeholder="Enter the course short code e.g EO-ABP">

                            @if ($errors->has('shortCode'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('shortCode') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 pl-3 pr-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend wide-prepend">
                                <label class="input-group-text overflow-auto" for="thumbnailUrl">Thumbnail URL:</label>
                            </div>
                            <input type="text" name="thumbnailUrl" wire:model="thumbnailUrl"
                                class="form-control {{ $errors->has('thumbnailUrl') ? 'is-invalid' : '' }}"
                                value="{{ old('thumbnailUrl') }}" placeholder="E.g https://imgur.com/gallery/3yJxc2x">

                            @if ($errors->has('thumbnailUrl'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('thumbnailUrl') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 mt-3 pl-3 pr-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend wide-prepend">
                                <label class="input-group-text overflow-auto" for="introVideo">Intro Video ID:</label>
                            </div>
                            <input type="text" name="introVideo" wire:model="introVideo"
                                class="form-control {{ $errors->has('introVideo') ? 'is-invalid' : '' }}"
                                value="{{ old('introVideo') }}" placeholder="Vimeo ID E.g 54656526562565">

                            @if ($errors->has('introVideo'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('introVideo') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-12 col-lg-12 pl-3 pr-3">
                        <div class="mb-3 input-group">
                            <div class="input-group-prepend wide-prepend">
                                <label class="input-group-text overflow-auto" for="orignalCharges">Original
                                    Charges($):</label>
                            </div>
                            <input type="text" name="originalCharges" wire:model="originalCharges"
                                class="form-control {{ $errors->has('originalCharges') ? 'is-invalid' : '' }}"
                                placeholder="Please insert the amount in dollars ($)">

                            @if ($errors->has('originalCharges'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('originalCharges') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 pl-3 pr-3">
                        <div class="mb-3 input-group">
                            <div class="input-group-prepend wide-prepend">
                                <label class="input-group-text overflow-auto" for="orignalCharges">Discounted
                                    Charges($):</label>
                            </div>
                            <input type="text" name="discountCharges" wire:model="discountCharges"
                                class="form-control {{ $errors->has('discountCharges') ? 'is-invalid' : '' }}"
                                placeholder="Please insert the amount in dollars ($)">

                            @if ($errors->has('discountCharges'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('discountCharges') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- OTO discount --}}
                    <div class="col-sm-12 col-md-12 col-lg-12 pl-3 pr-3">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 ">
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend wide-prepend" style="width: 30%;">
                                        <label class="input-group-text overflow-auto" for="otoDiscount">OTO
                                            Discounted Price($):</label>
                                    </div>
                                    <input type="text" name="otoDiscount" wire:model="otoDiscount"
                                        class="form-control {{ $errors->has('otoDiscount') ? 'is-invalid' : '' }}"
                                        placeholder="Amount in dollars ($), leave blank if no discount">

                                    @if (!is_null($otoDiscountCalculated) && floatVal($otoDiscountCalculated > 0))
                                        <div class="col-12">
                                            <label class="form-check-label">
                                                OTO discount charges will be {{ $otoDiscountCalculated }}
                                            </label>
                                        </div>
                                    @endif

                                    @if ($errors->has('otoDiscount'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('otoDiscount') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 ">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend wide-prepend" style="width: 30%;">
                                        <label class="input-group-text overflow-auto" for="last_name"> Type:</label>
                                    </div>
                                    <div class="form-control">
                                        <div class="row">
                                            <div class="form-check ml-2">
                                                <input class="form-check-input" id="otoFixed"
                                                    wire:model='isOtoDiscountFixedAmount' type="radio"
                                                    @if ($isOtoDiscountFixedAmount) checked @endif value="1">
                                                <label class="form-check-label" for="otoFixed">
                                                    Fixed Amount
                                                </label>
                                            </div>
                                            <div class="form-check ml-2">
                                                <input class="form-check-input" id="otoPercentage"
                                                    wire:model='isOtoDiscountFixedAmount'
                                                    @if (!$isOtoDiscountFixedAmount) checked @endif type="radio"
                                                    value="0">
                                                <label class="form-check-label" for="otoPercentage">
                                                    Percentage
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row  pr-3 pl-3">
                        <div class="col-sm-6 col-md-6 col-lg-6  ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend wide-prepend" style="width: 30%;">
                                    <label class="input-group-text overflow-auto" for="last_name"> Interval
                                        Count:</label>
                                </div>
                                <input type="text" name="intervalCount" wire:model="intervalCount"
                                    class="form-control {{ $errors->has('intervalCount') ? 'is-invalid' : '' }}"
                                    placeholder="If interval=month, count= 3 then Duration = 90 days (100Years = Lifetime)">

                                @if ($errors->has('intervalCount'))
                                    <div class=" invalid-feedback">
                                        <strong>{{ $errors->first('intervalCount') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend wide-prepend" style="width: 30%;">
                                    <label class="input-group-text overflow-auto" for="last_name"> Allowed Period
                                        Interval:</label>
                                </div>
                                <select
                                    class="form-control {{ $errors->has('courseAllowedPeriodId') ? 'is-invalid' : '' }}"
                                    name="courseAllowedPeriodId" wire:model="courseAllowedPeriodId">
                                    {{-- <option value="" selected>Choose Status</option> --}}

                                    @foreach ($courseAllowedPeriods as $period)
                                        <option value="{{ $period->id }}">{{ $period->title }}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('courseAllowedPeriodId'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('courseAllowedPeriodId') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-12 col-lg-12 pl-3 pr-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend wide-prepend">
                                <label class="input-group-text overflow-auto" for="last_name">Course Category:</label>
                            </div>
                            <select class="form-control {{ $errors->has('courseCategoryId') ? 'is-invalid' : '' }}"
                                name="courseCategoryId" wire:model="courseCategoryId">
                                {{-- <option value="" selected>Choose Status</option> --}}

                                @foreach ($courseCategories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ str_replace('_', ' ', $category->title) }}</option>
                                @endforeach

                            </select>

                            @if ($errors->has('courseCategoryId'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('courseCategoryId') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 pl-3 pr-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend wide-prepend">
                                <label class="input-group-text overflow-auto" for="last_name"> Is Quiz Required?</label>
                            </div>
                            <div class="form-control">
                                <div class="row">
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" id="yesQuiz" wire:model='isQuizRequired'
                                            type="radio" @if ($isQuizRequired) checked @endif value="1">
                                        <label class="form-check-label" for="yesQuiz">
                                            YES
                                        </label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" id="noQuiz" wire:model='isQuizRequired'
                                            @if (!$isQuizRequired) checked @endif type="radio" value="0">
                                        <label class="form-check-label" for="noQuiz">
                                            NO
                                        </label>
                                    </div>

                                </div>
                            </div>


                            @if ($errors->has('isQuizRequired'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('isQuizRequired') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>



                    <div class="col-sm-12 col-md-12 col-lg-12 pl-3 pr-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend wide-prepend">
                                <label class="input-group-text overflow-auto" for="last_name"> Is Active?</label>
                            </div>
                            <div class="form-control">
                                <!-- radio -->
                                <div class="row">
                                    <div class="form-check ml-2">

                                        <input class="form-check-input" id="yesActive" wire:model='isActive'
                                            type="radio" @if ($isActive) checked @endif value="1">
                                        <label class="form-check-label" for="yesActive">
                                            YES
                                        </label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" id="noActive" wire:model='isActive'
                                            type="radio" @if (!$isActive) checked @endif value="0">
                                        <label class="form-check-label" for="noActive">
                                            NO
                                        </label>
                                    </div>

                                </div>
                            </div>

                            @if ($errors->has('isActive'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('isActive') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- {{ $description }}
                    <div wire:ignore wire:model="description" x-data @trix-blur="$dispatch('change',$event.target.value)" class="col-sm-12 col-md-12 col-lg-12 pl-3 pr-3 mb-3">

                        <input id="description" wire:model="description" type="hidden">
                        <trix-editor placeholder="Description..." input="description" class=" text-left form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">
                        </trix-editor>

                    </div> --}}



                    {{-- <x-trix-editor wire:model="description" :initial-value="$description" />
                    @if ($errors->has('description'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                </div>
                @endif --}}

                    {{-- <div wire:ignore class="col-sm-12 col-md-12 col-lg-12 pl-3 pr-3 mb-3">
                        <trix-editor x-data x-on:trix-change="$dispatch('input', event.target.value)"
                            wire:model.debounce.1000ms="description" wire:key="uniqueKey" placeholder="Description..."
                            class="text-left {{ $errors->has('description') ? 'is-invalid' : '' }}">
                </trix-editor>
            </div> --}}




                    {{-- Working Method --}}
                    {{-- <div wire:ignore class="col-sm-12 col-md-12 col-lg-12 pl-3 pr-3 mb-3">
                <input id="description" name="description" type="hidden" value="{{ $description }}">
            <trix-editor input="description" wire:key="uniqueKey" placeholder="Enter the course's detailed description" class="text-left {{ $errors->has('description') ? 'is-invalid' : '' }}">
            </trix-editor>
        </div> --}}
                    {{-- {{ $description }} --}}
                    <div>
                        <div wire:model.debounce.365ms="description" wire:ignore
                            class="col-sm-12 col-md-12 col-lg-12 pl-3 pr-3 mb-3">
                            <input id="description" name="description" type="hidden" value="{{ $description }}">
                            <trix-editor input="description" placeholder="Enter the course's detailed description"
                                class="text-left {{ $errors->has('description') ? 'is-invalid' : '' }}">
                            </trix-editor>
                        </div>
                    </div>

                    @if ($errors->has('description'))
                        <div class="invalid-feedback text-left ml-3">
                            <strong>{{ $errors->first('description') }}</strong>
                        </div>
                    @endif




                    <div class="text-center col-sm-12 mb-3">

                        <button wire:click="submit()" class="btn btn-primary btn-round">
                            Submit
                        </button>

                        <button wire:click="cancel()" class="btn btn-danger btn-round">
                            Cancel
                        </button>
                    </div>
                </div>

                <div wire:target="edit,update,submit" wire:loading class="m-5">
                    <div class="spinner-grow" style="width: 5rem; height: 5rem;" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div> {{-- body --}}
        </div>
    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi There!');
    </script>
@stop
