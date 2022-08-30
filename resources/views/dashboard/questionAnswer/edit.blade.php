@extends('dashboard.layout.master_layout')

@section('title')
    @lang('questionAnswer.create.add_new')
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('questionAnswer.index') }}" class="m-nav__link"><span class="m-nav__link-text">@lang('questionAnswer.create.questionAnswers')</span></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="" class="m-nav__link"><span class="m-nav__link-text">@lang('questionAnswer.create.add_new')</span></a></li>
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
                                @lang('questionAnswer.create.add_new')
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('questionAnswer.update', $questionAnswer->id) }}" method="POST" class="m-form m-form--label-align-right">
                    @csrf
                    @method('PUT')
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('questionAnswer.create.question'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="question" id="question" value="{{ $questionAnswer->question }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('questionAnswer.create.question')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">@lang('questionAnswer.create.question_ar'):</label>
                                <div class="col-lg-6">
                                    <input type="text" name="question_ar" id="question_ar" value="{{ $questionAnswer->question_ar }}" class="form-control m-input m-input--air m-input--pill" placeholder=@lang('questionAnswer.create.question_ar')>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" for="answer">@lang('questionAnswer.create.answer')</label>
                                <div class="form-group m-form__group col-md-6">
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="answer" name="answer" rows="9">{{ $questionAnswer->answer }}</textarea>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label" for="answer_ar">@lang('questionAnswer.create.answer_ar')</label>
                                <div class="form-group m-form__group col-md-6">
                                    <textarea class="form-control m-input m-input--air m-input--pill" id="answer_ar" name="answer_ar" rows="9">{{ $questionAnswer->answer_ar }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary">@lang('questionAnswer.create.save')</button>
                                    <a href="{{ route('questionAnswer.index') }}" class="btn btn-secondary">@lang('questionAnswer.create.back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
