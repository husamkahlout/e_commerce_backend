@extends('dashboard.layout.master_layout')

@section('title')
    @lang('role.index.roles')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('role.index.roles')</span></a></li>
    </ul>
@endsection

@section('content')

<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">@lang('role.index.roles')</h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="{{ route('role.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                        <span><i class="la la-plus"></i><span>@lang('role.index.add_new')</span></span>
                    </a>
                </li>
                <li class="m-portlet__nav-item"></li>
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <form action="{{ route('role.Multidestroy') }}" method="POST">
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
                        <th>@lang('role.index.id')</th>
                        <th>@lang('role.index.name')</th>
                        <th>@lang('role.index.name_ar')</th>
                        <th>@lang('role.index.created_at')</th>
                        <th>@lang('role.index.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td class=" dt-right" tabindex="0">
                                <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                    <input type="checkbox" name="MultDelete[]" value="{{ $role->id }}" class="m-checkable">
                                    <span></span>
                                </label>
                            </td>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->name_ar }}</td>
                            <td>{{ $role->created_at }}</td>
                            <td nowrap="">
                                @if (auth('admin')->user()->can('role_edit'))
                                    <a href="{{ route('role.edit', $role->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                        <i class="la la-edit"></i>
                                    </a>
                                @endif
                                @if (auth('admin')->user()->can('role_eye'))
                                    <a href="{{ route('role.show', $role->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Show">
                                        <i class="la la-eye"></i>
                                    </a>
                                @endif
                                @if (auth('admin')->user()->can('role_delete'))
                                    <a href="{{ route('role.destroy', $role->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill Confirm" title="delete">
                                        <i class="la la-trash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air">
                <span><i class="la la-trash"></i><span>@lang('role.index.delete_select')</span></span>
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
