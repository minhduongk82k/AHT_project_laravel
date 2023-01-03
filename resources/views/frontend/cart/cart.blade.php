@extends("frontend/master/master")
@section("title","Vietpro Store - Giỏ hàng ")
@section("main")
<!-- main -->
<div class="colorlib-shop">
	<div class="container">
		<div class="row row-pb-md">
			<div class="col-md-10 col-md-offset-1">
				<div class="process-wrap">
					<div class="process text-center active">
						<p><span>01</span></p>
						<h3>Giỏ hàng</h3>
					</div>
					<div class="process text-center">
						<p><span>02</span></p>
						<h3>Thanh toán</h3>
					</div>
					<div class="process text-center">
						<p><span>03</span></p>
						<h3>Hoàn tất thanh toán</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row row-pb-md">
			<div class="col-md-10 col-md-offset-1">
				<div class="product-name">
					<div class="one-forth text-center">
						<span>Chi tiết sản phẩm</span>
					</div>
					<div class="one-eight text-center">
						<span>Giá</span>
					</div>
					<div class="one-eight text-center">
						<span>Số lượng</span>
					</div>
					<div class="one-eight text-center">
						<span>Tổng</span>
					</div>
					<div class="one-eight text-center">
						<span>Xóa</span>
					</div>
				</div>
				@foreach($cart as $item)
				<div class="product-cart">
					<div class="one-forth">
						<div class="product-img">
							<img class="img-thumbnail cart-img" src="../uploads/{{$item->options->image}}">
						</div>
						<div class="detail-buy">
							<h4>Mã : {{$item->options->code}}</h4>
							<h5>{{$item->name}}</h5>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<span class="price">{{number_format($item->price)}}</span>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<input onchange="updateCart('{{$item->rowId}}',this.value);" type="number" id="quantity" name="quantity" class="form-control input-number text-center" value="{{$item->qty}}">
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<span class="price">{{number_format($item->price*$item->qty)}}</span>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<!-- Button trigger modal -->
							<a type="button" class="closed" data-toggle="modal" data-target="#exampleModal"> </a>

							<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" style="margin-top: 10%;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											Bạn có chắc chắn muốn xóa sản phẩm này không?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
											<a href="/gio-hang/xoa-hang/{{$item->rowId}}" class="btn btn-primary"> Lưu thay đổi </a>

											<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
										</div>
									</div>
								</div>
							</div>
							<!-- <a href="/gio-hang/xoa-hang/{{$item->rowId}}" class="closed"></a> -->
						</div>
					</div>
				</div>
				@endforeach


			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="total-wrap">
					<div class="row">
						<div class="col-md-8">

						</div>
						<div class="col-md-3 col-md-push-1 text-center">
							<div class="total">
								<!-- <div class="sub">
									<p><span>Tổng:</span> <span>{{$priceTotal}} đ</span></p>
								</div> -->
								<div class="grand-total">
									<p><span><strong>Tổng cộng:</strong></span> <span>{{$priceTotal}} vnđ</span></p>
									<a href="/gio-hang/thanh-toan.html" class="btn btn-primary">Thanh toán <i class="icon-arrow-right-circle"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
	function updateCart(rowId, qty) {
		$.get("/gio-hang/cap-nhat-gio-hang/" + rowId + "/" + qty, function(data, status) {
			if (data === "updated") {
				location.reload();
			} else {
				alert(" update không thành công");
			}
		});
	}

	$(document).ready(function() {

		var quantitiy = 0;
		$('.quantity-right-plus').click(function(e) {

			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			$('#quantity').val(quantity + 1);


			// Increment

		});

		$('.quantity-left-minus').click(function(e) {
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