@extends('dashboard.layout.master_layout')

@section('title')
    @lang('user.userCart.userItems')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('user.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('user.userCart.userItems')</span></a></li>
    </ul>
@endsection

@section('content')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">@lang('user.userCart.userItems')</h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="example">
                <thead>
                    <tr>
                        <th class="dt-right sorting_disabled" rowspan="1" colspan="1" style="width: 30.5px;" aria-label="Record ID">
                            <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                <input type="checkbox" value="" class="m-group-checkable">
                                <span></span>
                            </label>
                        </th>
                        <th>@lang('user.userCart.id')</th>
                        <th>@lang('user.userCart.image')</th>
                        <th>@lang('user.userCart.product_name')</th>
                        <th>@lang('user.userCart.quantity')</th>
                        <th>@lang('user.userCart.size')</th>
                        <th>@lang('user.userCart.color')</th>
                        <th>@lang('user.userCart.created_at')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cartItem)
                        <tr>
                            <td class=" dt-right" tabindex="0">
                                <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                    <input type="checkbox" name="MultDelete[]" value="{{ $cartItem->id }}" class="m-checkable">
                                    <span></span>
                                </label>
                            </td>
                            <td>{{ $cartItem->id }}</td>
                            <td><img src="{{  $cartItem->product['image'] }}" width="100"></td>
                            <td>{{ $cartItem->product['name'] }}</td>
                            <td>{{ $cartItem->quantity }}</td>
                            <td>{{ $cartItem->size['size'] }}</td>
                            <td>{{ $cartItem->color['color_name'] }}</td>
                            <td>{{ $cartItem->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
