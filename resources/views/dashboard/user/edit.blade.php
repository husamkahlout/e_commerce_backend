@extends('dashboard.layout.master_layout')

@section('title')
    @lang('user.update.edit_user')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('user.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('user.update.users')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('user.update.edit_user')</span></a></li>
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
                                @lang('user.update.edit_user')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('user.update', $user->id) }}"  method="POST" class="m-form m-form--label-align-right">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('user.update.name'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control m-input" placeholder=@lang('user.update.name')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('user.update.email'):</label>
                                <div class="col-lg-6">
                                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control m-input" placeholder=@lang('user.update.email')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('user.update.password'):</label>
                                <div class="col-lg-6">
                                    <input type="password" id="password" name="password" class="form-control m-input" placeholder=@lang('user.update.password')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('user.update.confirm_password'):</label>
                                <div class="col-lg-6">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control m-input" placeholder=@lang('user.update.confirm_password')>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('user.update.update')</button>
                                    <a href="{{ route('user.index') }}" class="btn btn-secondary">@lang('user.update.back')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
