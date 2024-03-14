<!-- MAIN CONTENT-->
<style>
	.row .col-lg-6 {
		padding-top: 100px;
	}
</style>

<div class="section__content section__content--p30">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<?php if ($this->session->flashdata('flash')) { ?>
					<div class="alert alert-info" id="flashdata" style="background-color: #4bb543; color: #ffff;">
						<?php echo $this->session->flashdata('flash'); ?>
					</div>
				<?php } ?>
				<div class="card">
					<div class="card-header">
						<strong>Create New Menu</strong>
					</div>
					<div class="card-body card-block">
						<form action="<?php echo site_url('product/add_product'); ?>" method="post" class="form-horizontal" id="productForm">
							<div class="row form-group">
								<div class="col col-sm-5">
									<label class="pb-1">Choose Category<span class="text-danger">*</span></label>
								</div>
								<div class="col col-sm-6">
									<select name="category" id="category" class="form-control">
										<?php foreach ($categories as $cat) : ?>
											<option value="<?= $cat['id']; ?>">
												<?= $cat['category']; ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-sm-5">
									<label for="input-normal" class=" form-control-label">Menu Name<span class="text-danger">*</span></label>
								</div>
								<div class="col col-sm-6">
									<input type="text" id="input-normal" name="name" placeholder="Type here..." class="form-control" required>
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
							<i class=""></i> Submit
						</button>
					</div>
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
				<button type="submit" class="btn btn-primary" form="productForm">Yes</button>
			</div>
		</div>
	</div>
</div>
</form>