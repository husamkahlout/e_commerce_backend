@extends('dashboard.layout.master_layout')

@section('title')
    @lang('admin.create.add_new')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('admin.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('admin.create.admins')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('admin.create.add_new')</span></a></li>
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
                                @lang('admin.create.add_new')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.store') }}"  method="POST" class="m-form m-form--label-align-right">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('admin.create.name'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control m-input" placeholder=@lang('admin.create.name')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('admin.create.email'):</label>
                                <div class="col-lg-6">
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control m-input" placeholder=@lang('admin.create.email')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('admin.create.password'):</label>
                                <div class="col-lg-6">
                                    <input type="password" id="password" name="password" class="form-control m-input" placeholder=@lang('admin.create.password')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('admin.create.confirm_password'):</label>
                                <div class="col-lg-6">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control m-input" placeholder=@lang('admin.create.confirm_password')>
                                </div>
                            </div>

							<div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2">@lang('admin.create.role')</label>
                                <select class="form-control m-input col-lg-6" name="role" id="role">
                                    <option value="">@lang('admin.create.role')</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name}}">{{$role->name}}</option>
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
                                    <button type="submit" class="btn btn-primary">@lang('admin.create.save')</button>
                                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">@lang('admin.create.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
