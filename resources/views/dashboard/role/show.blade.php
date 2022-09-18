@extends('dashboard.layout.master_layout')

@section('title')
    @lang('role.show_roles')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('role.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('role.index.roles')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('role.show_roles')</span></a></li>
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
                                @lang('role.show_roles')
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">@lang('role.update.name'):</label>
                            <div class="col-lg-6">
                                <input type="text" name="role" id="role" disabled value="{{ $role->name }}" class="form-control m-input">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">@lang('role.update.name_ar'):</label>
                            <div class="col-lg-6">
                                <input type="text" name="role_ar" id="role_ar" disabled value="{{ $role->name_ar }}" class="form-control m-input">
                            </div>
                        </div>

                        <div class="m-form__group form-group row">
                            <label class="col-2 col-form-label">@lang('role.update.choose_permissions')</label>
                            <div class="col-8">
                                <div class="m-checkbox-inline">
                                    @foreach ($role->permissions as $item)
                                        <label class="m-checkbox m-checkbox--state-success">
                                            <input type="checkbox" name="permission[]" disabled id="permission" {{ $item->name ? "checked" : '' }} value="{{ $item->name }}"> {{ $item->name }}
                                            <span></span>
                                            <br><br>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('role.index') }}" class="btn btn-secondary">@lang('role.update.back')</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
