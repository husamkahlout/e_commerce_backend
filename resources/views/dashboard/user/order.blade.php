@extends('dashboard.layout.master_layout')

@section('title')
    @lang('order.index.orders')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('order.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('order.index.orders')</span></a></li>
    </ul>
@endsection

@section('content')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">@lang('order.index.orders')</h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('order.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span><i class="la la-plus"></i><span>@lang('order.index.add_new')</span></span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <form action="{{ route('order.Multidestroy') }}" method="POST">
                @csrf
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
                                    @if (auth('admin')->user()->can('order_edit'))
                                        <a href="{{ route('order.edit', $order->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="edit">
                                            <i class="la la-edit"></i>
                                        </a>
                                    @endif
                                    @if (auth('admin')->user()->can('order_eye'))
                                        <a href="{{ route('order.show', $order->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="show">
                                            <i class="la la-eye"></i>
                                        </a>
                                    @endif
                                    @if (auth('admin')->user()->can('order_delete'))
                                        <a href="{{ route('order.destroy', $order->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill Confirm" title="delete">
                                            <i class="la la-trash"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air">
                    <span><i class="la la-trash"></i><span>@lang('order.index.delete_select')</span></span>
                </button>
            </form>
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
