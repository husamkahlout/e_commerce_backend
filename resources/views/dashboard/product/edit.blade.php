@extends('dashboard.layout.master_layout')

@section('title')
    @lang('product.update.edit_product')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('product.index') }}" class="m-nav__link"><span class="m-nav__link-text">Products</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('product.update.edit_product')</span></a></li>
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
                                @lang('product.update.edit_product')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('product.update', $product->id) }}" method="POST" class="m-form m-form--label-align-right" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('product.update.image')</label>
                                <div></div>
                                <div class="custom-file col-lg-6">
                                    <input type="file" class="custom-file-input" name="product_image">
                                    <label class="custom-file-label" for="customFile">@lang('product.update.image')</label>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('product.update.name'):</label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('product.update.name')>
                                </div>
                                <label class="col-lg-2 col-form-label">@lang('product.update.name_ar'):</label>
                                <div class="col-lg-4">
                                    <input type="text" name="name_ar" id="name_ar" value="{{ $product->name_ar }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('product.update.name_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">@lang('product.update.price'):</label>
                                <div class="col-lg-4">
                                    <input type="text" name="price" id="price" value="{{ $product->price }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('product.update.price')>
                                </div>
                                <label class="col-lg-1 col-form-label">@lang('product.update.price_offer'):</label>
                                <div class="col-lg-4">
                                    <input type="text" name="price_offer" id="price_offer" value="{{ $product->price_offer }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('product.update.price_offer')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('product.update.category'):</label>
                                <div class="form-group m-form__group col-md-4">
                                    <select class="form-control m-input m-input--air m-input--pill" name="category_id" id="category_id">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option {{$category->id == $product->category_id ? "selected" : ""}} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-lg-2 col-form-label">@lang('product.update.quantity'):</label>
                                <div class="col-lg-4">
                                    <input type="text" name="quantity" id="quantity" value="{{ $product->quantity }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('product.update.quantity')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-2 col-sm-12">@lang('product.update.sizes')</label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <select class="form-control m-select2" id="m_select2_2" name="size[]" multiple="multiple">
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}"
                                                @foreach ($product->sizes as $item)
                                                    {{ $size->id == $item->id ? "selected" : '' }}
                                                @endforeach
                                                >{{ $size->size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="type" class="col-lg-2 col-form-label">@lang('product.update.category'):</label>
                                <div class="form-group m-form__group col-md-4">
                                    <select class="form-control m-input m-input--air m-input--pill" name="category_id" id="category_id">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option {{$category->id == $product->category_id ? "selected" : ""}} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="type" class="col-lg-2 col-form-label">@lang('product.update.brands'):</label>
                                <div class="form-group m-form__group col-md-4">
                                    <select class="form-control m-input m-input--air m-input--pill" name="brand_id" id="brand_id">
                                        <option></option>
                                        @foreach ($brands as $brand)
                                            <option {{$brand->id == $product->brand_id ? "selected" : ""}} value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="m-form__group form-group row">
                                <label for="product_new" class="col-lg-2 col-form-label">@lang('product.update.product_new')</label>
                                <div class="col-lg-2">
                                    <span class="m-switch m-switch--outline m-switch--info">
                                        <label for="product_new">
                                            <input type="checkbox" name="product_new" id="product_new" {{ $product->product_new ? "checked" : "" }}>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                                <label class="col-form-label col-lg-2 col-sm-12">@lang('product.update.colors')</label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <select class="form-control m-select2 m-input--air m-input--pill" id="m_select2_4" name="color[]" multiple="multiple">
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}"
                                                @foreach ($product->colors as $item)
                                                    {{ $color->id == $item->id ? "selected" : '' }}
                                                @endforeach
                                            >{{ $color->color_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" for="details">@lang('product.update.description')</label>
                                <div class="form-group m-form__group col-md-6">
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="details" name="details" rows="9">{{ $product->details }}</textarea>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" for="details">@lang('product.update.description_ar')</label>
                                <div class="form-group m-form__group col-md-6">
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="details_ar" name="details_ar" rows="9">{{ $product->details_ar }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('product.update.update')</button>
                                    <a href="{{ route('product.index') }}" class="btn btn-secondary">@lang('product.update.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
