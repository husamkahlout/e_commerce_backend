@extends('dashboard.layout.master_layout')

@section('title')
    @lang('category.create.add_new')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('category.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('category.create.categories')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('category.create.add_new')</span></a></li>
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
                                @lang('category.create.add_new')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('category.store') }}"  method="POST" class="m-form m-form--label-align-right" enctype="multipart/form-data">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('category.create.image')</label>
                                <div></div>
                                <div class="custom-file col-lg-6">
                                    <input type="file" class="custom-file-input" name="category_image">
                                    <label class="custom-file-label" for="customFile">@lang('category.create.image')</label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('category.create.name'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control m-input" placeholder=@lang('category.create.name')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('category.create.name_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}" class="form-control m-input" placeholder=@lang('category.create.name_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('category.create.subCategory'):</label>
                                <div class="form-group m-form__group col-lg-4">
                                    <select class="form-control m-input m-input--air m-input--pill" name="parent_id" id="parent_id">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option {{$category->id == old('id') ? "selected" : ""}} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('category.create.save')</button>
                                    <a href="{{ route('category.index') }}" class="btn btn-secondary">@lang('category.create.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
