@extends('dashboard.layout.master_layout')

@section('title')
    @lang('order.update.edit_order')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('order.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('order.index.orders')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('order.update.edit_order')</span></a></li>
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
                                @lang('order.update.edit_order')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('order.update', $order->id) }}" method="POST" class="m-form m-form--label-align-right">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label for="type" class="col-lg-2 col-form-label">@lang('order.update.delivery_status'):</label>
                                <div class="form-group m-form__group col-md-6">
                                    <select class="form-control m-input m-input--air m-input--pill" name="delivery_status" id="delivery_status">
                                        <option {{$order->delivery_status == "0" ? "selected" : ""}} value="0">@lang('order.update.order_placed')</option>
                                        <option {{$order->delivery_status == "1" ? "selected" : ""}} value="1">@lang('order.update.confirmed')</option>
                                        <option {{$order->delivery_status == "2" ? "selected" : ""}} value="2">@lang('order.update.order_shipped')</option>
                                        <option {{$order->delivery_status == "3" ? "selected" : ""}} value="3">@lang('order.update.out_for_delivery')</option>
                                        <option {{$order->delivery_status == "4" ? "selected" : ""}} value="4">@lang('order.update.delivery')</option>
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
                                    <button type="submit" class="btn btn-primary">@lang('coupon.update.update')</button>
                                    <a href="{{ route('order.index') }}" class="btn btn-secondary">@lang('coupon.update.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
