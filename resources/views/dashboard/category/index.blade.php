@extends('dashboard.layout.master_layout')

@section('title')
    @lang('category.index.categories')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('category.index.categories')</span></a></li>
    </ul>
@endsection

@section('content')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">@lang('category.index.categories')</h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('category.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span><i class="la la-plus"></i><span>@lang('category.index.add_new')</span></span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <form action="{{ route('category.Multidestroy') }}" method="POST" style="margin-bottom: 40px;">
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
                            <th>@lang('category.index.id')</th>
                            <th>@lang('category.index.image')</th>
                            <th>@lang('category.index.name')</th>
                            <th>@lang('category.index.name_ar')</th>
                            <th>@lang('category.index.subCategory')</th>
                            <th>@lang('product.index.product')</th>
                            <th>@lang('category.index.created_at')</th>
                            <th>@lang('category.index.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class=" dt-right" tabindex="0">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" name="MultDelete[]" value="{{ $category->id }}" class="m-checkable">
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{ $category->id }}</td>
                                <td><img src="{{ $category->image }}" width="100"></td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->name_ar }}</td>
                                <td>
                                    @if(count($category->subcategory))
                                        {{ count($category->subcategory) }}
                                        {{-- @include('dashboard.category.subCategoryList',['subcategories' => $category->subcategory]) --}}
                                    @endif
                                </td>
                                <td>{{ count($category->products) }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td nowrap="">
                                    @if (auth('admin')->user()->can('category_edit'))
                                        <a href="{{ route('category.edit', $category->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="edit">
                                            <i class="la la-edit"></i>
                                        </a>
                                    @endif
                                    @if (auth('admin')->user()->can('category_products'))
                                        <a href="{{ route('category.products', $category->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="products">
                                            <i class="la la-eye"></i>
                                        </a>
                                    @endif
                                    @if (auth('admin')->user()->can('category_delete'))
                                        <a href="{{ route('category.destroy', $category->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill Confirm" title="delete">
                                            <i class="la la-trash"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air">
                    <span><i class="la la-trash"></i><span>@lang('category.index.delete_select')</span></span>
                </button>
            </form>
            <p class="badge badge-success" style="font-size: 18px !important">@lang('category.index.all_categories')</p>
            <ul id="tree1">
                @foreach($categories as $category)
                    <li style="cursor: pointer; font-size: 16px;">
                        <i class="far fa-plus-square" style="margin-right: 6px; margin-left: 6px;"></i>{{ $category->name }}
                        @if(count($category->subcategory))
                            @include('dashboard.category.subCategoryList',['subcategories' => $category->subcategory])
                        @endif
                    </li>
                @endforeach
            <ul>
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
