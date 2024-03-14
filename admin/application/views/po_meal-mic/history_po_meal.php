<style>
	.table-data2 {
		margin-left: 16px;
	}

	.card {
		margin-bottom: 5px;
	}
</style>

<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<!-- Title -->
			<div class="row form-group justify-content-center">
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<strong>PO Meal History</strong>
						</div>

						<div class="card-body card-block">
							<div class="row form-group">
								<div class="col col-sm-8">
									<label for="input-normal" class="form-control-label">Title</label>
								</div>
								<label name="Title"><?= $purchase_meal['remark'] ?></label>

							</div>
							<div class="row form-group">
								<div class="col col-sm-4">
									<label for="input-normal" class=" form-control-label">Begin Date</label>
								</div>
								<input name="Begin"><?= $purchase_meal['begin_date'] ?></label>

							</div>
							<div class="row form-group">
								<div class="col col-sm-4">
									<label for="input-normal" class=" form-control-label">End Date</label>
								</div>
								<input name="End"><?= $purchase_meal['end_date'] ?></label>
							</div>

							<div class="row form-group">
								<div class="col col-sm-4">
									<label for="input-normal" class=" form-control-label">Status</label>
								</div>
								<input name="Status"><?= $purchase_meal['status'] ?></label>
							</div>
						</div>

					</div>


				</div>
			</div>
		</div>


		<div class="row form-group justify-content-center">
			<div class="col-md-9">
				<div class="table-responsive">
					<?php
					$grouped_details = [];
					foreach ($po_purchase_meal_dtl as $detail) {
						$grouped_details[$detail->date][] = $detail;
					}
					?>

					<table id="dataTable" class="table table-data2">
						<th class="text-center">Name</th>
						<th class="text-center">Price</th>
						<?php foreach ($grouped_details as $date => $details) : ?>
							<thead>
								<tr>
									<th style="font-size: 16px; padding-top: 50px;" id="date"><?php echo $date; ?></th>
								</tr>
							</thead>

							<?php foreach ($details as $detail) : ?>
								<tr>
									<td><?php echo $detail->name; ?></td>
									<td>Rp. <?php echo $detail->price; ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>

	</div>