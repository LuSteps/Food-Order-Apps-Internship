<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food Order</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/css/main.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Viga&display=swap" rel="stylesheet">
	<!-- <title>Welcome to CodeIgniter</title> -->

	<style type="text/css">
		body {
			overflow-x: hidden;
			overflow-y: auto;
		}

		::selection {
			background-color: #E13300;
			color: white;
		}

		textarea {
			word-wrap: break-word;
			overflow-wrap: break-word;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
		}

		a:hover {
			color: #97310e;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
			min-height: 96px;
		}

		p {
			margin: 0 0 10px;
			padding: 0;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}

		form div {
			margin-bottom: 10px;
		}

		form label {
			font-weight: bold;
		}

		form .submit-btn {
			margin-left: auto;
			margin-top: auto;
		}

		p.thanks_label {
			font-size: 34px;
			text-align: center;
		}
	</style>

	<!-- Style for table -->
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
			padding-bottom: 0px;
		}

		table,
		th {
			border: 1px solid black;
			padding: 15px;
			text-align: center;
			width: auto;
		}

		td {
			border: 1px solid black;
			padding: 15px;
			text-align: left;
			width: auto;
		}

		table {
			margin-bottom: 10px;
		}

		.block-display {
			display: block;
		}

		.block-display1 {
			display: block;
			width: 100%;
			height: 100%;
		}

		.center-text {
			text-align: center;
		}

		.modal {
			display: none;
			position: fixed;
			z-index: 1;
			padding-top: 150px;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgb(0, 0, 0);
			background-color: rgba(0, 0, 0, 0.9);
		}

		.modal-container {
			position: relative;
			width: 25%;
			max-width: 25%;
			margin: auto;
		}

		.modal-content {
			margin: auto;
			display: block;
			width: 100%;
			max-width: 100%;
			position: relative;
			/* This makes .close position relative to .modal-content */
		}

		.close {
			position: absolute;
			top: 15px;
			/* Adjust as needed */
			right: 15px;
			/* Adjust as needed */
			color: #f1f1f1;
			font-size: 35px;
			font-weight: bold;
		}


		.close:hover,
		.close:focus {
			color: #bbb;
			text-decoration: none;
			cursor: pointer;
		}

		#noImage {
			font-size: 30px;
			color: white;
			text-align: center;
			margin-top: 5%;
		}

		.container {
			display: contents;
			justify-content: space-between;
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		.left {
			width: 10%;
			text-align: left;
			/* Align text to the left */
		}

		.right {
			width: 95%;
			text-align: right;
		}

		th {
			background-color: lightgray;
		}

		.col-md-3 {
			font-size: 16px;
		}

		Trend Line .center-image {
			display: flex;
			justify-content: center;
		}

		.center-image img {
			width: 125px;
			height: 125px;
		}

		.daily_info {
			padding-top: 0px;
			padding-bottom: 10px;
			font-size: 16px;
		}

		.table-responsive {
			padding-bottom: 0px;
		}

		td {
			vertical-align: top;
			text-align: left;
		}



		.menu-container {
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}

		.block-display1 textarea {
			width: 50%;
		}

		.col-md-15 {
			margin-top: 25px;
		}

		.center-image {
			display: flex;
			justify-content: center;
			align-items: center;
		}


		@media screen and (min-width: 201px) and (max-width: 600px) {
			.block-display1 textarea {
				width: 70%;
			}

			.modal-content {
				margin: auto;
				display: block;
				width: 75%;
				max-width: 75%;
				position: relative;
			}

			.modal-container {
				position: relative;
				width: 75%;
				max-width: 75%;
				margin: auto;
			}

			#noImage {
				font-size: 20px;
				color: white;
				text-align: center;
				margin-top: 10%;
			}
		}
	</style>

</head>

<body>
	<div class="col-md-12 center-image">
		<!-- Display the image -->
		<img src="<?php echo 'https://bedrockasia.files.wordpress.com/2010/10/sws-identity1.png'; ?>" class="img-fluid">
	</div>

	<!-- <div id="container"> -->
	<!-- <h1>Bamboo Kitchen</h1> -->

	<!-- <div id="body">
			<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

			<p>If you would like to edit this page you'll find it located at:</p>
			<code>application/views/welcome_message.php</code>

			<p>The corresponding controller for this page is found at:</p>
			<code>application/controllers/Welcome.php</code>

			<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="userguide3/">User Guide</a>.</p> -->


	<!-- <?php foreach ($product_item as $item) : ?>
				<li><?php echo $item['name']; ?></li>
			<?php endforeach; ?> -->
	<!-- </div> -->


	<h1>Pre Order Purchase Meals From
		<?php foreach ($dates as $item) : ?>
			<?php echo $item['begin_date']; ?>
		<?php endforeach; ?>
		to
		<?php foreach ($dates as $item) : ?>
			<?php echo $item['end_date']; ?>
		<?php endforeach; ?>
	</h1>

	<!-- <h3><?php foreach ($dates as $item) : ?>
			<?php echo $item['remark']; ?>
		<?php endforeach; ?>
	</h3> -->

	<form method="post" action="<?php echo site_url('order/submit_order'); ?>" onsubmit="return confirm('Are you sure you want to submit?')">
		<div>
			<label for="Email">Email: <span style="color: red;">*</span></label>
			<div class="block-display"><input type="email" name="Email" required></div>
		</div>
		<div>
			<label for="Name">Student's Complete Name: <span style="color: red;">*</span></label>
			<div class="block-display"><input type="text" maxlength=100 name="Name" required></div>
		</div>
		<div>
			<label for="Grade">Grade Level: <span style="color: red;">*</span></label>
			<div class="block-display"><input type="text" maxlength=50 name="Grade" required></div>
		</div>
		<div>
			<label for="Phone_Number">Parent's Phone Number: <span style="color: red;">*</span></label>
			<div class="block-display"><input type="text" maxlength=50 name="Phone_Number" required></div>
		</div>
		<!-- <?php if ($this->session->flashdata('thank_you_note')) : ?>
			<p class="thanks_label alert alert-danger"><?php echo $this->session->flashdata('thank_you_note'); ?></p>
		<?php endif; ?> -->

		<?php if ($this->session->flashdata('error_message')) : ?>
			<p class="thanks_label alert alert-danger"><?php echo $this->session->flashdata('error_message'); ?></p>
		<?php endif; ?>

		<div class="total-container">
			<h3 style="color: white !important;">Total: <span style="display:inline-block; width: 10px;"></span></h3>
			<h3 id="totalPrice" style="color: white !important;">Rp. 0</h3>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-15">
					<h1>Daily Set<span id="dailySetHeading"><span id="arrow" style="float: right; cursor: pointer;">▼</span></span></h1>
				</div>
			</div>
		</div>
		<div id="dailySetTable" style="display: none;">
			<div class="col-md-3">Click on the menu name to display image</div>
			<div class="table-responsive">
				<table>
					<tr>
						<th style="width: 5%;">All <br><input type="checkbox" id="checkboxall1"></th>
						<th style="width: 19%;">Monday<br>
						<th style="width: 19%;">Tuesday<br>
						<th style="width: 19%;">Wednesday<br>
						<th style="width: 19%;">Thursday<br>
						<th style="width: 19%;">Friday<br>
					</tr>
					<tr>
						<td rowspan="2">Week 1<br><input type="checkbox" id="checkboxweek1daily"></td>
						<?php foreach ($dates as $item) : ?>
						<?php
							$previous_date = null;
							$date = new DateTime($item['begin_date']);
							$days_added = 0;

							for ($i = 0; $days_added < 5; $i++) : // Add a day
								// Print the date and increment the counter
								echo '<td>' . $date->format('j M Y') . '</td>';
								$date->modify('+1 day');
								$days_added++;
							endfor;
						endforeach; ?>
					</tr>
					<tr>
						<?php
						$counter = 1;
						$previous_date = null; // Add this line
						foreach ($dates as $item) :
							$begin_date = new DateTime($item['begin_date']);
							$end_date = clone $begin_date;
							$end_date->modify('+5 day');

							for ($i = 0; $i < 5; $i++) :
								$date_to_check = clone $begin_date;
								$date_to_check->modify("+$i day");
								if ($date_to_check == $previous_date) continue;
								$previous_date = clone $date_to_check;
								$is_holiday = false;
								$holiday_description = '';

								foreach ($holidays as $holiday) {
									$holiday_date = new DateTime($holiday['date']);

									if ($holiday_date == $date_to_check) {
										$is_holiday = true;
										$holiday_description = $holiday['description'];
										break;
									}
								}

								if ($is_holiday) {
									echo '<td class="center-text">' . $holiday_description . '</td>';
								} else {
									$menu_found = false;
									$max_length = 0;
									foreach ($menu_daily_set as $menu) {
										$menu_date = new DateTime($menu['date']);

										if ($menu_date == $date_to_check) {
											$max_length = 0;
											foreach ($child_menus as $child_menu_array) {
												foreach ($child_menu_array as $child_menu) {
													$length = strlen($child_menu['name']);
													if ($length > $max_length) {
														$max_length = $length;
													}
												}
											}
											echo '<td>';
											$link = isset($menu['link']) ? $menu['link'] : '';
											echo "<a href=\"#\" onclick=\"showPopup(event, '" . $link . "')\">" . $menu['name'] . "</a> - " . $menu['price'] . " ";
											echo '<input type="checkbox" class="week1-checkbox" id="checkboxdaily_week1_day' . ($i + 1) . '_1" name="checkboxes[]" value="' . $menu['id'] . '|' . $menu_date->format('Y-m-d') . '"  data-price="' . $menu['price'] . '" data-date="' . $menu_date->format('Y-m-d') . '" data-holiday="' . ($is_holiday ? 'true' : 'false') . '"   onclick="addValue(this)">';
											echo '<div class="menu-container">';
											echo '<hr>';
											echo '</div>'; // Add this line

											if (isset($child_menus[$menu['id']])) {
												$checkboxId = 2;
												foreach ($child_menus[$menu['id']] as $child_menu) {
													$child_menu_date = new DateTime($child_menu['date']);
													$link = isset($child_menu['link']) ? $child_menu['link'] : '';
													if ($child_menu_date == $date_to_check) {
														echo "<a href=\"#\" onclick=\"showPopup(event, '" . $link . "')\">" . $child_menu['name'] . "</a> - " . $child_menu['price'] . " ";
														echo '<span style="display:inline-block; width: 7px;"></span><input type="checkbox" class="week1-checkbox" id="checkboxdaily_week1_day' . ($i + 1) . '_' . $checkboxId . '" name="checkboxes[]"  value="' . $child_menu['id'] . '|' . $menu_date->format('Y-m-d') . '" data-price="' . $child_menu['price'] . '" data-date="' . $menu_date->format('Y-m-d') . '" data-holiday="' . ($is_holiday ? 'true' : 'false') . '"    onclick="addValue(this)"><br> ';
														$checkboxId++;
														$length = strlen($child_menu['name']);
													}
												}
											}
											$menu_found = true;
											break;
										}
									}

									if (!$menu_found) {
										echo '<td></td>';  // Display a blank cell if no menu found
									}
									echo '<input type="hidden" id="hiddenInput" name="date">';
								}
							endfor;
						endforeach;

						?>
						<div id="myModal" class="modal">
							<div class="modal-container">
								<img class="modal-content" id="img01">
								<span class="close">×</span>
							</div>
							<div id="noImage" style="display: none;">Image is not available</div>
						</div>


					</tr>





					<tr>
						<td rowspan="2">Week 2<br><input type="checkbox" id="checkboxweek2daily"></td>
						<?php foreach ($dates as $item) : ?>
						<?php
							$date = new DateTime($item['begin_date']);
							$date->modify('+7 day'); // Add 7 days to the start date
							$days_added = 0;

							for ($i = 0; $days_added < 5; $i++) : // Add a day
								// Print the date and increment the counter
								echo '<td>' . $date->format('j M Y') . '</td>';
								$date->modify('+1 day');
								$days_added++;
							endfor;
						endforeach; ?>
					</tr>

					<tr>
						<?php
						foreach ($dates as $item) :
							$begin_date = new DateTime($item['begin_date']);
							$end_date = clone $begin_date;
							$end_date->modify('+5 day');

							for ($i = 7; $i < 12; $i++) :
								$date_to_check = clone $begin_date;
								$date_to_check->modify("+$i day");
								$menu_name = '';
								$menu_price = '';
								$menu1_name = '';
								$menu1_price = '';
								$is_holiday = false;
								$holiday_description = '';

								foreach ($holidays as $holiday) {
									$holiday_date = new DateTime($holiday['date']);

									if ($holiday_date == $date_to_check) {
										$is_holiday = true;
										$holiday_description = $holiday['description'];
										break;
									}
								}

								if ($is_holiday) {
									echo '<td class="center-text">' . $holiday_description . '</td>';
								} else {
									$menu_found = false;
									foreach ($menu_daily_set as $menu) {
										$menu_date = new DateTime($menu['date']);

										if ($menu_date == $date_to_check) {
											$max_length = 0;
											foreach ($child_menus as $child_menu_array) {
												foreach ($child_menu_array as $child_menu) {
													$length = strlen($child_menu['name']);
													if ($length > $max_length) {
														$max_length = $length;
													}
												}
											}
											echo '<td>';
											$link = isset($menu['link']) ? $menu['link'] : '';
											echo "<a href=\"#\" onclick=\"showPopup(event, '" . $link . "')\">" . $menu['name'] . "</a> - " . $menu['price'] . " ";
											echo '<span style="display:inline-block; width: 7px;"></span><input id="checkboxdaily_week2_day' . ($i + 1) . '_1" name="checkboxes[]" value="' . $menu['id'] . '|' . $menu_date->format('Y-m-d') . '" data-price="' . $menu['price'] . '" type="checkbox" data-date="' . $menu_date->format('Y-m-d') . '" data-holiday="' . ($is_holiday ? 'true' : 'false') . '"   onclick="addValue(this)"><br>';
											echo '<div class="menu-container">';
											echo '<hr>';
											echo '</div>'; // Add this line

											if (isset($child_menus[$menu['id']])) {
												$checkboxId = 2;
												foreach ($child_menus[$menu['id']] as $child_menu) {
													$link = isset($child_menu['link']) ? $child_menu['link'] : '';
													echo "<a href=\"#\" onclick=\"showPopup(event, '" . $link . "')\">" . $child_menu['name'] . "</a> - " . $child_menu['price'] . " ";
													echo '<span style="display:inline-block; width: 7px;"></span><input id="checkboxdaily_week2_day' . ($i + 1) . '_' . $checkboxId . '" name="checkboxes[]" value="' . $child_menu['id'] . '|' . $menu_date->format('Y-m-d') . '"  data-price="' . $child_menu['price'] . '" type="checkbox" data-date="' . $menu_date->format('Y-m-d') . '" data-holiday="' . ($is_holiday ? 'true' : 'false') . '"    onclick="addValue(this)"><br>';
													$checkboxId++;
													$length = strlen($child_menu['name']);
												}
											}
											$menu_found = true;
											break;
										}
									}
									if (!$menu_found) {
										echo '<td></td>';  // Display a blank cell if no menu found
									}
								}
						?>
						<?php
							endfor;
						endforeach;
						?>

						<!-- Add more rows as needed -->
				</table>
				<p class="daily_info">Two dishes with vegetables served alongside steamed rice, soup, and dessert provided during lunchtime.</p>

			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-15">
					<h1>Pasta<span id="pastaHeading"><span id="pastaArrow" style="float: right; cursor: pointer;">▼</span></span>
					</h1>
				</div>
			</div>
		</div>
		<div id="pastaTable" style="display: none;">
			<div class="col-md-3">Click on the menu name to display image</div>
			<table>
				<tr>
					<th style="width: 5%;">All <br><input type="checkbox" id="checkboxall2"></th>
					<th style="width: 19%;">Monday<br>
					<th style="width: 19%;">Tuesday<br>
					<th style="width: 19%;">Wednesday<br>
					<th style="width: 19%;">Thursday<br>
					<th style="width: 19%;">Friday<br>
				</tr>
				<tr>
					<td rowspan="2">Week 1<br><input type="checkbox" id="checkboxweek1pasta"></td>
					<?php foreach ($dates as $item) : ?>
					<?php
						$date = new DateTime($item['begin_date']);
						$days_added = 0;

						for ($i = 0; $days_added < 5; $i++) : // Add a day
							// Print the date and increment the counter
							echo '<td>' . $date->format('j M Y') . '</td>';
							$date->modify('+1 day');
							$days_added++;
						endfor;
					endforeach; ?>
				</tr>

				<tr>
					<?php
					foreach ($dates as $item) :
						$begin_date = new DateTime($item['begin_date']);
						$end_date = clone $begin_date;
						$end_date->modify('+5 day');

						for ($i = 0; $i < 5; $i++) :
							$date_to_check = clone $begin_date;
							$date_to_check->modify("+$i day");
							$menu_name = '';
							$menu_price = '';
							$is_holiday = false;
							$holiday_description = '';

							foreach ($holidays as $holiday) {
								$holiday_date = new DateTime($holiday['date']);

								if ($holiday_date == $date_to_check) {
									$is_holiday = true;
									$holiday_description = $holiday['description'];
									break;
								}
							}

							if ($is_holiday) {
								echo '<td class="center-text">' . $holiday_description . '</td>';
							} else {
								$checkboxIdPasta = 1;
								$menu_found = false;
								echo '<td>';  // Open the cell here
								foreach ($menu_pasta as $menu) {
									$menu_date = new DateTime($menu['date']);

									if ($menu_date == $date_to_check) {
										$menu_name = $menu['name'];
										$menu_price = $menu['price'];
										$menu_id = $menu['id'];

										// Don't open a new cell here, just add the menu
										$link = isset($menu['link']) ? $menu['link'] : '';
										echo "<a href=\"#\" onclick=\"showPopup(event, '" . $link . "')\">" . $menu['name'] . "</a> - " . $menu['price'] . " ";
										echo '<span style="display:inline-block; width: 7px;"></span><input id="checkboxpasta_week1_day' . ($i + 1) . '_' . $checkboxIdPasta . '" name="checkboxes[]" value="' . $menu_id . '|' . $menu_date->format('Y-m-d') . '"  data-price="' . $menu['price'] . '" type="checkbox" data-date="' . $menu_date->format('Y-m-d') . '" data-holiday="' . ($is_holiday ? 'true' : 'false') . '"    onclick="addValue(this)"><br>';
										$checkboxIdPasta++;
										$menu_found = true;
									}
								}
								if (!$menu_found) {
									// echo 'No menu found';  // Display a message if no menu found
								}
								echo '</td>';  // Close the cell here
							}
						endfor;
					endforeach;
					?>
				</tr>





				<tr>
					<td rowspan="2">Week 2<br><input type="checkbox" id="checkboxweek2pasta"></td>
					<?php foreach ($dates as $item) : ?>
					<?php
						$date = new DateTime($item['begin_date']);
						$date->modify('+7 day'); // Add 7 days to the start date
						$days_added = 0;

						for ($i = 0; $days_added < 5; $i++) : // Add a day
							// Print the date and increment the counter
							echo '<td>' . $date->format('j M Y') . '</td>';
							$date->modify('+1 day');
							$days_added++;
						endfor;
					endforeach; ?>
				</tr>

				<tr>
					<?php
					foreach ($dates as $item) :
						$begin_date = new DateTime($item['begin_date']);
						$end_date = clone $begin_date;
						$end_date->modify('+5 day');

						for ($i = 7; $i < 12; $i++) :
							$date_to_check = clone $begin_date;
							$date_to_check->modify("+$i day");
							$menu_name = '';
							$menu_price = '';
							$is_holiday = false;
							$holiday_description = '';

							foreach ($holidays as $holiday) {
								$holiday_date = new DateTime($holiday['date']);

								if ($holiday_date == $date_to_check) {
									$is_holiday = true;
									$holiday_description = $holiday['description'];
									break;
								}
							}

							if ($is_holiday) {
								echo '<td class="center-text">' . $holiday_description . '</td>';
							} else {
								$checkboxIdPasta = 1;
								$menu_found = false;
								echo '<td>';  // Open the cell here
								foreach ($menu_pasta as $menu) {
									$menu_date = new DateTime($menu['date']);

									if ($menu_date == $date_to_check) {
										$menu_name = $menu['name'];
										$menu_price = $menu['price'];
										$menu_id = $menu['id'];

										// Don't open a new cell here, just add the menu
										$link = isset($menu['link']) ? $menu['link'] : '';
										echo "<a href=\"#\" onclick=\"showPopup(event, '" . $link . "')\">" . $menu['name'] . "</a> - " . $menu['price'] . " ";

										echo '<span style="display:inline-block; width: 7px;"></span><input id="checkboxpasta_week2_day' . ($i + 1) . '_' . $checkboxIdPasta . '" name="checkboxes[]" value="' . $menu_id . '|' . $menu_date->format('Y-m-d') . '"  data-price="' . $menu['price'] . '" type="checkbox" data-date="' . $menu_date->format('Y-m-d') . '" data-holiday="' . ($is_holiday ? 'true' : 'false') . '"    onclick="addValue(this)"><br>';
										$checkboxIdPasta++;
										$menu_found = true;
									}
								}
								if (!$menu_found) {
									// Display a message if no menu found
								}
								echo '</td>';  // Close the cell here
							}
					?>
					<?php
						endfor;
					endforeach;
					?>

					<!-- Add more rows as needed -->
			</table>
			<p class="daily_info">A variety of pasta provided during snack time & lunch time</p>

		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-15">
					<h1>Breakfast and Stall<span id="breakfastHeading"><span id="breakfastArrow" style="float: right; cursor: pointer; ">▼</span></span></h1>
				</div>
			</div>
		</div>
		<div id="breakfastTable" style="display: none;">
			<div class="col-md-3">Click on the menu name to display image</div>
			<table>
				<tr>
					<th style="width: 5%;">All <br><input type="checkbox" id="checkboxall3"></th>
					<th style="width: 19%;">Monday<br>
					<th style="width: 19%;">Tuesday<br>
					<th style="width: 19%;">Wednesday<br>
					<th style="width: 19%;">Thursday<br>
					<th style="width: 19%;">Friday<br>
				<tr>
					<td rowspan="2">Week 1<br><input type="checkbox" id="checkboxweek1breakfast"></td>
					<?php foreach ($dates as $item) : ?>
					<?php
						$date = new DateTime($item['begin_date']);
						$days_added = 0;

						for ($i = 0; $days_added < 5; $i++) : // Add a day
							// Print the date and increment the counter
							echo '<td>' . $date->format('j M Y') . '</td>';
							$date->modify('+1 day');
							$days_added++;
						endfor;
					endforeach; ?>
				</tr>

				<tr>
					<?php
					foreach ($dates as $item) :
						$begin_date = new DateTime($item['begin_date']);
						$end_date = clone $begin_date;
						$end_date->modify('+5 day');

						for ($i = 0; $i < 5; $i++) :
							$date_to_check = clone $begin_date;
							$date_to_check->modify("+$i day");
							$menu_name = '';
							$menu_price = '';
							$is_holiday = false;
							$holiday_description = '';

							foreach ($holidays as $holiday) {
								$holiday_date = new DateTime($holiday['date']);

								if ($holiday_date == $date_to_check) {
									$is_holiday = true;
									$holiday_description = $holiday['description'];
									break;
								}
							}

							if ($is_holiday) {
								echo '<td class="center-text">' . $holiday_description . '</td>';
							} else {
								$max_length = 0;
								$checkboxIdBreakfast = 1;
								echo '<td>';  // Open the cell here
								foreach ($menu_breakfast as $menu) {
									$menu_date = new DateTime($menu['date']);

									if ($menu_date == $date_to_check) {
										$menu_name = $menu['name'];
										$menu_price = $menu['price'];
										$menu_id = $menu['id'];
										// Don't open a new cell here, just add the menu
										$link = isset($menu['link']) ? $menu['link'] : '';
										echo "<a href=\"#\" onclick=\"showPopup(event, '" . $link . "')\">" . $menu['name'] . "</a> - " . $menu['price'] . " ";
										echo '<span style="display:inline-block; width: 7px;"></span><input id="checkboxbreakfast_week1_day' . ($i + 1) . '_' . $checkboxIdBreakfast . '" name="checkboxes[]" value="' . $menu_id . '|' . $menu_date->format('Y-m-d') . '"  data-price="' . $menu['price'] . '" type="checkbox" data-date="' . $menu_date->format('Y-m-d') . '" data-holiday="' . ($is_holiday ? 'true' : 'false') . '"    onclick="addValue(this)"><br>';
										// echo '<div class="menu-container">';
										// echo '</div>'; // Add this line
										$checkboxIdBreakfast++;
									}
								}
								echo '</td>';  // Close the cell here
							}
						endfor;
					endforeach;
					?>
				</tr>





				<tr>
					<td rowspan="2">Week 2<br><input type="checkbox" id="checkboxweek2breakfast"></td>
					<?php foreach ($dates as $item) : ?>
					<?php
						$date = new DateTime($item['begin_date']);
						$date->modify('+7 day'); // Add 7 days to the start date
						$days_added = 0;

						for ($i = 0; $days_added < 5; $i++) : // Add a day
							// Print the date and increment the counter
							echo '<td>' . $date->format('j M Y') . '</td>';
							$date->modify('+1 day');
							$days_added++;
						endfor;
					endforeach; ?>
				</tr>

				<tr>
					<?php
					foreach ($dates as $item) :
						$begin_date = new DateTime($item['begin_date']);
						$end_date = clone $begin_date;
						$end_date->modify('+5 day');

						for ($i = 7; $i < 12; $i++) :
							$date_to_check = clone $begin_date;
							$date_to_check->modify("+$i day");
							$menu_name = '';
							$menu_price = '';
							$is_holiday = false;
							$holiday_description = '';

							foreach ($holidays as $holiday) {
								$holiday_date = new DateTime($holiday['date']);

								if ($holiday_date == $date_to_check) {
									$is_holiday = true;
									$holiday_description = $holiday['description'];
									break;
								}
							}

							if ($is_holiday) {
								echo '<td class="center-text">' . $holiday_description . '</td>';
							} else {
								$max_length = 0;
								$checkboxIdBreakfast = 1;
								echo '<td>';  // Open the cell here
								foreach ($menu_breakfast as $menu) {
									$menu_date = new DateTime($menu['date']);

									if ($menu_date == $date_to_check) {
										$menu_name = $menu['name'];
										$menu_price = $menu['price'];
										$menu_id = $menu['id'];

										// Don't open a new cell here, just add the menu
										$link = isset($menu['link']) ? $menu['link'] : '';
										echo "<a href=\"#\" onclick=\"showPopup(event, '" . $link . "')\">" . $menu['name'] . "</a> - " . $menu['price'] . " ";
										echo '<span style="display:inline-block; width: 7px;"></span><input id="checkboxbreakfast_week2_day' . ($i + 1) . '_' . $checkboxIdBreakfast . '" name="checkboxes[]" value="' . $menu_id . '|' . $menu_date->format('Y-m-d') . '"  data-price="' . $menu['price'] . '" type="checkbox" data-date="' . $menu_date->format('Y-m-d') . '" data-holiday="' . ($is_holiday ? 'true' : 'false') . '"    onclick="addValue(this)"><br>';
										// echo '<div class="menu-container">';
										// echo '</div>'; // Add this line
										$checkboxIdBreakfast++;
									}
								}
								echo '</td>';  // Close the cell here
							}
					?>
					<?php
						endfor;
					endforeach;
					?>

					<!-- Add more rows as needed -->
			</table>
			<p class="daily_info">A variety of breakfast items served in the morning and a selection of snacks provided during snack time.</p>

		</div>
		<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

		<label for="Name">Notes: </label>
		<div class="block-display1">
			<textarea style="height: 70px;" type="text" maxlength=100 name="Notes"></textarea>
		</div>

		<div style="display: flex; justify-content: center;">
			<button class="btn btn-danger btn-lg" style="background-color:#b21628; font-size: 20px; padding: 10px 20px; width : auto;">Submit</button>
		</div>
		<br>




	</form>


	<!-- <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p> -->
	<!-- </div> -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	<script>
		// Daily Set
		document.getElementById('checkboxall1').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxdaily"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);

			// Check or uncheck 'week1daily' and 'week2daily' checkboxes based on 'checkboxall1'
			document.getElementById('checkboxweek1daily').checked = this.checked;
			document.getElementById('checkboxweek2daily').checked = this.checked;
		});


		document.getElementById('checkboxweek1daily').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxdaily_week1_"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);

			if (!this.checked) {
				document.getElementById('checkboxall1').checked = false;
			}
		});

		document.getElementById('checkboxweek2daily').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxdaily_week2_"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);

			if (!this.checked) {
				document.getElementById('checkboxall1').checked = false;
			}
		});

		for (let i = 1; i <= 5; i++) {
			let parentCheckbox = document.getElementById('checkboxdaily_week1_day' + i + '_1');
			if (parentCheckbox) {
				parentCheckbox.addEventListener('change', function() {
					let checkboxes = document.querySelectorAll('input[id^="checkboxdaily_week1_day' + i + '_"]');
					checkboxes.forEach(function(checkbox) {
						checkbox.checked = this.checked;
					}, this);
				});

				// Add event listener to child checkboxes
				let childCheckboxes = document.querySelectorAll('input[id^="checkboxdaily_week1_day' + i + '_"]:not([id$="_1"])');
				childCheckboxes.forEach(function(childCheckbox) {
					childCheckbox.addEventListener('change', function() {
						let allChecked = Array.from(childCheckboxes).every(cb => cb.checked);
						parentCheckbox.checked = allChecked;
					});
				});
			}
		}



		for (let i = 7; i <= 12; i++) {
			let parentCheckbox = document.getElementById('checkboxdaily_week2_day' + i + '_1');
			if (parentCheckbox) {
				parentCheckbox.addEventListener('change', function() {
					let checkboxes = document.querySelectorAll('input[id^="checkboxdaily_week2_day' + i + '_"]');
					checkboxes.forEach(function(checkbox) {
						checkbox.checked = this.checked;
					}, this);
				});

				// Add event listener to child checkboxes
				let childCheckboxes = document.querySelectorAll('input[id^="checkboxdaily_week2_day' + i + '_"]:not([id$="_1"])');
				childCheckboxes.forEach(function(childCheckbox) {
					childCheckbox.addEventListener('change', function() {
						// Check if all child checkboxes are checked
						let allChecked = Array.from(childCheckboxes).every(cb => cb.checked);
						// If all child checkboxes are checked, check the parent checkbox
						if (allChecked) {
							parentCheckbox.checked = true;
						} else {
							parentCheckbox.checked = false;
						}
					});
				});
			}
		}


		//Pasta
		document.getElementById('checkboxall2').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxpasta"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);

			// Check or uncheck 'week1pasta' and 'week2pasta' checkboxes based on 'checkboxall2'
			document.getElementById('checkboxweek1pasta').checked = this.checked;
			document.getElementById('checkboxweek2pasta').checked = this.checked;
		});



		document.getElementById('checkboxweek1pasta').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxpasta_week1_"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);

			if (!this.checked) {
				document.getElementById('checkboxall2').checked = false;
			}
		});

		document.getElementById('checkboxweek2pasta').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxpasta_week2_"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);

			if (!this.checked) {
				document.getElementById('checkboxall2').checked = false;
			}
		});

		//Breakfast
		document.getElementById('checkboxall3').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxbreakfast"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);

			// Check or uncheck 'week1breakfast' and 'week2breakfast' checkboxes based on 'checkboxall3'
			document.getElementById('checkboxweek1breakfast').checked = this.checked;
			document.getElementById('checkboxweek2breakfast').checked = this.checked;
		});

		document.getElementById('checkboxweek1breakfast').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxbreakfast_week1_"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);

			// If 'week1breakfast' is unchecked, also uncheck 'checkboxall3'
			if (!this.checked) {
				document.getElementById('checkboxall3').checked = false;
			}
		});

		document.getElementById('checkboxweek2breakfast').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('input[id^="checkboxbreakfast_week2_"]');
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = this.checked;
			}, this);

			// If 'week2breakfast' is unchecked, also uncheck 'checkboxall3'
			if (!this.checked) {
				document.getElementById('checkboxall3').checked = false;
			}
		});


		// Get all checkboxes
		let checkboxes = document.querySelectorAll('input[type="checkbox"]');

		// Listen for changes on each checkbox
		checkboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				calculateTotal();
			});
		});



		//For Daily Set
		let week1Checkboxes = document.querySelectorAll('input[id^="checkboxdaily_week1_"]');
		let week2Checkboxes = document.querySelectorAll('input[id^="checkboxdaily_week2_"]');


		// Listen for changes on each checkbox
		week1Checkboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				// If any checkbox is unchecked, uncheck 'week 1' and 'ALL'
				if (!this.checked) {
					document.getElementById('checkboxweek1daily').checked = false;
					document.getElementById('checkboxall1').checked = false;
				} else {
					// If all checkboxes are checked, check 'week 1'
					let allChecked = Array.from(week1Checkboxes).every(c => c.checked);
					if (allChecked) {
						document.getElementById('checkboxweek1daily').checked = true;
					}
				}
			});
		});



		// week1Checkboxes.forEach(function(checkbox) {
		// 	checkbox.addEventListener('change', function() {
		// 		// If all checkboxes are unchecked, uncheck 'week 1'
		// 		let allUnchecked = Array.from(week1Checkboxes).every(c => !c.checked);
		// 		if (allUnchecked) {
		// 			document.getElementById('checkboxweek1daily').checked = false;
		// 		} else {
		// 			// If any checkbox is checked, check 'week 1'
		// 			document.getElementById('checkboxweek1daily').checked = true;
		// 		}
		// 	});
		// });

		week2Checkboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				// If any checkbox is unchecked, uncheck 'week 1' and 'ALL'
				if (!this.checked) {
					document.getElementById('checkboxweek2daily').checked = false;
					document.getElementById('checkboxall1').checked = false;
				} else {
					// If all checkboxes are checked, check 'week 1'
					let allChecked = Array.from(week2Checkboxes).every(c => c.checked);
					if (allChecked) {
						document.getElementById('checkboxweek2daily').checked = true;
					}
				}
			});
		});

		// week2Checkboxes.forEach(function(checkbox) {
		// 	checkbox.addEventListener('change', function() {
		// 		// If all checkboxes are unchecked, uncheck 'week 1'
		// 		let allUnchecked = Array.from(week2Checkboxes).every(c => !c.checked);
		// 		if (allUnchecked) {
		// 			document.getElementById('checkboxweek2daily').checked = false;
		// 		} else {
		// 			// If any checkbox is checked, check 'week 1'
		// 			document.getElementById('checkboxweek2daily').checked = true;
		// 		}
		// 	});
		// });

		let dailyCheckboxes = document.querySelectorAll('input[id^="checkboxdaily"]');

		dailyCheckboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				// If any checkbox is unchecked, uncheck 'ALL'
				if (!this.checked) {
					document.getElementById('checkboxall1').checked = false;
				} else {
					// If all checkboxes are checked, check 'ALL'
					let allChecked = Array.from(dailyCheckboxes).every(c => c.checked);
					if (allChecked) {
						document.getElementById('checkboxall1').checked = true;
					}
				}
			});
		});

		// For breakfast
		let week1BreakfastCheckboxes = document.querySelectorAll('input[id^="checkboxbreakfast_week1_"]');
		let week2BreakfastCheckboxes = document.querySelectorAll('input[id^="checkboxbreakfast_week2_"]');

		// Listen for changes on each checkbox
		week1BreakfastCheckboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				// If any checkbox is unchecked, uncheck 'week 1' and 'ALL'
				if (!this.checked) {
					document.getElementById('checkboxweek1breakfast').checked = false;
					document.getElementById('checkboxall2').checked = false;
				} else {
					// If all checkboxes are checked, check 'week 1'
					let allChecked = Array.from(week1BreakfastCheckboxes).every(c => c.checked);
					if (allChecked) {
						document.getElementById('checkboxweek1breakfast').checked = true;
					}
				}
			});
		});

		week2BreakfastCheckboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				// If any checkbox is unchecked, uncheck 'week 1' and 'ALL'
				if (!this.checked) {
					document.getElementById('checkboxweek2breakfast').checked = false;
					document.getElementById('checkboxall2').checked = false;
				} else {
					// If all checkboxes are checked, check 'week 1'
					let allChecked = Array.from(week2BreakfastCheckboxes).every(c => c.checked);
					if (allChecked) {
						document.getElementById('checkboxweek2breakfast').checked = true;
					}
				}
			});
		});

		// week1BreakfastCheckboxes.forEach(function(checkbox) {
		// 	checkbox.addEventListener('change', function() {
		// 		let allUnchecked = Array.from(week1BreakfastCheckboxes).every(c => !c.checked);
		// 		if (allUnchecked) {
		// 			document.getElementById('checkboxweek1breakfast').checked = false;
		// 		} else {
		// 			document.getElementById('checkboxweek1breakfast').checked = true;
		// 		}
		// 	});
		// });

		// week2BreakfastCheckboxes.forEach(function(checkbox) {
		// 	checkbox.addEventListener('change', function() {
		// 		let allUnchecked = Array.from(week2BreakfastCheckboxes).every(c => !c.checked);
		// 		if (allUnchecked) {
		// 			document.getElementById('checkboxweek2breakfast').checked = false;

		// 		} else {
		// 			document.getElementById('checkboxweek2breakfast').checked = true;
		// 		}
		// 	});
		// });



		let breakfastCheckboxes = document.querySelectorAll('input[id^="checkboxbreakfast"]');

		breakfastCheckboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				// If any checkbox is unchecked, uncheck 'ALL'
				if (!this.checked) {
					document.getElementById('checkboxall3').checked = false;
				} else {
					// If all checkboxes are checked, check 'ALL'
					let allChecked = Array.from(breakfastCheckboxes).every(c => c.checked);
					if (allChecked) {
						document.getElementById('checkboxall3').checked = true;
					}
				}
			});
		});



		// For pasta
		let week1PastaCheckboxes = document.querySelectorAll('input[id^="checkboxpasta_week1_"]');
		let week2PastaCheckboxes = document.querySelectorAll('input[id^="checkboxpasta_week2_"]');

		// Listen for changes on each checkbox
		week1PastaCheckboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				// If any checkbox is unchecked, uncheck 'week 1' and 'ALL'
				if (!this.checked) {
					document.getElementById('checkboxweek1pasta').checked = false;
					document.getElementById('checkboxall3').checked = false;
				} else {
					// If all checkboxes are checked, check 'week 1'
					let allChecked = Array.from(week1PastaCheckboxes).every(c => c.checked);
					if (allChecked) {
						document.getElementById('checkboxweek1pasta').checked = true;
					}
				}
			});
		});

		week2PastaCheckboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				// If any checkbox is unchecked, uncheck 'week 1' and 'ALL'
				if (!this.checked) {
					document.getElementById('checkboxweek2pasta').checked = false;
					document.getElementById('checkboxall3').checked = false;
				} else {
					// If all checkboxes are checked, check 'week 1'
					let allChecked = Array.from(week2PastaCheckboxes).every(c => c.checked);
					if (allChecked) {
						document.getElementById('checkboxweek2pasta').checked = true;
					}
				}
			});
		});

		// week1PastaCheckboxes.forEach(function(checkbox) {
		// 	checkbox.addEventListener('change', function() {
		// 		let allUnchecked = Array.from(week1PastaCheckboxes).every(c => !c.checked);
		// 		if (allUnchecked) {
		// 			document.getElementById('checkboxweek1pasta').checked = false;
		// 		} else {
		// 			document.getElementById('checkboxweek1pasta').checked = true;
		// 		}
		// 	});
		// });

		// week2PastaCheckboxes.forEach(function(checkbox) {
		// 	checkbox.addEventListener('change', function() {
		// 		let allUnchecked = Array.from(week2PastaCheckboxes).every(c => !c.checked);
		// 		if (allUnchecked) {
		// 			document.getElementById('checkboxweek2pasta').checked = false;
		// 		} else {
		// 			document.getElementById('checkboxweek2pasta').checked = true;
		// 		}
		// 	});
		// });

		let pastaCheckboxes = document.querySelectorAll('input[id^="checkboxpasta"]');

		pastaCheckboxes.forEach(function(checkbox) {
			checkbox.addEventListener('change', function() {
				// If any checkbox is unchecked, uncheck 'ALL'
				if (!this.checked) {
					document.getElementById('checkboxall2').checked = false;
				} else {
					// If all checkboxes are checked, check 'ALL'
					let allChecked = Array.from(pastaCheckboxes).every(c => c.checked);
					if (allChecked) {
						document.getElementById('checkboxall2').checked = true;
					}
				}
			});
		});


		// Function to calculate total
		function calculateTotal() {
			let total = 0;

			// Loop through checkboxes
			checkboxes.forEach(function(checkbox) {
				// If checkbox is checked
				if (checkbox.checked) {
					// If it's a parent checkbox
					if (checkbox.id.startsWith('checkboxdaily') && checkbox.id.endsWith('_1')) {
						// Add its price to the total
						total += parseFloat(checkbox.getAttribute('data-price'));
						// } else {
						// 	// If it's a child checkbox, check if the corresponding parent checkbox is not checked
						// 	let parentId = checkbox.id.substring(0, checkbox.id.lastIndexOf('_')) + '_1';
						// 	let parentCheckbox = document.getElementById(parentId);
						// 	if (parentCheckbox && !parentCheckbox.checked) {
						// 		// If the parent checkbox exists and is not checked, add the child checkbox's price to the total
						// 		total += parseFloat(checkbox.getAttribute('data-price'));
						// 	}
					} else if (checkbox.id.startsWith('checkboxdaily') && !checkbox.id.endsWith('_1')) {
						// If it's a child checkbox, check if the corresponding parent checkbox is not checked
						let parentId = checkbox.id.substring(0, checkbox.id.lastIndexOf('_')) + '_1';
						let parentCheckbox = document.getElementById(parentId);
						if (parentCheckbox && !parentCheckbox.checked) {
							// If the parent checkbox exists and is not checked, add the child checkbox's price to the total
							total += parseFloat(checkbox.getAttribute('data-price'));
						}
					} else if (checkbox.id.startsWith('checkboxpasta')) {
						// Add its price to the total
						total += parseFloat(checkbox.getAttribute('data-price'));
					} else if (checkbox.id.startsWith('checkboxbreakfast')) {
						// Add its price to the total
						total += parseFloat(checkbox.getAttribute('data-price'));
					}
				}
			});

			// Display the total
			let totalPriceElement = document.getElementById('totalPrice');
			totalPriceElement.textContent = 'Rp. ' + total.toLocaleString('id-ID'); // Use toLocaleString to format the number with a thousands separator
		}

		function showPopup(event, url) {
			event.preventDefault(); // Prevent the default action

			var modal = document.getElementById("myModal");
			var img = document.getElementById("img01");
			var noImage = document.getElementById("noImage");

			if (url) {
				img.src = url;
				img.style.display = "block";
				noImage.style.display = "none";
			} else {
				img.style.display = "none";
				noImage.style.display = "block";
			}

			modal.style.display = "block";

			var span = document.getElementsByClassName("close")[0];
			span.onclick = function() {
				modal.style.display = "none";
				document.body.style.overflow = "auto"; // Enable scrolling
			}

			document.body.style.overflow = "hidden"; // Disable scrolling
		}

		document.getElementById("dailySetHeading").addEventListener("click", function() {
			var table = document.getElementById("dailySetTable");
			var arrow = document.getElementById("arrow");
			if (table.style.display === "none") {
				table.style.display = "block";
				arrow.textContent = "▲";
			} else {
				table.style.display = "none";
				arrow.textContent = "▼";
			}
		});

		document.getElementById("pastaHeading").addEventListener("click", function() {
			var table = document.getElementById("pastaTable");
			var arrow = document.getElementById("pastaArrow");
			if (table.style.display === "none") {
				table.style.display = "block";
				arrow.textContent = "▲";
			} else {
				table.style.display = "none";
				arrow.textContent = "▼";
			}
		});

		document.getElementById("breakfastHeading").addEventListener("click", function() {
			var table = document.getElementById("breakfastTable");
			var arrow = document.getElementById("breakfastArrow");
			if (table.style.display === "none") {
				table.style.display = "block";
				arrow.textContent = "▲";
			} else {
				table.style.display = "none";
				arrow.textContent = "▼";
			}
		});

		$(document).ready(function() {
			var max_height = 0;
			$("td").each(function() {
				if ($(this).height() > max_height) {
					max_height = $(this).height();
				}
			});
			$("td").height(max_height);
		});
	</script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>