@extends('dashboard.layout.master_layout')

@section('title')
    @lang('product.index.product')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('product.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('product.index.product')</span></a></li>
    </ul>
@endsection

@section('content')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">@lang('product.index.product')</h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('product.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span><i class="la la-plus"></i><span>@lang('product.index.add_new')</span></span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <form action="{{ route('product.Multidestroy') }}" method="POST">
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
                            <th>@lang('product.index.id')</th>
                            <th>@lang('product.index.image')</th>
                            <th>
                                @if(app()->getLocale() === 'ar')
                                    @lang('product.index.name_ar')
                                @else
                                    @lang('product.index.name')
                                @endif
                            </th>
                            <th>
                                @if(app()->getLocale() === 'ar')
                                    @lang('product.index.category_ar')
                                @else
                                    @lang('product.index.category')
                                @endif
                            </th>
                            <th>@lang('product.index.price')</th>
                            <th>@lang('product.index.price_offer')</th>
                            <th>@lang('product.index.quantity')</th>
                            <th>@lang('product.index.product_new')</th>
                            <th>@lang('product.index.created_at')</th>
                            <th>@lang('product.index.actions')</th>
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
                                <td>{{ getLang($product ,'name') }}</td>
                                {{-- @if(app()->getLocale() === 'ar')
                                    <td>{{ $product->name_ar }}</td>
                                @else
                                    <td>{{ $product->name }}</td>
                                @endif --}}
                                <td>{{ getLang($product->category ,'name') }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    @if($product->price_offer)
                                        {{ $product->price_offer }}
                                    @else
                                        ----
                                    @endif
                                </td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <span class="m-switch m-switch--outline m-switch--info">
                                        <label for="slider">
                                            <input type="checkbox" disabled {{ $product->product_new ? "checked" : '' }}><span></span>
                                        </label>
                                    </span>
                                </td>
                                <td>{{ $product->created_at }}</td>
                                <td nowrap="">
                                    @if (auth('admin')->user()->can('product_edit'))
                                        <a href="{{ route('product.edit', $product->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="edit">
                                            <i class="la la-edit"></i>
                                        </a>
                                    @endif
                                    @if (auth('admin')->user()->can('product_eye'))
                                        <a href="{{ route('product.show', $product->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="show">
                                            <i class="la la-eye"></i>
                                        </a>
                                    @endif
                                    @if (auth('admin')->user()->can('product_delete'))
                                        <a href="{{ route('product.destroy', $product->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill Confirm" title="delete">
                                            <i class="la la-trash"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air">
                    <span><i class="la la-trash"></i><span>@lang('product.index.delete_select')</span></span>
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
