@extends('dashboard.layout.master_layout')

@section('title')
    @lang('setting.setting')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('setting.setting')</span></a></li>
        <li class="m-nav__separator">-</li>
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
                                @lang('setting.setting')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('setting.update') }}"  method="POST" class="m-form m-form--label-align-right">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <div></div>
                                <label for="exampleInputEmail1" class="col-lg-2">@lang('setting.site_image')</label>
                                <div class="custom-file col-lg-6">
                                    <input type="file" name="image" id="image" class="custom-file-input">
                                    <label class="custom-file-label" for="customFile">@lang('setting.site_image')</label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('setting.site_name'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="site_name" id="site_name" value="{{ $setting->site_name }}" class="form-control m-input" placeholder=@lang('setting.site_name')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('setting.site_name_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="site_name_ar" id="site_name_ar" value="{{ $setting->site_name_ar }}" class="form-control m-input" placeholder=@lang('setting.site_name_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('setting.email'):</label>
                                <div class="col-lg-6">
                                    <input type="email" name="email" id="email" value="{{ $setting->email }}" class="form-control m-input" placeholder=@lang('setting.email')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('setting.facebook_url'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="facebook_url" id="facebook_url" value="{{ $setting->facebook_url }}" class="form-control m-input" placeholder=@lang('setting.facebook_url')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('setting.instagram_url'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="instagram_url" id="instagram_url" value="{{ $setting->instagram_url }}" class="form-control m-input" placeholder=@lang('setting.instagram_url')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('setting.linkedin_url'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="linkedin_url" id="linkedin_url" value="{{ $setting->linkedin_url }}" class="form-control m-input" placeholder=@lang('setting.linkedin_url')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('setting.twitter_url'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="twitter_url" id="twitter_url" value="{{ $setting->twitter_url }}" class="form-control m-input" placeholder=@lang('setting.twitter_url')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('setting.phone'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="phone" id="phone" value="{{ $setting->phone }}" class="form-control m-input" placeholder=@lang('setting.phone')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('setting.location'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="location" id="location" value="{{ $setting->location }}" class="form-control m-input" placeholder=@lang('setting.location')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('setting.location_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="location_ar" id="location_ar" value="{{ $setting->location_ar }}" class="form-control m-input" placeholder=@lang('setting.location_ar')>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('setting.save')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
