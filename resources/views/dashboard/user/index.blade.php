@extends('dashboard.layout.master_layout')

@section('title')
    @lang('user.index.users')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('user.index.users')</span></a></li>
    </ul>
@endsection

@section('content')

<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    @lang('user.index.users')
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="{{ route('user.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                        <span>
                            <i class="la la-plus"></i>
                            <span>@lang('user.index.add_new')</span>
                        </span>
                    </a>
                </li>
                <li class="m-portlet__nav-item"></li>
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <form action="{{ route('user.Multidestroy') }}" method="POST">
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
                        <th>@lang('user.index.id')</th>
                        <th>@lang('user.index.name')</th>
                        <th>@lang('user.index.email')</th>
                        <th>@lang('user.index.created_at')</th>
                        <th>@lang('user.index.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class=" dt-right" tabindex="0">
                                <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                    <input type="checkbox" name="MultDelete[]" value="{{ $user->id }}" class="m-checkable">
                                    <span></span>
                                </label>
                            </td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td nowrap="">
                                @if (auth('admin')->user()->can('user_edit'))
                                    <a href="{{ route('user.edit', $user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                        <i class="la la-edit"></i>
                                    </a>
                                @endif
                                @if (auth('admin')->user()->can('user_cart'))
                                    <a href="{{ route('user.cart', $user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                        <i class="la la-shopping-cart"></i>
                                    </a>
                                @endif
                                @if (auth('admin')->user()->can('user_eye'))
                                    <a href="{{ route('user.show', $user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill" title="show">
                                        <i class="la la-eye"></i>
                                    </a>
                                @endif
                                @if (auth('admin')->user()->can('user_delete'))
                                    <a href="{{ route('user.destroy', $user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill Confirm" title="Delete">
                                        <i class="la la-trash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air">
                <span><i class="la la-trash"></i><span>@lang('user.index.delete_select')</span></span>
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
