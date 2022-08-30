@extends('dashboard.layout.master_layout')

@section('title')
    @lang('admin.update.edit_admin')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('admin.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('admin.update.admins')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('admin.update.edit_admin')</span></a></li>
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
                                @lang('admin.update.edit_admin')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.update', $admin->id) }}"  method="POST" class="m-form m-form--label-align-right">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('admin.update.name'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="name" id="name" value="{{ $admin->name }}" class="form-control m-input" placeholder=@lang('admin.update.name')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('admin.update.email'):</label>
                                <div class="col-lg-6">
                                    <input type="email" name="email" id="email" value="{{ $admin->email }}" class="form-control m-input" placeholder=@lang('admin.update.email')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('admin.update.password'):</label>
                                <div class="col-lg-6">
                                    <input type="password" id="password" name="password" class="form-control m-input" placeholder=@lang('admin.update.password')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('admin.update.confirm_password') :</label>
                                <div class="col-lg-6">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control m-input" placeholder=@lang('admin.update.confirm_password')>
                                </div>
                            </div>

							<div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2">@lang('admin.update.role')</label>
                                <select class="form-control m-input col-lg-6" name="role" id="role">
                                    <option value="">@lang('admin.update.role')</option>
                                    @foreach ($roles as $role)
                                        <option {{ $role->name == $admin->role ? "selected" : "" }} value="{{ $role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('admin.update.update')</button>
                                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">@lang('admin.update.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
