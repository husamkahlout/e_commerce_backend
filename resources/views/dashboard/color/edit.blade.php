@extends('dashboard.layout.master_layout')

@section('title')
    @lang('color.update.edit_color')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('color.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('color.update.colors')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('color.update.edit_color')</span></a></li>
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
                                @lang('color.update.edit_color')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('color.update', $color->id) }}" method="POST" class="m-form m-form--label-align-right">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('color.update.color_name'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="color_name" id="color_name" value="{{ $color->color_name }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('color.update.color_name')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('color.update.color_name_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="color_name_ar" id="color_name_ar" value="{{ $color->color_name_ar }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('color.update.color_name_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('color.update.color'):</label>
                                <div class="col-lg-6">
                                    <input type="color" name="color" id="color" value="{{ $color->color }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('color.update.color')>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('color.update.update')</button>
                                    <a href="{{ route('color.index') }}" class="btn btn-secondary">@lang('color.update.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
