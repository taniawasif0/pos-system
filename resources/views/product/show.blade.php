@extends('master')
@section('content')


	<div class="m-grid__item m-grid__item--fluid m-wrapper">

		<div class="m-content">
			<div class="row">
				<div class="col-lg-12">
					<!--begin::Portlet-->
					<div class="m-portlet">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
									<h3 class="m-portlet__head-text">
									Product Detail
									</h3>
								</div>
							</div>
						</div>
						<!--begin::Form-->
						<form class="m-form" method="POST" enctype="multipart/form-data" action="{{url('/edit/'.$product->id)}}">
							@csrf
							<div class="m-portlet__body">
								<div class="m-form__section m-form__section--first">
                                    <h3>
                                        Sku
                                    </h3>
									<div class="form-group m-form__group">
                                       <h4> {{$product->sku}}</h4>
                                    <hr>
                                       <div>
                                        <img width="150px" height="150px" class="" src="{{URL::asset('images/product/'.$product->image) }}">
                                    </div>

                                    {{--  <div class="form-group m-form__group">
                                        <label >
                                            Select Product Image
                                        </label>
                                        <div>
                                        <label class="custom-file">
                                            <input type="file" id="file2" class="custom-file-input" data-preview="#preview" name="image">
                                            <span class="custom-file-control"></span>
                                        </label>
                                    </div>  --}}


								</div>
							</div>
							<div class="m-portlet__foot m-portlet__foot--fit">
								<div class="m-form__actions m-form__actions">
									<a class="btn btn-primary float-xl-right" href="/products/index">
                                        back
                                </a>
								</div>
							</div>
						</form>
						<!--end::Form-->
					</div>
					<!--end::Portlet-->
					<!--begin::Portlet-->

					<!--end::Portlet-->
				</div>
				<div class="col-lg-6">
					<!--begin::Portlet-->

					<!--end::Portlet-->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!--begin::Portlet-->

					<!--begin::Portlet-->

					<!--end::Portlet-->
					<!--begin::Portlet-->

				</div>
			</div>
		</div>
	</div>
	</div>
@endsection
