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
                                    Shipment Detail
                                </h3>
                            </div>
                        </div>
                    </div>
                    <form  method="post" action="{{ route('add.shipment') }}" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                        {{ csrf_field() }}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">
                                    SKU:
                                </label>

                                    <div class="col-lg-5">
                                     <input class="form-control m-input" disabled  value="{{ $shipment->product->sku }}">

                                    </div>

                                <label class="col-lg-1 col-form-label">
                                    Quantity:
                                </label>
                                <div class="col-lg-5">
                                   <input type="text" class="form-control m-input" disabled value="{{ $shipment->quantity }}">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">
                                    Unit Price:
                                </label>
                                <div class="col-lg-5">

                                    <input type="text" class="form-control m-input" disabled value="{{ $shipment->unit_price}}">
                                </div>
                                <label class="col-lg-1 col-form-label">
                                    Shipping:
                                </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control m-input" disabled value="{{ $shipment->shipping}}">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">
                                    Total:
                                </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control m-input" disabled value="{{ $shipment->total}}">

                                </div>
                                <label class="col-lg-1 col-form-label">
                                    Arrived final
                                </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control m-input" disabled value="{{ $shipment->arrived_final}}">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">
                                    paid:
                                </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control m-input" disabled value="{{ $shipment->paid}}">

                                </div>
                                <label class="col-lg-1 col-form-label">
                                    Payment method:
                                </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control m-input" disabled value="{{ $shipment->payment_method}}">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">
                                    Supplier:
                                </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control m-input" disabled value="{{ $shipment->supplier}}">

                                </div>
                                <label class="col-lg-1 col-form-label">
                                    Date Paid:
                                </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control m-input" disabled value="{{ $shipment->date_paid}}">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">
                                    status:
                                </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control m-input" disabled value="{{ $shipment->status}}">
                                </div>
                                <label class="col-lg-1 col-form-label">
                                    Ship Date:
                                </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control m-input" disabled value="{{ $shipment->ship_date}}">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">
                                    Carrier:
                                </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control m-input" disabled value="{{ $shipment->carrier}}">

                                </div>
                                <label class="col-lg-1 col-form-label">
                                    tracking#
                                </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control m-input" disabled value="{{ $shipment->tracking_number}}">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">
                                    Current Stock
                                </label>
                                <div class="col-lg-5">
                                 <input type="text" class="form-control m-input" disabled value="{{ $shipment->current_stock}}">
                                </div>

                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-1 col-form-label">
                                    Docs
                                </label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control m-input" disabled value=" {{ $shipment->docs==1?'yes':'no' }}">

                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-10">

                                        <a class="btn btn-primary float-xl-right" href="/shipment/index">
                                            back
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
