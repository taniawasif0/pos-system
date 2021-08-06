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
                                    Add Shipment
                                </h3>
                            </div>
                        </div>
                    </div>
                    <form  method="post" action="{{url('/ship/edit/'.$shipment->id)}}" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                        {{ csrf_field() }}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    SKU:
                                </label>
                                <div class="col-lg-3">
                                <select class="form-control m-input" name="product_id" id="exampleSelect1">

                                    <option value="{{ $shipment->product->id }}">{{ $shipment->product->sku }}</option>



								</select>
                                </div>
                                <label class="col-lg-2 col-form-label">
                                    Quantity:
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input" value="{{ $shipment->quantity }}" name="quantity" placeholder="please enter">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Unit Price:
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" name="unit_price" value="{{ $shipment->unit_price }}" class="form-control m-input" placeholder="please enter">

                                </div>
                                <label class="col-lg-2 col-form-label">
                                    Shipping:
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" name="shipping" value="{{ $shipment->shipping }}" class="form-control m-input" placeholder="please enter">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Total:
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" name="total" value="{{ $shipment->total }}" class="form-control m-input" placeholder="please enter">

                                </div>
                                <label class="col-lg-2 col-form-label">
                                    Arrived final
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" name="arrived_final" value="{{ $shipment->arrived_final }}" class="form-control m-input" placeholder="please enter">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    paid:
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" name="paid" value="{{ $shipment->paid }}" class="form-control m-input" placeholder="please enter">

                                </div>
                                <label class="col-lg-2 col-form-label">
                                    Payment method:
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" name="payment_method" value="{{ $shipment->payment_method }}" class="form-control m-input" placeholder="please enter">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Supplier:
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" name="supplier" value="{{ $shipment->supplier }}" class="form-control m-input" placeholder="please enter">

                                </div>
                                <label class="col-lg-2 col-form-label">
                                    Date Paid:
                                </label>
                                <div class="col-lg-3">
                                    <input class="form-control m-input" name="date_paid" value="{{ $shipment->date_paid }}" type="date" value="2011-08-19" id="example-date-input">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    status:
                                </label>
                                <div class="col-lg-3">
                                    <div class="m-radio-inline">
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" name="status" {{ ($shipment->status=="Shipped")? "checked" : "" }} value="Shipped">
                                            Shipped
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" {{ ($shipment->status=="Not shipped")? "checked" : "" }}  name="status"  value="Not shipped">
                                            Not shipped
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" name="status" {{ ($shipment->status=="arrived")? "checked" : "" }}  value="arrived">
                                            Arrived
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" name="status" {{ ($shipment->status=="done")? "checked" : "" }}  value="done">
                                            Done
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="m-form__help">
                                        Please select
                                    </span>
                                </div>
                                <label class="col-lg-2 col-form-label">
                                    Ship Date:
                                </label>
                                <div class="col-lg-3">
                                    <input class="form-control m-input" value="{{ $shipment->ship_date }}"  name="ship_date" type="date" value="2011-08-19" id="example-date-input">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Carrier:
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" name="carrier" value="{{ $shipment->carrier }}"  class="form-control m-input" placeholder="please enter">

                                </div>
                                <label class="col-lg-2 col-form-label">
                                    tracking#
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" name="tracking_number" value="{{ $shipment->tracking_number }}"  class="form-control m-input" placeholder="please enter">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Current Stock
                                </label>
                                <div class="col-lg-3">
                                    <input type="text" name="current_stock" value="{{ $shipment->current_stock }}"  class="form-control m-input" placeholder="please enter">

                                </div>

                            </div>

                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                    Docs
                                </label>
                                <div class="col-lg-3">
                                    <div class="m-radio-inline">
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" name="docs" {{ ($shipment->docs=="1")? "checked" : ""}} checked="" value="1">
                                            yes
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--solid">
                                            <input type="radio" {{ ($shipment->status=="0")? "checked" : "" }} name="docs" value="0">
                                            no
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="m-form__help">
                                        Please select
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-success">
                                            Submit
                                        </button>
                                        <a class="btn btn-secondary" href="/shipment/index">

                                            Cancel

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
