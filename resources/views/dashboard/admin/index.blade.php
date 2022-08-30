@extends('dashboard.layout.master_layout')

@section('title')
    @lang('admin.index.admins')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('admin.index.admins')</span></a></li>
    </ul>
@endsection

@section('content')

<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    @lang('admin.index.admins')
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="{{ route('admin.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                        <span>
                            <i class="la la-plus"></i>
                            <span>@lang('admin.index.add_new')</span>
                        </span>
                    </a>
                </li>
                <li class="m-portlet__nav-item"></li>
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <form action="{{ route('admin.Multidestroy') }}" method="POST">
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
                        <th>@lang('admin.index.id')</th>
                        <th>@lang('admin.index.name')</th>
                        <th>@lang('admin.index.email')</th>
                        <th>@lang('admin.index.role')</th>
                        <th>@lang('admin.index.created_at')</th>
                        <th>@lang('admin.index.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                            <td class=" dt-right" tabindex="0">
                                <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                    <input type="checkbox" name="MultDelete[]" value="{{ $admin->id }}" class="m-checkable">
                                    <span></span>
                                </label>
                            </td>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->role }}</td>
                            <td>{{ $admin->created_at }}</td>
                            <td nowrap="">
                                @if (auth('admin')->user()->can('admin_edit'))
                                    <a href="{{ route('admin.edit', $admin->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                        <i class="la la-edit"></i>
                                    </a>
                                @endif
                                @if (auth('admin')->user()->can('admin_delete'))
                                    <a href="{{ route('admin.destroy', $admin->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill Confirm" title="Delete">
                                        <i class="la la-trash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air">
                <span><i class="la la-trash"></i><span>@lang('admin.index.delete_select')</span></span>
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
