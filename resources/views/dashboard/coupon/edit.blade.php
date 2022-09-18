@extends('dashboard.layout.master_layout')

@section('title')
    @lang('coupon.update.edit_coupon')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('coupon.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('coupon.update.coupons')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('coupon.update.edit_coupon')</span></a></li>
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
                                @lang('coupon.update.edit_coupon')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('coupon.update', $coupon->id) }}" method="POST" class="m-form m-form--label-align-right">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('coupon.update.code'):</label>
                                <div class="col-lg-3">
                                    <input type="text" name="code" id="code" value="{{ $coupon->code }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('coupon.update.code')>
                                </div>
                                <label for="type" class="col-lg-2 col-form-label">@lang('coupon.update.type'):</label>
                                <select class="col-lg-3 form-control m-input m-input--air m-input--pill" name="type" id="type">
                                    <option value="" disabled selected>Type</option>
                                    <option {{$coupon->type == 'value' ? "selected" : ""}} value="value">Value</option>
                                    <option {{$coupon->type == 'percent_off' ? "selected" : ""}} value="percent_off">Percent Off</option>
                                </select>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('coupon.update.value'):</label>
                                <div class="col-lg-3">
                                    <input type="text" name="value" id="value" value="{{ $coupon->value }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('coupon.update.value')>
                                </div>
                                <label class="col-lg-2 col-form-label">@lang('coupon.update.percent_off'):</label>
                                <div class="col-lg-3">
                                    <input type="text" name="percent_off" id="percent_off" value="{{ $coupon->percent_off }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('coupon.update.percent_off')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('coupon.create.start_date'):</label>
                                <div class="col-lg-2">
                                    <input type="text" id="datepicker" name="start_date" placeholder="MM/DD/YYYY" value="{{ $coupon->start_date }}">
                                </div>
                                <label class="col-lg-2 col-form-label">@lang('coupon.create.end_date'):</label>
                                <div class="col-lg-4">
                                    <input type="text" id="datepicker2" name="end_date" placeholder="MM/DD/YYYY" value="{{ $coupon->end_date }}">
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('coupon.create.repeat_usage'):</label>
                                <select class="col-lg-3 form-control m-input m-input--air m-input--pill" name="repeat_usage" id="repeat_usage">
                                    <option value="" disabled selected>Repeat Usage</option>
                                    <option {{$coupon->repeat_usage == 'allowed' ? "selected" : ""}} value="allowed">Allowed</option>
                                    <option {{$coupon->repeat_usage == 'not_allowed' ? "selected" : ""}} value="not_allowed">Not Allowed</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('coupon.update.update')</button>
                                    <a href="{{ route('coupon.index') }}" class="btn btn-secondary">@lang('coupon.update.back')</a>
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
        if($('#type').val() == 'percent_off') {
            $('#value').hide();
            $('#percent_off').show();
        } else {
            $('#value').show();
            $('#percent_off').hide();
        }
        $('#type').on("change", function() {
            if($('#type').val() == 'percent_off') {
                $('#value').hide();
                $('#percent_off').show();
            } else {
                $('#value').show();
                $('#percent_off').hide();
            }
        });
        console.log($('#type').val());
    </script>
@endsection