<style>
	.required {
		color: red;
	}

	.card {
		margin-bottom: 5px;
	}
</style>

<style>
	.table-responsive {
		overflow-x: auto;
	}

	.dailyset {
		white-space: nowrap;
	}
</style>

<div id="menu-array" style="display: none;">
	<?php foreach ($po_purchase_meal_dtl as $detail) : ?>
		<tr>
			<td><?php echo $detail->id; ?></td><br>
			<td><?php echo $detail->id_menu; ?></td><br>
			<td><?php echo $detail->date; ?></td><br>
			<td><?php echo $detail->name; ?></td><br>
			<td>Rp. <?php echo $detail->price; ?></td><br><br>
		</tr>
	<?php endforeach; ?>

	<!-- Daily Start-->
	<?php
	$dailyArray = array();
	foreach ($po_purchase_meal_dtl as $detail) {
		foreach ($dailyset as $daily) {
			if ($detail->id_menu == $daily['id']) {
				$dailyArray[$detail->date] = array(
					'id_menu' => $detail->id_menu,
					'price' => $detail->price
				);
			}
		}
	}
	?>
	<!-- Daily End-->


	<!-- Pasta Start-->
	<?php
	$pastaArray = array();
	foreach ($po_purchase_meal_dtl as $detail) {
		foreach ($pastas as $pasta) {
			if ($detail->id_menu == $pasta['id']) {
				$pastaArray[$detail->date] = array(
					'id_menu' => $detail->id_menu,
					'price' => $detail->price
				);
			}
		}
	}
	?>
	<!-- Pasta End-->


	<!-- Breakfast Start-->
	<?php
	$breakfastArray = array();
	foreach ($po_purchase_meal_dtl as $detail) {
		foreach ($breakfasts as $breakfast) {
			if ($detail->id_menu == $breakfast['id']) {
				$breakfastArray[$detail->date][] = array(
					'id_menu' => $detail->id_menu,
					'price' => $detail->price
				);
			}
		}
	}
	?>
	<!-- Breakfast End-->
</div>


<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<!-- Title -->
			<div class="row">
				<div class="col-lg-6">
					<!-- Input Size -->
					<h3 class="title-5 m-b-35">Edit PO Meal</h3>
					<?php if ($this->session->flashdata('message')) { ?>
						<div class="alert alert-info" style="background-color: #4bb543; color: #ffff;">
							<?php echo $this->session->flashdata('message'); ?> <br>
						</div>
					<?php } ?>

					<div class="card">
						<div class="card-header">
							<strong>PO Meal Detail</strong>
						</div>

						<form action="<?php echo site_url('Po_meal/submit2'); ?>" method="post" class="form-horizontal" id="productForm">
							<input type="hidden" name="Id_po" value="<?php echo $this->uri->segment(3) ?>">
							<div class="card-body card-block">
								<div class="row form-group">
									<div class="col col-sm-5">
										<label for="input-normal" class="form-control-label">Title</label>
									</div>
									<div class="col col-sm-6">
										<input type="text" value="<?= $purchase_meal['remark'] ?>" id="input-normal" name="Title" class="form-control" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-sm-5">
										<label for="input-normal" class=" form-control-label">Begin Date</label>
									</div>
									<div class="col col-sm-6">
										<input type="date" value="<?= $purchase_meal['begin_date'] ?>" id="input-normal" name="Begin" class="form-control">
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-sm-5">
										<label for="input-normal" class=" form-control-label">End Date</label>
									</div>
									<div class="col col-sm-6">
										<input type="date" value="<?= $purchase_meal['end_date'] ?>" id="input-normal" name="End" class="form-control">
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-sm-5">
										<label for="input-normal" class=" form-control-label">Status</label>
									</div>
									<div class="col col-sm-6">
										<select name="Status" id="input-normal" class="form-control" required>
											<option value="ACTIVE">Active</option>
											<option value="INACTIVE">Inactive</option>
										</select>
									</div>
								</div>
							</div>

					</div>
				</div>
			</div>


			<!-- Table -->
			<div class="row form-group">
				<div class="col-md-12">
					<!-- DATA TABLE -->
					<div class="table-responsive">
						<table id="dataTable" class="table table-data2">
							<thead>
								<tr>
									<th style="text-align: center; font-size: 16px;"></th>
									<th style="text-align: center; font-size: 16px;" id="date1"></th>
									<th style="text-align: center; font-size: 16px;" id="date2"></th>
									<th style="text-align: center; font-size: 16px;" id="date3"></th>
									<th style="text-align: center; font-size: 16px;" id="date4"></th>
									<th style="text-align: center; font-size: 16px;" id="date5"></th>
									<th style="text-align: center; font-size: 16px;" id="date6"></th>
									<th style="text-align: center; font-size: 16px;" id="date7"></th>
									<th style="text-align: center; font-size: 16px;" id="date8"></th>
									<th style="text-align: center; font-size: 16px;" id="date9"></th>
									<th style="text-align: center; font-size: 16px;" id="date10"></th>
								</tr>
							</thead>

							<!-- Daily Set -->
							<tbody>
								<tr>
									<td rowspan="2" class="align-middle">Daily Set</td>
									<?php
									$dates = $_GET['dates'];
									$dateArray = explode('/', $dates);

									for ($i = 0; $i < 12; $i++) : ?>
										<td class="dailyset">
											<div style="display: flex; align-items: center;">
												<select name="Dailyset_parent[<?= $i ?>]" id="dailyset<?= $i ?>" class="form-control" onchange="checkCheckbox(<?= $i ?>)">
													<option disabled selected>Select Menu..</option>
													<?php foreach ($dailyset as $daily) : ?>
														<option value="<?= $daily['id'] ?>" <?php if (isset($dailyArray[$dateArray[$i]]) && $dailyArray[$dateArray[$i]]['id_menu'] == $daily['id']) echo 'selected'; ?>> <?= $daily['name'] ?></option>
													<?php endforeach; ?>
												</select>

												<input name="Dailyset_price[<?= $i ?>]" type="number" style="width: 30%; margin-left: 7px;" placeholder="Price..." class="form-control" value="<?php if (isset($dailyArray[$dateArray[$i]])) echo $dailyArray[$dateArray[$i]]['price']; ?>" onclick="document.getElementById('open-checkbox<?= $i ?>').checked = true;" oninput="document.getElementById('dailysetParentDate<?= $i ?>').checked = this.value !== '';">
												<input name="Dates[<?= $i ?>]" id="dailysetParentDate<?= $i ?>" type="checkbox" value="<?= $dateArray[$i] ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control" <?php if (isset($dailyArray[$dateArray[$i]]) && $dailyArray[$dateArray[$i]]['price'] != '') echo 'checked'; ?>>
												<input type="checkbox" id="open-checkbox<?= $i ?>" onchange="toggleCheckboxes(<?= $i ?>)" style="display: none;">

											</div>
											<br>
											<?php foreach ($menus as $j => $menu) : ?>
												<div style="display: flex; align-items: center;" class="pb-2">
													<?php
													$matched = false;
													foreach ($po_purchase_meal_dtl as $detail) {
														if ($detail->date == $dateArray[$i] && $detail->id_menu == $menu['id']) {
															$matched = true;
															break;
														}
													}
													?>
													<input name="Id_menu[<?= $i ?>][<?= $j ?>]" id="checkbox<?= $i ?><?= $j ?>" value="<?= $menu['id'] ?>-<?= $menu['category_id'] ?>" type="checkbox" style="margin-right: 7px;" onclick="checkMenuCheckbox(<?= $i ?>, <?= $j ?>)" data-id-menu="<?= $menu['id'] ?>" data-date="<?= $dateArray[$i] ?>" <?php if ($matched) echo 'checked'; ?>>
													<span class="text-dark"><?= wordwrap($menu['name'], 36, "<br />\n", true) ?></span>
													<input name="Price[<?= $i ?>][<?= $j ?>]" type="number" style="width: 120px; margin-left: 7px;" placeholder="Price..." class="form-control" value="<?php if ($matched) echo $detail->price; ?>">
													<input name="Dates[<?= $i ?>][<?= $j ?>]" id="dailysetDate<?= $i ?><?= $j ?>" type="checkbox" value="<?= $dateArray[$i] ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control" <?php if ($matched) echo 'checked'; ?>>
												</div>
											<?php endforeach; ?>
										</td>
									<?php endfor; ?>
								</tr>
							</tbody>


							<tbody>
								<tr>
									<td rowspan="2" class="align-middle">Pasta</td>
									<?php for ($i = 0; $i < 12; $i++) : ?>
										<td class="pasta">
											<select name="Pasta_parent[<?= $i ?>]" id="pasta<?= $i ?>" class="form-control" onchange="document.getElementById('pastaDate<?= $i ?>').checked = this.value !== '';">
												<option disabled selected>Select Menu..</option>
												<?php foreach ($pastas as $pasta) : ?>
													<option value="<?= $pasta['id'] ?>" <?php if (isset($pastaArray[$dateArray[$i]]) && $pastaArray[$dateArray[$i]]['id_menu'] == $pasta['id']) echo 'selected'; ?>> <?= $pasta['name'] ?></option>
												<?php endforeach; ?>
											</select>
											<input type="number" name="Pasta_price[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2" value="<?php if (isset($pastaArray[$dateArray[$i]])) echo $pastaArray[$dateArray[$i]]['price']; ?>" oninput="document.getElementById('pastaDate<?= $i ?>').checked = this.value !== '';">
											<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="pastaDate<?= $i ?>" value="<?= $dateArray[$i] ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control" <?php if (isset($pastaArray[$dateArray[$i]]) && $pastaArray[$dateArray[$i]]['price'] != '') echo 'checked'; ?>>
										</td>
									<?php endfor; ?>
								</tr>
							</tbody>



							<tbody>
								<tr class="tr">
									<td rowspan="2" class="align-middle">Breakfast and Stall</td>
									<?php for ($i = 0; $i < 12; $i++) : ?>
										<td class="breakfast">
											<?php
											$breakfastDetails = isset($breakfastArray[$dateArray[$i]]) ? $breakfastArray[$dateArray[$i]] : [];
											for ($j = 0; $j < 3; $j++) {
												$detail = isset($breakfastDetails[$j]) ? $breakfastDetails[$j] : null;
											?>
												<select name="Breakfast_parent<?= $j + 1 ?>[<?= $i ?>]" id="breakfast<?= $j + 1 ?><?= $i ?>" class="form-control" onchange="document.getElementById('breakfastDate<?= $j + 1 ?><?= $i ?>').checked = this.value !== '';">
													<option disabled selected>Select Menu..</option>
													<?php foreach ($breakfasts as $breakfast) : ?>
														<option value="<?= $breakfast['id'] ?>" <?= $detail && $detail['id_menu'] == $breakfast['id'] ? 'selected' : '' ?>><?= $breakfast['name'] ?></option>
													<?php endforeach; ?>
												</select>
												<input type="number" name="Breakfast_price<?= $j + 1 ?>[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2" value="<?= $detail ? $detail['price'] : '' ?>" oninput="document.getElementById('breakfastDate<?= $j + 1 ?><?= $i ?>').checked = this.value !== '';">
												<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="breakfastDate<?= $j + 1 ?><?= $i ?>" value="<?= $dateArray[$i] ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control" <?php if ($detail && $detail['price'] != '') echo 'checked'; ?>>
												<br><br>
											<?php } ?>
										</td>
									<?php endfor; ?>
								</tr>
							</tbody>



							<!--<tbody>
								<tr class="tr">
									<td rowspan="2" class="align-middle">Breakfast and Stall</td>
									<?php for ($i = 0; $i < 12; $i++) : ?>
										<td class="breakfast">
											<?php
											$defaultValues = isset($matchedDetails[$dateArray[$i]]) ? $matchedDetails[$dateArray[$i]] : [];
											for ($j = 1; $j <= 3; $j++) :
												$defaultValue = isset($defaultValues[$j - 1]) ? $defaultValues[$j - 1] : '';
											?>
												<select name="Breakfast_parent<?= $j ?>[<?= $i ?>]" id="breakfast<?= $j ?><?= $i ?>" class="form-control" onchange="document.getElementById('breakfastDate<?= $j ?><?= $i ?>').checked = this.value !== '';">
													<option disabled <?= empty($defaultValue) ? 'selected' : '' ?>>Select Menu..</option>
													<?php foreach ($breakfasts as $breakfast) : ?>
														<option value="<?= $breakfast['id'] ?>-<?= $dateArray[$i] ?>" <?= $breakfast['id'] == $defaultValue ? 'selected' : '' ?>><?= $breakfast['name'] ?></option>
													<?php endforeach; ?>
												</select>
												<input type="number" name="Breakfast_price<?= $j ?>[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2">
												<br><br>
											<?php endfor; ?>
										</td>
									<?php endfor; ?>
								</tr>
							</tbody>-->

						</table>
					</div>
					<!-- END DATA TABLE -->

				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter" onclick="return validatePrices()">Submit</button>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Pop-up -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Confirm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure to submit?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-primary">Yes</button>
			</div>
		</div>
	</div>
</div>
</form>



<script>
	document.addEventListener("DOMContentLoaded", function() {
		var beginDate = new Date(document.getElementsByName("Begin")[0].value);
		var endDate = new Date(document.getElementsByName("End")[0].value);

		var dateRange = [];
		var currentDate = new Date(beginDate);
		while (currentDate <= endDate) {
			if (currentDate.getDay() !== 0 && currentDate.getDay() !== 6) {
				dateRange.push(new Date(currentDate));
			}
			currentDate.setDate(currentDate.getDate() + 1);
		}

		var tableHeaders = document.querySelectorAll("th[id^='date']");
		for (var i = 0; i < tableHeaders.length && i < dateRange.length; i++) {
			tableHeaders[i].textContent = formatDate(dateRange[i]);
		}

		var dailyset = document.querySelectorAll('.dailyset');
		var pasta = document.querySelectorAll('.pasta');
		var breakfast = document.querySelectorAll('.breakfast');
		[dailyset, pasta, breakfast].forEach(function(category) {
			category.forEach(function(td, index) {
				if (index < dateRange.length) {
					td.style.display = 'table-cell';
				} else {
					td.style.display = 'none';
				}
			});
		});
	});

	function formatDate(date) {
		var day = date.getDate();
		var month = date.getMonth() + 1;
		var year = date.getFullYear();

		day = (day < 10) ? '0' + day : day;
		month = (month < 10) ? '0' + month : month;

		return day + '/' + month + '/' + year;
	}
</script>

<script>
	window.onload = function() {
		<?php foreach ($po_purchase_meal_dtl as $detail) : ?>
			var checkboxes = document.querySelectorAll('input[data-id-menu="<?php echo $detail->id_menu; ?>"][data-date="<?php echo $detail->date; ?>"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = true;
			});
		<?php endforeach; ?>
	};
</script>


<script>
	function checkMenuCheckbox(i, j) {
		var checkbox = document.getElementById('checkbox' + i + j);
		var dateCheckbox = document.getElementById('dailysetDate' + i + j);

		if (checkbox.checked) {
			dateCheckbox.checked = true;
		} else {
			dateCheckbox.checked = false;
		}
	}
</script>