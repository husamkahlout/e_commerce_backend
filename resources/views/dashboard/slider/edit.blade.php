@extends('dashboard.layout.master_layout')

@section('title')
    @lang('slider.update.edit_slider')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('slider.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('slider.update.sliders')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('slider.update.edit_slider')</span></a></li>
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
                                @lang('slider.update.edit_slider')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('slider.update', $slider->id) }}"  method="POST" class="m-form m-form--label-align-right" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('slider.update.image')</label>
                                <div></div>
                                <div class="custom-file col-lg-6">
                                    <input type="file" class="custom-file-input" name="slider_image">
                                    <label class="custom-file-label" for="customFile">@lang('slider.update.image')</label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('slider.update.title'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title" id="title" value="{{ $slider->title }}" class="form-control m-input" placeholder=@lang('slider.create.title')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('slider.update.subtitle'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="subtitle" id="subtitle" value="{{ $slider->subtitle }}" class="form-control m-input" placeholder=@lang('slider.update.subtitle')>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('slider.update.title_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title_ar" id="title_ar" value="{{ $slider->title_ar }}" class="form-control m-input" placeholder=@lang('slider.create.title_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('slider.update.subtitle_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="subtitle_ar" id="subtitle_ar" value="{{ $slider->subtitle_ar }}" class="form-control m-input" placeholder=@lang('slider.update.subtitle_ar')>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('slider.update.update')</button>
                                    <a href="{{ route('slider.index') }}" class="btn btn-secondary">@lang('slider.update.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
