@extends('dashboard.layout.master_layout')

@section('title')
    Products
@endsection

@section('subtitle')
    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home"><a href="{{ route('dashboard.index') }}" class="m-nav__link m-nav__link--icon"><i class="m-nav__link-icon la la-home"></i></a></li>
        <li class="m-nav__separator">-</li>
        <li class="m-nav__item"><a href="{{ route('product.index') }}" class="m-nav__link"><span class="m-nav__link-text">Products</span></a></li>
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
                                Add New Images To Product
                            </h3>
                        </div>
                    </div>
                </div>

                <form action="{{ route('product.upload', ['product' => $product]) }}" class="dropzone" id="myDropzoneForm">
                    @csrf
                </form>
                <br><br><br>

                @if ($product->images()->count() > 0)
                    <div class="row">
                        @foreach ($product->images as $image)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('image/' . $image->path) }}" height="150" width="150" alt="" class="card-img-top mb-3">
                                    <div class="card-body"></div>
                                    <div class="card-footer">
                                        <a href="{{ route('images.destroy', $image->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill Confirm" title="حذف">
                                            <i class="la la-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        Dropzone.options.myDropzoneForm = {
            acceptedFiles: "image/*",
            init: function() {
                this.on('success', function() {
                    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                        console.log("finsish");
                        location.reload();
                    }
                })
            }
        }
    </script>
@endsection