<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Order Summary</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Food Order</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/css/main.css">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Viga&display=swap" rel="stylesheet">

		<!-- edit disini, pakai jquery -->
		<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<!-- akhir disini -->
	</head>

	<body>
		<div class="main-content">
			<div class="section__content section__content--p30">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row">
						<div class="col-lg-12">
							<!-- Input Size -->
							<?php if ($this->session->flashdata('thank_you_note')) : ?>
							<p class="thanks_label alert alert-success"><?php echo $this->session->flashdata('thank_you_note'); ?></p>
							<?php endif; ?>
							<?php if ($this->session->flashdata('error_message')) : ?>
							<p class="thanks_label"><?php echo $this->session->flashdata('thank_you_note'); ?></p>
							<?php endif; ?>
							<div class="card">
								<div class="card-header d-flex align-items-center">
									<span class="font-weight-bold">Order Summary</span>
								</div>
								<div class="card-body card-block body-text">
									<p>Email: <?php echo $order_details->email; ?></p>
									<p>Student Name: <?php echo $order_details->student_name; ?></p>
									<p>Grade Level: <?php echo $order_details->grade_level; ?></p>
									<p>Parent Phone Number: <?php echo $order_details->parent_phone_number; ?></p>
								</div>

								<!-- TABEL AWAL (kating) MULAI DARI SINI -->

								<!-- START EDIT DISINI -->
								<div class="table-responsive card-body card-block body-text">
									<?php if (!empty($order_menus)): ?>
									<table id="table-id" class="table table-striped table-hover">
										<thead>
											<tr>
												<th style="width:5%;">No.</th>
												<th style="width:25%;">Menu</th>
												<th style="width:25%;">Date</th>
												<th style="width:20%;">Price</th>
											</tr>
										</thead>
										<tbody>
											<!-- bikin 1 array nampung data childnya -->
											<?php $list_idmenu_parent = array() ;?> <!-- simpen id menu dia brp -->
											<?php foreach ($order_menus as $item): ?>
											<!-- simpen kategori parent  -->
											<?php array_push($list_idmenu_parent, $item['id_menu']); ?>
											<?php endforeach; ?>
											<!-- jumlahin harga dari menu makanan yang gapunya parent, dan klo ada parent tapi parent dia gaada di array id menu order item  -->
											<?php $i = 1; $temp_price = 0; ?>
											<?php foreach($order_menus as $item): ?>
											<?php if ($item['parent']==0 
												|| ($item['parent']!=0 && !in_array($item['parent'], $list_idmenu_parent))): ?>
											<tr>
												<td style="text-align:center;"><?php echo $i; ?></td>
												<td>
													<?php echo $item['name']; ?>
													<!-- list foreach loop cari anak2nya disini -->
													<ul>
														<?php foreach ($order_menus as $item2): ?>
														<?php if ($item2['parent']==$item['id_menu']): ?>
														<li><?php echo $item2['name'];?></li>
														<?php endif; ?>
														<?php endforeach;?>
													</ul>
												</td>
												<td><?php echo $item['date']; ?></td>
												<td style="text-align:center;"><?php echo $item['price']; ?></td>
											</tr>
											<?php $i += 1; ?>
											<?php endif; ?>
											<?php if($item['parent']==0 //daily set 1, pasta, dll yg gpnya parent
												|| ($item['parent']!=0 && !in_array($item['parent'], $list_idmenu_parent)) //pilih anak dari daily set doang, terpisah daily setnya
												) 
												
												    $temp_price += $item['price']; ?>
											<?php endforeach; ?>
										</tbody>
										<tfoot>
											<tr data-sortable="false">
												<td data-sortable="false" style="text-align:right;" colspan="3">
													<b>Total</b>
												</td>
												<td data-sortable="false" style="text-align:center;">
													<?php 
													// ganti jadi currency													
													echo "Rp. ".number_format($temp_price, 0, ',', '.'); ?>
												</td>
											</tr>
										</tfoot>
									</table>
									<?php else: ?>
									<p>No menu items found for the selected order.</p>
									<?php endif; ?>
								</div>
								<!-- END DISINI --> 


								<div class="card-body card-block body-text">
									<p style="font-weight:bold; font-style: italic;">
										Thank you for submitting Pre Order Purchase, our canteen team will prepare your requested order and you can pick up your order at Bamboo Court or request delivery to the classroom (only for EYES Students).
									</p>
									<p style="font-weight:bold; font-style: italic;">
										There is NO CANCELLATION for the food that has been ordered.
									</p>
									<p style="font-weight: bold; font-style: italic;">
										You need to pay your food order directly at Canteen's cashier by using your ID card or do transfer payment to School Account:
									</p>
									<p style="font-weight:bold; font-style: italic;">
										0000554103 (Bank Sinarmas)
									</p>
									<p style="font-weight:bold; font-style: italic;">
										or
									</p>
									<p style="font-weight:bold; font-style: italic;">
										4970350018 (BCA).
									</p>
									<p style="font-weight:bold; font-style: italic;">
										Please view the total amount which needs to be transferred in the pre order form.
									</p>
									<p style="font-weight: bold; font-style: italic;">
										Orders will only be processed & prepared by the Canteen Staff when the proof of payment has been received, don't forget to send the proof of transfer to following email <a href="mailto:finance@swa-jkt.com">finance@swa-jkt.com</a> and <a href="mailto:ervi_liu@swa-jkt.com">ervi_liu@swa-jkt.com</a>.
									</p>
									<p style="font-weight:bold; font-style: italic;">
										Thank you for your kind understanding & cooperation.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</body>

</html>