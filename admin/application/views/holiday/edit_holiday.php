<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Horizontal Form -->
                    <div class="card">
                        <form action="<?php echo base_url("holiday/update_holiday/" . $holiday['id']); ?>" method="post" class="form-horizontal" id="holiday_form">
                            <div class="card-header">
                                <strong>Edit holiday</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="id" class=" form-control-label">ID</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="int" id="id" name="id" value="<?= $holiday['id']; ?>" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="date" class=" form-control-label">Date</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" id="date" name="date" value="<?= $holiday['date']; ?>" class="form-control">
                                        <!-- <small class="form-text text-danger"><?= form_error('date'); ?></small> -->
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="description" class=" form-control-label">Description</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="description" name="description" value="<?= $holiday['description']; ?>" class="form-control" required>
                                        <!-- <small class="form-text text-danger"><?= form_error('description'); ?></small> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" name="edit_holiday" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class=""></i> Submit
                                </button>
                            </div>
                        </form>
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
            Are you sure to change it?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary" form="holiday_form">Yes</button>
            </div>
        </div>
    </div>
</div>