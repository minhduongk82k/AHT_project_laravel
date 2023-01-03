@extends("frontend/master/master")
@section("title","Vietpro Store - Chi tiết sản phẩm ")
@section("main")
		<!-- main -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-5">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(../uploads/{{$product['image']}});">

										</div>

									</div>
								</div>
								<div class="col-md-7">
									<form action="/gio-hang/them-hang/{{$product['id']}}" method="GET">

										<div class="desc">
											<h3>{{$product['name']}} {{$product['code']}}</h3>
											<p class="price">
												<span>{{$product['price']}}</span>
											</p>
											<p>Thông tin</p>
											<p style="text-align: justify;">
												{{$product["info"]}}
											</p>
										
									
											<div class="row row-pb-sm">
												<div class="col-md-4">
													<div class="input-group">
														<span class="input-group-btn">
															<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
																<i class="icon-minus2"></i>
															</button>
														</span>
														<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
														<span class="input-group-btn">
															<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
																<i class="icon-plus2"></i>
															</button>
														</span>
													</div>
												</div>
											</div>
											<input type="hidden" name="id_product" value="1">
											<p><button class="btn btn-primary btn-addtocart" type="submit"> Thêm vào giỏ hàng</button></p>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-12 tabulation">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
								</ul>
								<div class="tab-content">
									<div id="description" class="tab-pane fade in active">
										{{$product['describer']}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm Mới</span></h2>
					</div>
				</div>
				<div class="row">

					@foreach($products as $item)
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(../uploads/{{$item['image']}});">
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i
										class="icon-shopping-cart"></i></a></span>
										<span><a href="/san-pham/{{$item['slug']}}.html"><i class="icon-eye"></i></a></span>
										
										
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="/san-pham/{{$item['slug']}}.html">{{$item['name']}}</a></h3>
								<p class="price"><span>{{$item['price']}}</span></p>
							</div>
						</div>
					</div>
					
					@endforeach

				</div>
			</div>
		</div>
		<!-- end main -->

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>

<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>



<!-- Main -->
<script src="js/main.js"></script>
<script>
	$(document).ready(function () {

		var quantitiy = 0;
		$('.quantity-right-plus').click(function (e) {

			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			$('#quantity').val(quantity + 1);


			// Increment

		});

		$('.quantity-left-minus').click(function (e) {
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			if (quantity > 0) {
				$('#quantity').val(quantity - 1);
			}
		});

	});
</script>

@endsection
