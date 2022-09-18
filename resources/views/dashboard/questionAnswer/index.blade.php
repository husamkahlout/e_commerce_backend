@extends('dashboard.layout.master_layout')

@section('title')
    @lang('questionAnswer.index.questionAnswers')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('questionAnswer.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('questionAnswer.index.questionAnswers')</span></a></li>
    </ul>
@endsection

@section('content')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">@lang('questionAnswer.index.questionAnswers')</h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('questionAnswer.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span><i class="la la-plus"></i><span>@lang('questionAnswer.index.add_new')</span></span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <form action="{{ route('questionAnswer.Multidestroy') }}" method="POST">
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
                            <th>@lang('questionAnswer.index.id')</th>
                            <th>@lang('questionAnswer.index.question')</th>
                            <th>@lang('questionAnswer.index.question_ar')</th>
                            <th>@lang('questionAnswer.index.created_at')</th>
                            <th>@lang('questionAnswer.index.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questionAnswer as $questionAnswer)
                            <tr>
                                <td class=" dt-right" tabindex="0">
                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox" name="MultDelete[]" value="{{ $questionAnswer->id }}" class="m-checkable">
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{ $questionAnswer->id }}</td>
                                <td>{{ $questionAnswer->question }}</td>
                                <td>{{ $questionAnswer->question_ar }}</td>
                                <td>{{ $questionAnswer->created_at }}</td>
                                <td nowrap="">
                                    @if (auth('admin')->user()->can('questionAnswer_edit'))
                                        <a href="{{ route('questionAnswer.edit', $questionAnswer->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="edit">
                                            <i class="la la-edit"></i>
                                        </a>
                                    @endif
                                    @if (auth('admin')->user()->can('questionAnswer_delete'))
                                        <a href="{{ route('questionAnswer.destroy', $questionAnswer->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill Confirm" title="delete">
                                            <i class="la la-trash"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air">
                    <span><i class="la la-trash"></i><span>@lang('questionAnswer.index.delete_select')</span></span>
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
