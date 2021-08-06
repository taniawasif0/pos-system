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
                                       Products
                                    </h3>
                                </div>
                            </div>

                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                                             data-dropdown-toggle="hover" aria-expanded="true">
                                             <a href="/create"
                        {{-- class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle"> --}}
                         <button class="btn btn-primary float-xl-right" style="margin-top:15px;">Add new product</button>
                     </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div class="m-portlet__body">
                            <!--begin::Section-->
                            <div class="m-section">
                                <div class="m-section__content">
                                    <table class="table m-table m-table--head-bg-success" id=myTable>
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Sku</th>
                                            <th>Image</th>
                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php  $i = ($products->currentpage()-1)* $products->perpage() + 1;   ?>
                                        @foreach($products as $key => $product)

                                          <tr>

                                                <td>{{$i}}</td>
                                                <td><a style="text-decoration:none;color:inherit" href="employees/{{$product->id}}">{{$product->sku}}</a></td>
                                                <td>
                                                    @if($product->image)
                                                            <img width="50px" src="{{ asset('images/product/'.$product->image) }}">
                                                    @else
                                                    <img width="50px" src="/images/no_image.png">

                                                    @endif
                                                </td>

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
                                                                                <a href="/show/{{$product->id}}"
                                                                                   class="m-nav__link">
                                                                                    <i class="m-nav__link-icon flaticon-visible"></i>
                                                                                    <span class="m-nav__link-text">
                                                                                    Show
                                                                                    </span>
                                                                                </a>

                                                                            </li>
                                                                            <br>

                                                                            <li class="m-nav__item">
                                                                                <a href="/product/edit/{{$product->id}}"
                                                                                   class="m-nav__link">
                                                                                    <i class="m-nav__link-icon flaticon-visible"></i>
                                                                                    <span class="m-nav__link-text">
                                                                                    Edit
                                                                                    </span>
                                                                                </a>

                                                                            </li>
                                                                            <br>

                                                                            <li class="m-nav__item">
                                                                                <a href="/delete/{{$product->id}}"
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

