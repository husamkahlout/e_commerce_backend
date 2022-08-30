@extends('dashboard.layout.master_layout')

@section('title')
    @lang('size.update.edit_size')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('size.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('size.update.sizes')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('size.update.edit_size')</span></a></li>
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
                                @lang('size.update.edit_size')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('size.update', $size->id) }}" method="POST" class="m-form m-form--label-align-right">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('size.update.size'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="size" id="size" value="{{ $size->size }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('size.update.size')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('size.update.size'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="size_ar" id="size_ar" value="{{ $size->size_ar }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('size.update.size_ar')>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('size.update.update')</button>
                                    <a href="{{ route('size.index') }}" class="btn btn-secondary">@lang('size.update.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
