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
                                       Stock Page
                                    </h3>
                                </div>
                            </div>

                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                                             data-dropdown-toggle="hover" aria-expanded="true">
                                             <a href="/stocks/export"
                        {{-- class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle"> --}}
                         <button class="btn btn-primary float-xl-right" style="margin-top:15px;">Download to XLSX</button>
                     </a>
                     <a class="btn btn-primary" data-toggle="modal" data-target="#myDispatch" style="margin-left:40px;margin-top:15px;" href="">Upload sales XLSX</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="modal fade" id="myDispatch">
                            <div class="modal-dialog" role="document" style="margin: 0 0 !important;left: 30% !important;">
                            <div class="modal-content">
                            <form action="{{url('/stocks/import')}}" enctype="multipart/form-data" method="post">

                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                            Import XLSX
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                            ×
                            </span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <div class="m-widget4">

                            {{csrf_field()}}
                            <input type="hidden" name="id" class="eq_status_id">
                            <div class="m-widget4">
                            <h2>Choose File</h2>

                            <div class="form-group m-form__group">
                                <label class="custom-file">
                                    <input type="file" id="file2" class="custom-file-input" data-preview="#preview" name="file">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                            </div>

                            </div>

                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                            </button>

                            <button type="submit" class="btn btn-success">
                            Submit
                            </button>
                            </div>
                            </form>

                            </div>


                            </div>
                            </div>
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
                                            <th>Image</th>
                                            <th>Sku</th>
                                            <th>Current Price</th>
                                            <th>Current Stock</th>
                                            <th>Daily-Avg(month)</th>
                                            <th>Daily-Avg(week)</th>
                                            <th>Day to OOS</th>
                                            <th>On the way</th>
                                            <th>Money on stock</th>
                                            <th>Total money on stock</th>


                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php  $i = 1  ?>
                                        @foreach($shipment as $key => $ship)

                                          <tr>

                                                <td>{{$i}}</td>
                                                <td>
                                            @if($ship->product)
                                        <img width="50px" src="{{ asset('images/product/'.$ship->product->image) }}">
                                            @else
                                            <img width="50px" src="/images/no_image.png">

                                            @endif</td>
                                                <td>{{$ship->product->sku }}</td>
                                                <td>{{$ship->current_price}}</td>
                                                <td>{{ $current_stock[$key]->current_stock}}</td>


                                                @if(isset($month[$key]->quantity))

                                                      <td>{{ $month[$key]->quantity/30 }}</td>

                                                    @else
                                                    <td>No sales yet</td>
                                                @endif

                                                @if(isset($week[$key]->quantity))


                                                    <td>{{ $week[$key]->quantity/7 }}</td>


                                                    @else
                                                    <td>No sales yet</td>
                                                @endif
                                                @if (isset($current_stock[$key]->current_stock)&& isset($month[$key]->quantity))

                                                    <td>{{round( $current_stock[$key]->current_stock/$month[$key]->quantity)}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if (isset($otw[$key]->quantity))

                                                    <td>{{$otw[$key]->quantity}}</td>

                                                @else
                                                <td></td>

                                                @endif
                                                @if(isset($money_s[$key]->total))

                                                    <td>{{$money_s[$key]->total}}</td>

                                                @else
                                                <td></td>
                                                @endif

                                                @if(isset($money_s[$key]->total))

                                                    <td>{{$money_s[$key]->sum('total')}}</td>

                                                @else
                                                <td></td>
                                                @endif

                                                <?php $i++ ?>


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

