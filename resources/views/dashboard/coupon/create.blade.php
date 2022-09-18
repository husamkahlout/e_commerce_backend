@extends('dashboard.layout.master_layout')

@section('title')
    @lang('coupon.create.add_new')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('coupon.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('coupon.create.coupons')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('coupon.create.add_new')</span></a></li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                @lang('coupon.create.add_new')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('coupon.store') }}" method="POST" class="m-form m-form--label-align-right">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('coupon.create.code'):</label>
                                <div class="col-md-3">
                                    <input type="text" name="code" id="code" value="{{ old('code') }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('coupon.create.code')>
                                </div>
                                <label for="type" class="col-lg-2 col-form-label">@lang('coupon.create.type'):</label>
                                <select class="col-lg-3 form-control m-input m-input--air m-input--pill" name="type" id="type">
                                    <option value="" disabled selected>Type</option>
                                    <option {{old('type') == "value" ? "selected" : ""}} value="value">Value</option>
                                    <option {{old('type') == "percent_off" ? "selected" : ""}} value="percent_off">Percent Off</option>
                                </select>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('coupon.create.value'):</label>
                                <div class="col-lg-3">
                                    <input type="text" name="value" id="value" value="{{ old('value') }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('coupon.create.value')>
                                </div>
                                <label class="col-lg-2 col-form-label">@lang('coupon.create.percent_off'):</label>
                                <div class="col-lg-3">
                                    <input type="text" name="percent_off" id="percent_off" value="{{ old('percent_off') }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('coupon.create.percent_off')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('coupon.create.start_date'):</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" id="datepicker" value="{{ old('start_date') }}" autocomplete="off" name="start_date" class="form-control" placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                                <label class="col-lg-2 col-form-label">@lang('coupon.create.end_date'):</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('end_date') }}" id="datepicker2" autocomplete="off" name="end_date" class="form-control" placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('coupon.create.repeat_usage'):</label>
                                <select class="col-lg-3 form-control m-input m-input--air m-input--pill" name="repeat_usage" id="repeat_usage">
                                    <option value="" disabled selected>Repeat Usage</option>
                                    <option {{old('repeat_usage') == "allowed" ? "selected" : ""}} value="allowed">Allowed</option>
                                    <option {{old('repeat_usage') == "not_allowed" ? "selected" : ""}} value="not_allowed">Not Allowed</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('coupon.create.save')</button>
                                    <a href="{{ route('coupon.index') }}" class="btn btn-secondary">@lang('coupon.create.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#type').on("change", function() {
            if($('#type').val() == 'percent_off') {
                $('#value').hide();
                $('#percent_off').show();
            } else {
                $('#value').show();
                $('#percent_off').hide();
            }
            console.log($('#type').val());
        });
    </script>
@endsection