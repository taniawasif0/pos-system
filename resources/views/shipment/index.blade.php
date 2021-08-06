@extends('master')
@section('scripts')

<script>
$.noConflict();
jQuery( document ).ready(function( $ ) {
    $('#myTable').DataTable();

});
 </script>

@endsection

@section('content')
<div class="container">
        <!-- BEGIN: Subheader -->
        <div class="m-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="m-portlet">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">

                                    <span class="m-portlet__head-icon m--hide">
                                        <i class="la la-gear"></i>
                                    </span>

                                    <h3 class="m-portlet__head-text">
                                       Tracking Shipment
                                    </h3>
                                </div>
                            </div>

                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                                             data-dropdown-toggle="hover" aria-expanded="true">
                                             <a href="/shipment/create"
                        {{-- class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle"> --}}
                         <button class="btn btn-primary float-xl-right" style="margin-top:15px;">Add Shipment</button>
                     </a>

                        <button class="btn btn-primary dropdown-toggle" style="margin-top:15px; margin-right:5px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Status
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="/all">
                                All
                            </a>
                            <a class="dropdown-item" href="/Shipped">
                                Shipped
                            </a>
                            <a class="dropdown-item" href="/not_shipped">
                                Not shipped
                            </a>
                            <a class="dropdown-item" href="/arrived">
                                Arrived
                            </a>
                            <a class="dropdown-item" href="/done">
                                Done
                            </a>
                        </div>


                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div class="m-portlet__body">
                            <!--begin::Section-->
                            <div class="m-section">
                                <div class="m-section__content">
                                    <div style="overflow:auto">
                                    <table class="table-responsive m-table m-table--head-bg-success" id=myTable>
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Sku</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Shipping</th>
                                            <th>Total</th>
                                            <th>Per unit</th>
                                            <th>Paid</th>
                                            <th>Payment method</th>
                                            <th>Supplier</th>
                                            <th>Date paid</th>
                                            <th>Ship date</th>
                                            <th>Status</th>
                                            <th>carrier</th>
                                            <th>tracking_number</th>
                                            <th>arrived_final</th>
                                            <th>docs</th>
                                            <th>current_stock</th>
                                            <th>current_price</th>
                                            <th>Actions</th>


                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php  $i = ($shipments->currentpage()-1)* $shipments->perpage() + 1;   ?>
                                        @foreach($shipments as $key => $shipment)

                                          <tr>

                                                <td>{{$i}}</td>
                                                <td>{{$shipment->product->sku}}</td>
                                                <td>{{$shipment->quantity}} </td>
                                                <td>{{$shipment->unit_price}} </td>
                                                <td>{{$shipment->shipping}} </td>
                                                <td> {{$shipment->total}}</td>
                                                <td>{{$shipment->per_unit}} </td>
                                                <td> {{$shipment->paid}}</td>
                                                <td> {{$shipment->payment_method}}</td>
                                                <td> {{$shipment->supplier}}</td>
                                                <td> {{$shipment->date_paid}}</td>
                                                <td>{{$shipment->ship_date}} </td>
                                                <td> {{$shipment->status}}</td>
                                                <td> {{$shipment->carrier}}</td>
                                                <td>{{$shipment->tracking_number}} </td>
                                                <td> {{$shipment->arrived_final}}</td>
                                                <td> {{$shipment->docs==1?'yes':'no'}}</td>
                                                <td>{{$shipment->current_stock}} </td>
                                                <td>{{$shipment->current_price}} </td>


                                                <?php $i++ ?>

                                                <td>
                                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                                                         data-dropdown-toggle="hover" aria-expanded="true">
                                                        <a href="javascript::void(0)"
                                                           class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                                            <i class="la la-plus m--hide"></i>
                                                            <i class="la la-ellipsis-h"></i>
                                                        </a>

                                                        <div class="m-dropdown__wrapper">
                                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"
                                                                  style="left: auto; right: 21.5px;"></span>
                                                            <div class="m-dropdown__inner">
                                                                <div class="m-dropdown__body">
                                                                    <div class="m-dropdown__content">
                                                                        <ul class="m-nav">
                                                                            <li class="m-nav__section m-nav__section--first m--hide">
                                                                                <span class="m-nav__section-text">
                                                                                    Quick Actions
                                                                                </span>
                                                                            </li>

                                                                            <li class="m-nav__item">
                                                                                <a href="/shipment/show/{{$shipment->id}}"
                                                                                   class="m-nav__link">
                                                                                    <i class="m-nav__link-icon flaticon-visible"></i>
                                                                                    <span class="m-nav__link-text">
                                                                                    Show
                                                                                    </span>
                                                                                </a>

                                                                            </li>
                                                                            <br>

                                                                            <li class="m-nav__item">
                                                                                <a href="/shipment/edit/{{ $shipment->id }}"
                                                                                   class="m-nav__link">
                                                                                    <i class="m-nav__link-icon flaticon-visible"></i>
                                                                                    <span class="m-nav__link-text">
                                                                                    Edit
                                                                                    </span>
                                                                                </a>

                                                                            </li>
                                                                            <br>

                                                                            <li class="m-nav__item">
                                                                                <a href="/shipment/delete/{{$shipment->id}}"
                                                                                   class="m-nav__link">
                                                                                    <i class="m-nav__link-icon flaticon-close"></i>
                                                                                    <span class="m-nav__link-text">
                                                                                    Delete
                                                                                    </span>
                                                                                </a>

                                                                            </li>
                                                                            <br>


                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>

                                    </table>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>

                            </div>
                            <!--end::Section-->
                        </div>

                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

