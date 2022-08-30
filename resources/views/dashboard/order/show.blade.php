@extends('dashboard.layout.master_layout')

@section('title')
    @lang('order.index.orders')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('order.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('order.details.orders')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('order.details.order_details')</span></a></li>
    </ul>
@endsection

@section('content')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">@lang('order.details.orders')</h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="row">
                <div class="col-md-4">
                    <span style="font-size: 17px;">@lang('order.details.name'): </span>
                    <span style="margin-left: 8px; font-weight: bold; font-size: 16px;">{{ $order->name }}</span>
                </div>
                <div class="col-md-4">
                    <span style="font-size: 17px;">@lang('order.details.phone'): </span>
                    <span style="margin-left: 8px; font-weight: bold; font-size: 16px;">{{ $order->phone }}</span>
                </div>
                <div class="col-md-4">
                    <span style="font-size: 17px;">@lang('order.details.email'): </span>
                    <span style="margin-left: 8px; font-weight: bold; font-size: 16px;">{{ $order->email }}</span>
                </div>
            </div>
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-4">
                    <span style="font-size: 17px;">@lang('order.details.city'): </span>
                    <span style="margin-left: 8px; font-weight: bold; font-size: 16px;">{{ $order->city }}</span>
                </div>
                <div class="col-md-4">
                    <span style="font-size: 17px;">@lang('order.details.neighourhood'): </span>
                    <span style="margin-left: 8px; font-weight: bold; font-size: 16px;">{{ $order->neighourhood }}</span>
                </div>
                <div class="col-md-4">
                    <span style="font-size: 17px;">@lang('order.details.street'): </span>
                    <span style="margin-left: 8px; font-weight: bold; font-size: 16px;">{{ $order->street }}</span>
                </div>
            </div>
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-4">
                    <span style="font-size: 17px;">@lang('order.details.total'): </span>
                    <span style="margin-left: 8px; font-weight: bold; font-size: 16px;">{{ $order->total }}</span>
                </div>
                <div class="col-md-4">
                    <span style="font-size: 17px;">@lang('order.details.newTotal'): </span>
                    <span style="margin-left: 8px; font-weight: bold; font-size: 16px;">{{ $order->newTotal }}</span>
                </div>
            </div>
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-4">
                    <span style="font-size: 17px;">@lang('order.details.discount'): </span>
                    <span style="margin-left: 8px; font-weight: bold; font-size: 16px;">{{ $order->discount }}</span>
                </div>
                <div class="col-md-4">
                    <span style="font-size: 17px;">@lang('order.details.discount_code'): </span>
                    <span style="margin-left: 8px; font-weight: bold; font-size: 16px;">{{ $order->discount_code }}</span>
                </div>
                <div class="col-md-4">
                    <span style="font-size: 17px;">@lang('order.details.status'): </span>
                    <span style="margin-left: 8px; font-weight: bold; font-size: 16px;">{{ $order->status }}</span>
                </div>
            </div>
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-12">
                    <span style="font-size: 17px;">@lang('order.details.status'): </span>
                    <span style="margin-left: 8px; font-weight: bold; font-size: 16px;">{{ $order->status }}</span>
                </div>
            </div>
            @if($products->count() > 0)
                <table class="table table-striped- table-bordered table-hover table-checkable" id="example">
                    <thead>
                        <tr>
                            <th class="dt-right sorting_disabled" rowspan="1" colspan="1" style="width: 30.5px;" aria-label="Record ID">
                                <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                    <input type="checkbox" value="" class="m-group-checkable">
                                    <span></span>
                                </label>
                            </th>
                            <th>@lang('product.index.id')</th>
                            <th>@lang('product.index.image')</th>
                            <th>
                                @if(app()->getLocale() === 'ar')
                                    @lang('product.index.name_ar')
                                @else
                                    @lang('product.index.name')
                                @endif
                            </th>
                            <th>@lang('product.index.price')</th>
                            <th>@lang('product.index.price_offer')</th>
                            <th>@lang('product.index.quantity')</th>
                            <th>@lang('color.index.color')</th>
                            <th>@lang('size.index.size')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class=" dt-right" tabindex="0">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" name="MultDelete[]" value="{{ $product->id }}" class="m-checkable">
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ $product->image }}" width="75"></td>
                                @if(app()->getLocale() === 'ar')
                                    <td>{{ $product->name_ar }}</td>
                                @else
                                    <td>{{ $product->name }}</td>
                                @endif
                                <td>{{ $product->price }}</td>
                                <td>
                                    @if($product->price_offer)
                                        {{ $product->price_offer }}
                                    @else
                                        ----
                                    @endif
                                </td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ $product->pivot->color }}</td>
                                <td>{{ $product->pivot->size }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else()
                <h4 style="margin-top: 30px;">No Product In Order</h4>
            @endif
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#example').DataTable( {
            "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
        });
    </script>
@endsection
