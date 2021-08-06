@extends('master')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @if ($errors->has('image'))
    @endif
</div>
@endif
    <div class="m-content">
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
                                    Add product
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form" method="post" enctype="multipart/form-data" action="{{ route('add.product') }}" >
                        {{ csrf_field() }}
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name">
                                        SKU:
                                    </label>
                                    <input type="text" class="form-control m-input col-6" name="sku" placeholder="Enter SKU">
                                    <span class="m-form__help">
                                        Please enter SKU
                                    </span>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">
                                        Select Product Image
                                    </label>
                                    <div></div>
                                    <label class="custom-file">
                                        <input type="file" id="file2" class="custom-file-input" data-preview="#preview" name="image">
                                        <span class="custom-file-control"></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <a class="btn btn-secondary" href="/products/index">

                                    Cancel

                            </a>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
