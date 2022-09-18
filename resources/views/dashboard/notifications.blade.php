@extends('dashboard.layout.master_layout')

@section('title')
    @lang('notification.notifications')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><span class="m-nav__link-text">@lang('notification.notifications')</span></li>
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
                                @lang('notification.push_notification')
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form action="{{ route('send-notification') }}" method="POST" style="margin-top: 26px;" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('notification.image')</label>
                                <div></div>
                                <div class="custom-file col-lg-6">
                                    <input type="file" class="custom-file-input" name="notification_image">
                                    <label class="custom-file-label" for="customFile">@lang('notification.image')</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="form-group col-md-5">
                                    <label>@lang('notification.title')</label>
                                    <input type="text" class="form-control" name="title">
                                </div>

                                <div class="form-group col-md-5">
                                    <label>@lang('notification.title_ar')</label>
                                    <input type="text" class="form-control" name="title_ar">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="form-group col-md-5">
                                    <label>@lang('notification.body')</label>
                                    <textarea class="form-control" name="body" style="height: 150px;"></textarea>
                                </div>
    
                                <div class="form-group col-md-5">
                                    <label>@lang('notification.body_ar')</label>
                                    <textarea class="form-control" name="body_ar" style="height: 150px;"></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success" style="width: 250px;">@lang('notification.send_notification')</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
