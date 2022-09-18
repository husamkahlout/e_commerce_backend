@extends('dashboard.layout.master_layout')

@section('title')
@lang('brand.update.edit_brand')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('brand.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('brand.update.brands')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('brand.update.edit_brand')</span></a></li>
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
                                @lang('brand.update.edit_brand')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('brand.update', $brand->id) }}" method="POST" class="m-form m-form--label-align-right" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <div class="col-md-12 text-center">
                                    <img src="{{ $brand->image }}" width="250" alt="">
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('brand.update.image')</label>
                                <div></div>
                                <div class="custom-file col-lg-6">
                                    <input type="file" class="custom-file-input" name="brand_image">
                                    <label class="custom-file-label" for="customFile">@lang('brand.update.image')</label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('brand.update.name'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="brand" id="brand" value="{{ $brand->brand }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('brand.update.name')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('brand.update.name_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="brand_ar" id="brand_ar" value="{{ $brand->brand_ar }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('brand.update.name_ar')>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('brand.update.update')</button>
                                    <a href="{{ route('brand.index') }}" class="btn btn-secondary">@lang('brand.update.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
