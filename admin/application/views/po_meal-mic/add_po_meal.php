<style>
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
					<?php if ($this->session->flashdata('message')) { ?>
						<div class="alert alert-info" style="background-color: #4bb543; color: #ffff;">
							<?php echo $this->session->flashdata('message'); ?> <br>
							<a id="checkLink" href="/SWA-food-order-form/admin/po_meal/history_po_meal">Check PO</a>
						</div>
					<?php } ?>



					<div class="card">
						<div class="card-header">
							<strong>PO Meal Detail</strong>
						</div>

						<form action="<?php echo site_url('Po_meal/submit'); ?>" method="post" class="form-horizontal" id="productForm">
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

						<?php
						$dates = isset($_GET['dates']) ? explode(',', $_GET['dates']) : array();
						?>

						<!-- Daily Set -->
						<tbody>
							<tr>
								<td rowspan="2" class="align-middle">Daily Set</td>
								<?php for ($i = 0; $i < 12; $i++) : ?>
									<td class="dailyset">
										<div style="display: flex; align-items: center;">
											<select name="Dailyset_parent[<?= $i ?>]" id="dailyset<?= $i ?>" class="form-control" onchange="checkCheckbox(<?= $i ?>)">
												<option disabled selected>Select Menu..</option>
												<?php foreach ($dailyset as $daily) : ?>
													<option value="<?= $daily['id'] ?>"> <?= $daily['name'] ?></option>
												<?php endforeach; ?>
											</select>
											<input name="Dailyset_price[<?= $i ?>]" type="number" style="width: 30%; margin-left: 7px;" placeholder="Price..." class="form-control" onclick="document.getElementById('open-checkbox<?= $i ?>').checked = true;">
											<input name="Dates[<?= $i ?>]" id="dailysetParentDate<?= $i ?>" type="checkbox" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
											<input type="checkbox" id="open-checkbox<?= $i ?>" onchange="toggleCheckboxes(<?= $i ?>)" style="display: none;">
										</div>
										<br>
										<?php foreach ($menus as $j => $menu) : ?>
											<div style="display: flex; align-items: center;" class="pb-2">
												<input name="Id_menu[<?= $i ?>][<?= $j ?>]" id="checkbox<?= $i ?><?= $j ?>" value="<?= $menu['id'] ?>-<?= $menu['category_id'] ?>" type="checkbox" style="margin-right: 7px;" onclick="checkMenuCheckbox(<?= $i ?>, <?= $j ?>)" disabled>
												<span class="text-dark"><?= wordwrap($menu['name'], 36, "<br />\n", true) ?></span>
												<input name="Price[<?= $i ?>][<?= $j ?>]" type="number" style="width: 120px; margin-left: 7px;" placeholder="Price..." class="form-control">
												<input name="Dates[<?= $i ?>][<?= $j ?>]" id="dailysetDate<?= $i ?><?= $j ?>" type="checkbox" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none ;" class="form-control">
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
												<option value="<?= $pasta['id'] ?>"><?= $pasta['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<input type="number" name="Pasta_price[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2">
										<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="pastaDate<?= $i ?>" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
									</td>
								<?php endfor; ?>
							</tr>
						</tbody>

						<!--
										<select name="Pasta_parent2[<?= $i ?>]" id="pasta2<?= $i ?>" class="form-control" onchange="document.getElementById('pastaDate2<?= $i ?>').checked = this.value !== '';">
											<option disabled selected>Select Menu..</option>
											<?php foreach ($pastas as $pasta) : ?>
												<option value="<?= $pasta['id'] ?>"><?= $pasta['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<input type="number" name="Pasta_price2[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2">
										<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="pastaDate<?= $i ?>" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
										<br><br>


										<select name="Pasta_parent3[<?= $i ?>]" id="pasta3<?= $i ?>" class="form-control" onchange="document.getElementById('pastaDate3<?= $i ?>').checked = this.value !== '';">
											<option disabled selected>Select Menu..</option>
											<?php foreach ($pastas as $pasta) : ?>
												<option value="<?= $pasta['id'] ?>"><?= $pasta['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<input type="number" name="Pasta_price3[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2">
										<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="pastaDate<?= $i ?>" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
										<br><br>


										<select name="Pasta_parent4[<?= $i ?>]" id="pasta4<?= $i ?>" class="form-control" onchange="document.getElementById('pastaDate4<?= $i ?>').checked = this.value !== '';">
											<option disabled selected>Select Menu..</option>
											<?php foreach ($pastas as $pasta) : ?>
												<option value="<?= $pasta['id'] ?>"><?= $pasta['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<input type="number" name="Pasta_price4[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2">
										<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="pastaDate<?= $i ?>" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
										<br><br>


										<select name="Pasta_parent5[<?= $i ?>]" id="pasta5<?= $i ?>" class="form-control" onchange="document.getElementById('pastaDate5<?= $i ?>').checked = this.value !== '';">
											<option disabled selected>Select Menu..</option>
											<?php foreach ($pastas as $pasta) : ?>
												<option value="<?= $pasta['id'] ?>"><?= $pasta['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<input type="number" name="Pasta_price5[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2">
										<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="pastaDate<?= $i ?>" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
											-->



						<tbody>
							<tr class="tr">
								<td rowspan="2" class="align-middle">Breakfast and Stall</td>
								<?php for ($i = 0; $i < 12; $i++) : ?>
									<td class="breakfast">
										<select name="Breakfast_parent[<?= $i ?>]" id="breakfast<?= $i ?>" class="form-control" onchange="document.getElementById('breakfastDate<?= $i ?>').checked = this.value !== '';">
											<option disabled selected>Select Menu..</option>
											<?php foreach ($breakfasts as $breakfast) : ?>
												<option value="<?= $breakfast['id'] ?>"><?= $breakfast['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<input type="number" name="Breakfast_price[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2">
										<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="breakfastDate<?= $i ?>" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
										<br><br>

										<select name="Breakfast_parent2[<?= $i ?>]" id="breakfast2<?= $i ?>" class="form-control" onchange="document.getElementById('breakfastDate2<?= $i ?>').checked = this.value !== '';">
											<option disabled selected>Select Menu..</option>
											<?php foreach ($breakfasts as $breakfast) : ?>
												<option value="<?= $breakfast['id'] ?>"><?= $breakfast['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<input type="number" name="Breakfast_price2[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2">
										<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="breakfastDate<?= $i ?>" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
										<br><br>

										<select name="Breakfast_parent3[<?= $i ?>]" id="breakfast3<?= $i ?>" class="form-control" onchange="document.getElementById('breakfastDate3<?= $i ?>').checked = this.value !== '';">
											<option disabled selected>Select Menu..</option>
											<?php foreach ($breakfasts as $breakfast) : ?>
												<option value="<?= $breakfast['id'] ?>"><?= $breakfast['name'] ?></option>
											<?php endforeach; ?>
										</select>
										<input type="number" name="Breakfast_price3[<?= $i ?>]" placeholder="Enter price.." class="form-control mt-2">
										<input name="Dates[<?= $i ?>][<?= $i ?>]" type="checkbox" id="breakfastDate<?= $i ?>" value="<?= isset($dates[$i]) ? $dates[$i] : '' ?>" style="width: 30%; margin-left: 7px; display: none;" class="form-control">
										<br><br>
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
	[dailyset, pasta, breakfast].forEach(function(category) {
		category.forEach(function(td) {
			td.style.display = 'none';
		});
	});

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
		var dateCheckbox = document.getElementById('dailysetDate' + i + j);

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




<!--
<script>
	function checkMenuCheckbox(i, j) {
		let checkbox = document.getElementById('checkbox' + i + j);
		let price = document.getElementsByName('Price[' + i + '][' + j + ']')[0];

		if (checkbox.checked && price.value === '') {
			alert('PLEASE INSERT THE PRICE FIRST BEFORE CLICK THE CHECKBOX');
			checkbox.checked = false;
		}
	}
</script>
-->

<script>
	function checkPriceInput(i, j) {
		var checkbox = document.getElementById('checkbox' + i + j);
		var priceInput = document.getElementsByName('Price[' + i + '][' + j + ']')[0];

		if (checkbox.checked && priceInput.value === '') {
			alert('There is an empty price, please check it!');
			return false;
		}

		return true;
	}
</script>

<script>
	function validatePrices() {
		for (var i = 0; i < 12; i++) {
			for (var j = 0; j < <?= count($menus) ?>; j++) {
				if (!checkPriceInput(i, j)) {
					return false;
				}
			}
		}

		document.getElementById('productForm');
		return true;
	}
</script>


<script>
	var url = window.location.href;

	var value = url.split("/").pop();

	document.getElementById("checkLink").href += "/" + value;
</script>



<!--
<script>
	var dailySetElements = document.getElementsByClassName('dailyset');
	var pastaElements = document.getElementsByClassName('pasta');
	var breakfastElements = document.getElementsByClassName('breakfast');
	for (var i = 0; i < dailySetElements.length; i++) {
		dailySetElements[i].style.display = 'none';
		pastaElements[i].style.display = 'none';
		breakfastElements[i].style.display = 'none';
	}

	function generateDates() {
		var beginDate = new Date(document.getElementsByName('Begin')[0].value);
		var endDate = new Date(document.getElementsByName('End')[0].value);
		var dateArray = [];
		var currentDate = beginDate;
		while (currentDate <= endDate) {
			if (currentDate.getDay() !== 0 && currentDate.getDay() !== 6) {
				dateArray.push(new Date(currentDate));
			}
			currentDate.setDate(currentDate.getDate() + 1);
		}

		var thElements = document.getElementsByTagName('th');
		for (var i = 0; i < dateArray.length; i++) {
			if (i + 1 < thElements.length) {
				var date = dateArray[i];
				var formattedDate = date.toISOString().slice(0, 10);
				thElements[i + 1].innerText = formattedDate;
			} else {
				break;
			}
		}

		for (var i = 0; i < dateArray.length; i++) {
			if (i < dailySetElements.length) {
				dailySetElements[i].style.display = 'table-cell';
				pastaElements[i].style.display = 'table-cell';
				breakfastElements[i].style.display = 'table-cell';
				var inputs = dailySetElements[i].getElementsByTagName('input');
				var pastaInputs = pastaElements[i].getElementsByTagName('input');
				var breakfastInputs = breakfastElements[i].getElementsByTagName('input');

				for (var j = 0; j < inputs.length; j++) {
					if (inputs[j].name == "Date") {
						inputs[j].value = thElements[i + 1].innerText;
					}
				}
				for (var j = 0; j < pastaInputs.length; j++) {
					if (pastaInputs[j].name == "Date") {
						pastaInputs[j].value = thElements[i + 1].innerText;
					}
				}
				for (var j = 0; j < breakfastInputs.length; j++) {
					if (breakfastInputs[j].name == "Date") {
						breakfastInputs[j].value = thElements[i + 1].innerText;
					}
				}
			}
		}

		// Add begin and end dates to the URL
		var newURL = window.location.href + "?begin=" + beginDate.toISOString().slice(0, 10) + "&end=" + endDate.toISOString().slice(0, 10);
		window.history.pushState({}, '', newURL);
	}
	document.getElementsByClassName('btn btn-secondary')[0].addEventListener('click', generateDates);
</script>
-->





<!--
<script>
	document.getElementById('myForm').addEventListener('submit', function(e) {
		e.preventDefault();
		for (let i = 0; i < 5; i++) {
			let selectElement = document.getElementById('pasta' + i);
			let selectedOption = selectElement.options[selectElement.selectedIndex].text;
			console.log('Selected pasta' + i + ': ' + selectedOption);
		}
	});
</script>-->