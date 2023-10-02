
<div class="container">
	<div class="row">
		<div class="box">
			<!-- Checkout content section start -->
			<section class="pages checkout section-padding">
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							<div class="main-input single-cart-form padding60">
								<div class="log-title">
									<h3><strong>Chi tiết hóa đơn</strong></h3>
								</div>
								<div class="custom-input">
									<form action="?mod=checkout&act=checkout&xuli=save" method="post">
										<input type="text" name="NguoiNhan" placeholder="Người nhận" required value="<?php echo $_SESSION['login']['Ho']." ".$_SESSION['login']['Ten']  ?>"/>
										<input type="email" name="Email" placeholder="Địa chỉ Email.." required  value="<?=$_SESSION['login']['Email']?>"/>
										<input type="text" name="SDT" placeholder="Số điện thoại.." required pattern="[0-9]+" minlength="10"  value="<?=$_SESSION['login']['SDT']?>"/>
										<input type="text" name="DiaChi" placeholder="Đại chỉ giao hàng" required  value="<?=$_SESSION['login']['DiaChi']?>"/>
										</br>
										<div class="submit-text">
											<button type="submit">Thanh toán</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-9">
							<div class="padding60">
								<div class="log-title">
									<h3><strong>Hóa đơn</strong></h3>
								</div>
								<div class="cart-form-text pay-details table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
										<tr>
											<th scope="col"><b><u>Hình ảnh</u></b></th>
											<th scope="col"><b><u>Tên</u></b></th>
											<th scope="col"><b><u>Giá</u></b></th>
											<th scope="col"><b><u>Số lượng</u></b></th>
											<th scope="col"><b><u>Tổng</u></b></th>
										</tr>
										</thead>
										<tbody>
										<?php
										if (isset($_SESSION['nguyenlieu'])) {
											foreach ($_SESSION['nguyenlieu'] as $value) { ?>
												<tr>
												<td><img src="public/img/nguyenlieu/<?= $value['Hinhanh_NL'] ?>"/></td>
												<td><b><?= $value['TenNL'] ?></b></td>
												<td><b><?= number_format($value['DonGia']) ?> VNĐ</b></td> 
												<td><b>													
													<b class="plus-minus-box"><?= $value['SoLuong'] ?></b>										
												</b></td>
												<td><b><strong><?= number_format($value['ThanhTien']) ?> VNĐ</strong></b></td> 												
												</tr>
									<?php }
											} ?>
										</tbody>
									</table>
									<script>
									$(document).ready(function() {
										$('#dataTable').DataTable();
									});
									</script>
									<hr>
									<table>
										<tbody>
											<tr>
												<th>Tổng Giỏ Hàng</th>
												<?php 
													$count=0;
													foreach ($_SESSION['nguyenlieu'] as $value) {
														$count += $value['ThanhTien'];
													}
												?>
												<td><?= number_format($count)?> VNĐ</td> 
											</tr>
											<tr>
												<th>Vận Chuyển</th>
												<td>15,000 VNĐ</td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<th class="tfoot-padd">Tổng tiền</th>
												<td class="tfoot-padd"><?=number_format($count+15000)?> VNĐ</td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Checkout content section end -->
		</div>
	</div>
</div>



    
</body>

</html>