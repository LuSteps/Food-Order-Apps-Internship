<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
	.input[readonly] {
		background-color: white;
	}

	.required {
		color: red;
	}

	.table-data2 {
		margin-left: 16px;
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

<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<!-- Title -->



			<div class="row form-group">
				<div class="col-lg-6">
					<h3 class="title-5 m-b-35">New PO Meal</h3>
					<?php if ($this->session->flashdata('message')): ?>
						<div class="alert alert-info" style="background-color: #4bb543; color: #ffff;">
							<?php echo $this->session->flashdata('message'); ?> <br>
							<a id="checkLink" href="/SWA-food-order-form/admin/po_meal/history_po_meal">Check PO</a>
						</div>
					<?php endif; ?>

					<div class="card">
						<div class="card-header">
							<strong>PO Meal Detail</strong>
						</div>

						<form action="<?php echo site_url('Po_meal/submit'); ?>" method="post" class="form-horizontal" id="productForm" name="menuForm">
							<div class="card-body card-block">
								<div class="row form-group">
									<div class="col col-sm-5">
										<label for="input-normal" class="form-control-label">Title <span class="required">*</span></label>
									</div>
									<div class="col col-sm-6">
										<input type="text" id="input-normal" name="Title" placeholder="Type here..." class="form-control" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-sm-5">
										<label for="input-normal" class=" form-control-label">Begin Date <span class="required">*</span></label>
									</div>
									<div class="col col-sm-6">
										<input type="date" id="input-normal" name="Begin" placeholder="Type here..." class="form-control" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-sm-5">
										<label for="input-normal" class=" form-control-label">End Date <span class="required">*</span></label>
									</div>
									<div class="col col-sm-6">
										<input type="date" id="input-normal" name="End" placeholder="Type here..." class="form-control" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-sm-5">
										<label for="input-normal" class=" form-control-label">Status <span class="required">*</span></label>
									</div>
									<div class="col col-sm-6">
										<select name="Status" id="input-normal" class="form-control" required>
											<option value="ACTIVE">Active</option>
											<option value="INACTIVE">Inactive</option>
										</select>
									</div>
								</div>
							</div>

							<div class="generate-btn ml-3 mb-3">
								<button type="button" class="btn btn-secondary">Generate</button>
							</div>
					</div>

				</div>
			</div>
		</div>


		<!-- Table -->
		<div class="row form-group" style="margin-top:10px;">
			<div class="col-md-12">
				<!-- DATA TABLE -->
				<div class="table-responsive">
					<table id="dataTable" class="table table-data2">

						<thead> <!-- buat tanggal untuk headernya  -->
							<tr>
								<th style="text-align: center; font-size: 16px;"></th>
								<?php
									$dates = isset($_GET['dates']) ? explode(',', $_GET['dates']) : array();
									$size = count($dates);
					
									$num_of_dates = 0;
									foreach ($dates as $d): ?>
										<th style="text-align: center; font-size: 16px; background: red; color: white; border: 1px solid;" id="date<?= $num_of_dates+1 ?>"></th>
										<?php $num_of_dates += 1; ?>
								<?php endforeach; ?>
							</tr>
						</thead>
												

						<!-- Daily Set -->
						<tbody>
							<tr>
								<td rowspan="2" class="align-middle">Daily Set</td>
								<?php for ($i = 0; $i < 12; $i++) : ?>
									<!-- Daily Set -->
									<td class="dailyset" style="vertical-align:top;">
										<div style="display: flex; align-items: center; width: 450px;">
											<select name="Dailyset_parent[<?= $i ?>]" id="dailyset<?= $i ?>" class="form-control" onchange="checkCheckbox(<?= $i ?>)">
												<option disabled selected>Select Menu..</option>
												<?php foreach ($dailyset as $daily) : ?>
													<option value="<?= $daily['id'] ?>"> <?= $daily['name'] ?></option>
												<?php endforeach; ?>
											</select>
											<input id="dailyset_price_<?= $i ?>" name="Dailyset_price[<?= $i ?>]" type="number" style="width: 30%; margin-left: 7px;" placeholder="Price..." class="form-control" onclick="document.getElementById('open-checkbox<?= $i ?>').checked = true;">
											
											<input name="Dates[<?= $i ?>]" id="dailysetParentDate<?= $i ?>" type="hidden" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; ;" class="form-control">
											
											<input type="checkbox" id="open-checkbox<?= $i ?>" onchange="toggleCheckboxes(<?= $i ?>)" style="display: none;">
										</div>
										<br>
										
										<!-- tes SEMUA IN ONE -->
										<div style="display: flex; flex-direction: column;" class="dailyset-detail pb-2">
											<?php foreach ($categories as $category) :?>
													<?php 
														$ori_name = $category['category'];

														// buat id, pake regex
														$category['category'] = preg_replace('/[^a-zA-Z0-9]+/', '', $category['category']);

													?>

													<!-- <?php //if (!in_array($category['id'], array(1, 3, 4))): ?> CATAT INDEKS DAILY SET, PASTA, DAN BREAKFAST DISINI KRN MSH HARD CODE -->
														<?php if (!in_array($category['category'], array("DailySet", "Pasta", "BreakfastandStall"))): ?>
														<!-- Collapsible section for the current category -->
														<div class="<?= $category['category'] ?>-collapse pb-2">
															<a style="width: 250px;" class="btn btn-primary" data-toggle="collapse" href="#<?= $category['category'] ?>Menu<?= $i ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
																<?= $ori_name ?>
															</a>

															<input name="Dates[<?= $i ?>][<?= $i ?>]" id="dailysetDate<?= $i ?>" type="hidden" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display:  ;" class="form-control">

															<input id="priceView<?=$category['category']?>[<?=$i?>]" name="<?=$category['category']?>_price[<?= $i ?>]" type="number" style="width: 120px; float:right; background-color: white;" placeholder="Price..." class="form-control" readonly>

															

															<div class="collapse" id="<?= $category['category'] ?>Menu<?= $i ?>" style="overflow-y:scroll; max-height:300px;">
																<div class="card card-body">

																<input type="hidden" id="<?=$category['category']?>_menu_selected[<?= $i ?>]" name="<?=$category['category']?>Select[<?= $i ?>]" class="form-control">


																<?php $id_menu_selected = 0; foreach ($menus as $menu) : ?>
																	<!-- cari menu anaknya -->
																	<?php $id_menu_selected += 1; if ($menu['category_id']==$category['id']) :?>
																		<div class="form-group row align-items-center">
																			<div class="col">
																				<div class="form-check">
																					<input class="form-check-input" type="radio" name="<?= str_replace(' ', '', $category['category']) ?>_menu[<?= $i ?>]" 
																					

																					id="<?= $id_menu_selected; ?>_radio<?=$category['category']?>[<?=$i?>]">

					


																					<label class="form-check-label" for="flexRadioDefault1">
																						<span class="text-dark"><?= wordwrap($menu['name'], 25, "<br />\n", true) ?></span>
																					</label>
																				</div>
																			</div>
																			<div class="col">
																				<!-- <input type="number" name="Price[<?= $i ?>][<?= $menu['id'] ?>]" placeholder="Enter price.." class="form-control mt-2"> -->
																			</div>
																		</div>
																	<?php endif; ?>
																<?php endforeach; ?>


																</div>
															</div>
														</div>
													<?php endif; ?>
												<?php endforeach; ?>

										</div>
									</td>
								<?php endfor; ?>
							</tr>

				

						</tbody>



						<tbody>
							<tr>
								<td rowspan="2" class="align-middle">Pasta</td>
								<?php for ($i = 0; $i < 12; $i++) : ?>
									<td class="pasta" style="vertical-align:top;">
										<!-- Pasta -->
										<div class="pasta-collapse pb-2" ]>
											<a style="width: 250px;" class="btn btn-primary" data-toggle="collapse" href="#pastaMenu<?= $i ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
												Pasta Menu
											</a>

											<input name="Dates[<?= $i ?>]" id="pastaDate<?= $i ?>" type="hidden" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display:  ;" class="form-control">

											
											<input type="hidden" id="Pasta_menu_selected[<?= $i ?>]" name="PastaSelect[<?= $i ?>]" class="form-control">

											<input readonly id="priceViewPasta[<?= $i ?>]" name="Pasta_price[<?= $i ?>]" type="number" style="width: 30%; margin-left: 7px; float:right; background-color:white;" placeholder="Price..." class="form-control" onclick="document.getElementById('open-checkbox<?= $i ?>').checked = true;">
											<!-- <input type="number" name="Pasta_price[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2" style="float:right;"> -->

											<div class="collapse" id="pastaMenu<?= $i ?>" style="overflow-y:scroll; max-height:300px;">
												<div class="card card-body">
													<?php $index_menu=-1; 
													foreach ($menus as $menu) : ?>
															<?php $index_menu += 1; ?>
														<!-- cari menu anaknya -->
														<?php if ($menu['category_id']==3) :?>
															
															<div class="form-group row align-items-center">
																<div class="col">
																	<div class="form-check">
																		<input class="form-check-input" type="radio" name="PastaCheckbox[<?= $i ?>]" id="<?= $index_menu ?>_radioPasta[<?= $i ?>]">
																		<label class="form-check-label" for="flexRadioDefault1">
																			<span class="text-dark"><?= wordwrap($menu['name'], 25, "<br />\n", true) ?></span>
																		</label>
																	</div>
																</div>
																<div class="col">
																	<!-- <input type="number" name="Price[<?= $i ?>][<?= $menu['id'] ?>]" placeholder="Enter price.." class="form-control mt-2"> -->
																</div>
															</div>
														<?php endif; ?>

													<?php endforeach; ?>
												</div>
											</div>
										</div>
									</td>
								<?php endfor; ?>
							</tr>
						</tbody>

						<tbody>
							<tr class="tr">
								<td rowspan="2" class="align-middle">Breakfast and Stall</td>
								<?php for ($i = 0; $i < 12; $i++) : ?>
									<td class="breakfast" style="vertical-align:top;">
										<?php for ($j=0; $j<3;$j++): ?>
											<!-- Breakfast and Stall -->
											<div class="breakfast-collapse pb-2">
												
												<a style="width: 250px;" class="btn btn-primary" data-toggle="collapse" href="#breakfastMenu<?= $i . '-' . $j ?>" role="button" aria-expanded="false" aria-controls="collapseExample"> 
													Breakfast and Stall Menu <?=$j+1?> 
												</a>

												<!-- Menu Selected -->
												<input type="hidden" id="<?= $j ?>Breakfast_menu_selected[<?= $i ?>]" name="<?= $j ?>BreakfastSelect[<?= $i ?>]" class="form-control">

												<!-- untuk tanggal -->
												<input name="Dates[<?= $i ?>][<?= $i ?>]" type="hidden" id="breakfastDate<?= $i ?>" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">

												<!-- untuk view harga -->
												<input readonly id="priceView<?= $j ?>Breakfast[<?= $i ?>]" name="<?= $j ?>Breakfast_price[<?= $i ?>]" type="number" style="width: 30%; margin-left: 7px; float:right; background-color:white;" placeholder="Price..." class="form-control" onclick="document.getElementById('open-checkbox<?= $i ?>').checked = true;">
												<!-- <input type="number" name="Breakfast_price[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2" style="float:right;"> -->

												<div class="collapse" id="breakfastMenu<?= $i . '-' . $j ?>" style="overflow-y:scroll; max-height:300px;">
													<div class="card card-body">
														<?php $food_index = -1;
														foreach ($menus as $menu) : ?>

															<!-- cari menu anaknya -->
															<?php $food_index+=1; 
															if ($menu['category_id']==4) :?>
																<div class="form-group row align-items-center">
																	<div class="col">
																		<div class="form-check">
																			<input class="form-check-input" type="radio" name="radio<?= $j ?>Breakfast[<?= $i ?>]" id="<?= $food_index+1 ?>_radio<?= $j ?>Breakfast[<?= $i ?>]">
																			<label class="form-check-label" for="flexRadioDefault1">
																				<span class="text-dark"><?= wordwrap($menu['name'], 25, "<br />\n", true) ?></span>
																			</label>
																		</div>
																	</div>
																	<div class="col">
																		<!-- <input type="number" name="Price[<?= $i ?>][<?= $menu['id'] ?>]" placeholder="Enter price.." class="form-control mt-2"> -->
																	</div>
																</div>
															<?php endif;?>
														<?php endforeach; ?>
													</div>
												</div>
											</div>
										<?php endfor; ?>
									</td>
								<?php endfor; ?>
							</tr>
						</tbody>


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

<script>
	// alert($('input[name="Protein_menu[0]"]:checked').val());
	const form = document.forms.menuForm;
	const checked = form.querySelector('input[name="Protein_menu[0]"]:checked');

	// log out the value from the :checked radio
	console.log(checked.value);

	let tes = Array.from(form.elements.characters).find(radio => radio.checked);
	console.log(tes.id); //

</script>


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
	var dailyset = document.querySelectorAll('.dailyset');
	var pasta = document.querySelectorAll('.pasta');
	var breakfast = document.querySelectorAll('.breakfast');

	// biar gaada border
	[dailyset, pasta, breakfast].forEach(function(category) {
		category.forEach(function(td) {
			td.style.display = 'none';
		});
	});

	// cari tanggal
	document.querySelector('.generate-btn button').addEventListener('click', function() {
		var urlParams = new URLSearchParams(window.location.search);
		var datesParam = urlParams.get('dates');
		if (datesParam) {
			document.querySelector('input[name="Dates"]').value = datesParam;
		}

		var title = document.querySelector('input[name="Title"]').value;
		var status = document.querySelector('select[name="Status"]').value;
		var beginDate = document.querySelector('input[name="Begin"]').value;
		var endDate = document.querySelector('input[name="End"]').value;

		var dates = getDates(new Date(beginDate), new Date(endDate));
		var dateStrings = dates.map(date => date.toISOString().split('T')[0]);
		var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?dates=' + dateStrings.join(',') + '&begin=' + beginDate + '&end=' + endDate + '&title=' + title + '&status=' + status;

		window.history.pushState({
			path: newurl
		}, '', newurl);

		location.reload();
	});

	window.onload = function() {
		var urlParams = new URLSearchParams(window.location.search);
		var datesParam = urlParams.get('dates');
		if (datesParam) {
			var dates = datesParam.split(',').map(date => new Date(date));

			dates.forEach(function(date, index) {
				document.querySelector('#date' + (index + 1)).innerText = date.toISOString().split('T')[0];
			});

			[dailyset, pasta, breakfast].forEach(function(category) {
				category.forEach(function(td, index) {
					if (index < dates.length) {
						td.style.display = 'table-cell';
					} else {
						td.style.display = 'none';
					}
				});
			});
		}

		var titleParam = urlParams.get('title');
		var statusParam = urlParams.get('status');
		var beginParam = urlParams.get('begin');
		var endParam = urlParams.get('end');
		
		if (titleParam) {
			document.querySelector('input[name="Title"]').value = titleParam;
		}
		if (statusParam) {
			document.querySelector('select[name="Status"]').value = statusParam;
		}
		if (beginParam) {
			document.querySelector('input[name="Begin"]').value = beginParam;
		}
		if (endParam) {
			document.querySelector('input[name="End"]').value = endParam;
		}
	};

	function getDates(startDate, endDate) {
		var dates = [];
		var currentDate = startDate;
		while (currentDate <= endDate) {
			if (currentDate.getDay() !== 0 && currentDate.getDay() !== 6) {
				dates.push(new Date(currentDate));
			}
			currentDate.setDate(currentDate.getDate() + 1);
		}
		return dates;
	}
</script>

<script>
	function checkCheckbox(i) {
		var select = document.getElementById('dailyset' + i);
		var checkbox = document.getElementById('dailysetParentDate' + i);

		if (select.value != '') {
			checkbox.checked = true;
		} else {
			checkbox.checked = false;
		}
	}
</script>

<script>
	function checkMenuCheckbox(i, j) {
		var checkbox = document.getElementById('checkbox' + i + j);
		var dateCheckbox = document.getElementById('dailysetDate' + i);

		if (checkbox.checked) {
			dateCheckbox.checked = true;
		} else {
			dateCheckbox.checked = false;
		}
	}
</script>

<script>
	document.addEventListener('DOMContentLoaded', (event) => {
		for (let i = 0; i < 12; i++) {
			let priceInput = document.querySelector(`input[name="Dailyset_price[${i}]"]`);
			let openCheckbox = document.getElementById(`open-checkbox${i}`);

			priceInput.addEventListener('click', () => {
				openCheckbox.checked = true;
				toggleCheckboxes(i);
			});
		}
	});
</script>

<script>
	function toggleCheckboxes(i) {
		var openCheckbox = document.getElementById('open-checkbox' + i);
		var checkboxes = document.querySelectorAll('input[id^="checkbox' + i + '"]');
		for (var j = 0; j < checkboxes.length; j++) {
			checkboxes[j].disabled = !openCheckbox.checked;
		}
	}
</script>

<script>
	function validatePrices() { //cek semua harga udh keisi apa blm di form
		var form = document.getElementById('productForm');
		var priceInputs = form.querySelectorAll('input[name^="Dailyset_price"]');
		var isValid = true;

		priceInputs.forEach(function (priceInput) {
			if (priceInput.value == '') {
				isValid = false;
			}
		});

		return isValid;
	}
</script>

<!-- buat masukin web -->
<script>
	var url = window.location.href;

	var value = url.split("/").pop();
	

	// document.getElementById("checkLink").href += "/" + value;
	var checkLink = document.getElementById("checkLink");
	if (checkLink !== null) {
		checkLink.href += "/" + value;
	}
</script>


<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- BUAT POP UP UNTUK SAVE HARGA - FRONT END -->

<!-- script buat radio button -->
<script>
	$(document).ready(function() {
		$('.form-check-input').on('change', function() {
			// Update the idBtnSelected variable
			idMenuSelected = $(this).attr('id');

			// Find the closest parent form-check and search for the radi button inside it
			var radioButton = $(this).closest('.form-check').find('input[type="radio"]');
			idBtnSelected = radioButton.attr('id');

			var parts = idBtnSelected.split('_');
			idBtnSelected = parts[parts.length - 1];
			idBtnSelected = idBtnSelected.replace("radio", "")

			// set ke 0 klo ganti menu
			var target = document.getElementById('priceView'.concat(idBtnSelected));
			target.value = null;

			if (radioButton.is(':checked')) {
				// Show the modal when a radio button is checked
				$('#myModal').appendTo("body").modal('show');
			}

			// buat select menu
			var target2 = document.getElementById((idBtnSelected.substring(0, idBtnSelected.length-3)).concat("_menu_selected" + idBtnSelected.substring(idBtnSelected.length-3, idBtnSelected.length)));
			
			if (radioButton.is(':checked')) {
				// Show the modal when a radio button is checked
				target2.value =idMenuSelected.split('_')[0];
			}

		});
	});
</script>

<!-- buat update harga input ke view -->
<script>	
	document.addEventListener('DOMContentLoaded', function() {

		var myButton = document.getElementById('savePriceBtn');
		var errorMessage = document.getElementById('errorMessage');

		

		myButton.addEventListener('click', function(clickEvent) {
			var tempPrice = document.getElementById('inputPriceField').value;
			var target = document.getElementById('priceView'.concat(idBtnSelected));

			if (target && tempPrice) {
				target.value = tempPrice;
				// Clear the input field
				document.getElementById('inputPriceField').value = "";
				// reset teks warning
				errorMessage.textContent = '';
				// Close the modal
				$('#myModal').modal('hide');
			} else if (tempPrice<=0) {
				errorMessage.textContent = 'Please enter food price...';
			}
		});
	});

	document.addEventListener('DOMContentLoaded', function() {
		var closeButton = document.getElementById('closePriceModal');

		closeButton.addEventListener('click', function() {
			errorMessage.textContent = '';
			
			var idBtnSelected = document.querySelector('input[type="radio"]:checked').id;
			$('input[id="' + idBtnSelected + '"]').prop('checked', false);
			$('#myModal').modal('hide');
		});
	});
</script>


<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">

	<div class="modal-header">
		<h5 class="modal-title" id="myModalLabel">Enter Price</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div class="modal-body">
		<div class="form-group">
		<label for="priceInput">Price:</label>
		<input id="inputPriceField" type="number" class="form-control"placeholder="Enter price">
	</div>
</div>

<!-- Add a new div element for the error message -->
<div id="errorMessage" class="modal-body text-danger">

</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" id="closePriceModal" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" id="savePriceBtn">Save Price</button>
	</div>

	</div>
</div>
</div>