@extends('dashboard.layout.master_layout')

@section('title')
    @lang('size.create.add_new')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
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
                                @lang('dashboard.dashboard')
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__body">
                    <br />
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 5px solid #5867dd !important">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary">@lang('order.index.orders')</div>
                                            <div class="h5 mb-0 mt-2 font-weight-bold text-gray-800">{{ App\Models\Order::all()->count() }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="image/cargo.png" width="45">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 5px solid #34bfa3 !important">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success">@lang('product.index.product')</div>
                                            <div class="h5 mb-0 mt-2 font-weight-bold text-gray-800">{{ App\Models\Product::all()->count() }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="image/box.png" width="45">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 5px solid #ffb822 !important">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning">@lang('category.index.categories')</div>
                                            <div class="h5 mb-0 mt-2 font-weight-bold text-gray-800">{{ App\Models\Category::all()->count() }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="image/category.png" width="45">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 5px solid #f4516c !important">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger">@lang('coupon.index.coupons')</div>
                                            <div class="h5 mb-0 mt-2 font-weight-bold text-gray-800">{{ App\Models\Coupon::all()->count() }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="image/coupon.png" width="45">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br /><br />
                    <div class="row">

                        <div class="col-md-6">
                            {!! $chart->container() !!}
                        </div>

                        <div class="col-md-6">
                            {!! $orderStatusChart->container() !!}
                        </div>

                    </div>
                    <br /><br /><br />
                    <div class="row">

                        <div class="col-md-12">
                            {!! $ordersChart->container() !!}
                        </div>

                    </div>

                    <div>
                    </div>
                    <br /><br /><br /><br />
                    <h3 class="badge badge-success" style="font-size: 19px; margin-bottom: 14px;">@lang('dashboard.last_orders')</h3>
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="example">
                        <thead>
                            <tr>
                                <th class="dt-right sorting_disabled" rowspan="1" colspan="1" style="width: 30.5px;" aria-label="Record ID">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" value="" class="m-group-checkable">
                                        <span></span>
                                    </label>
                                </th>
                                <th>@lang('order.index.id')</th>
                                <th>@lang('order.index.name')</th>
                                <th>@lang('order.index.status')</th>
                                <th>@lang('order.index.city')</th>
                                <th>@lang('order.index.discount_code')</th>
                                <th>@lang('order.index.discount')</th>
                                <th>@lang('order.index.total')</th>
                                <th>@lang('order.index.newTotal')</th>
                                <th>@lang('order.index.status')</th>
                                <th>@lang('order.index.created_at')</th>
                                <th>@lang('order.index.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class=" dt-right" tabindex="0">
                                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                            <input type="checkbox" name="MultDelete[]" value="{{ $order->id }}" class="m-checkable">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->city }}</td>
                                    <td>{{ $order->discount_code }}</td>
                                    <td>{{ $order->discount }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>{{ $order->newTotal }}</td>
                                    <td style="font-size: 13px;" @class([
                                        'badge badge-danger' => $order->status == 'cancel',
                                        'badge badge-success' => $order->status == 'shipped',
                                        'badge badge-info' => $order->status == 'delivered',
                                    ])>{{ $order->status }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td nowrap="">
                                        <a href="{{ route('order.edit', $order->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="edit">
                                            <i class="la la-edit"></i>
                                        </a>
                                        <a href="{{ route('order.show', $order->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="show">
                                            <i class="la la-eye"></i>
                                        </a>
                                        <a href="{{ route('order.destroy', $order->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill Confirm" title="delete">
                                            <i class="la la-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    <script src="{{ $orderStatusChart->cdn() }}"></script>
    {{ $orderStatusChart->script() }}
    <script src="{{ $ordersChart->cdn() }}"></script>
    {{ $ordersChart->script() }}
    <script>
        $('#example').DataTable( {
            "dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
        });
    </script>
@endsection