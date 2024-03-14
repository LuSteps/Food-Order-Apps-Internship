    <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Input Size -->
                    <div class="card">
                        <form action="" method="post" class="form-horizontal" id="holiday_form">
                            <div class="card-header">
                                <strong>Create New Holiday</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="input-date" class=" form-control-label">Date <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <input type="date" id="date" name="date" placeholder="" class="form-control">
                                        <small class="form-text text-danger"><?= form_error('date'); ?></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="input-description" class=" form-control-label">Description <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <input type="text" id="description" name="description" placeholder="Type here..." class="form-control">
                                        <small class="form-text text-danger"><?= form_error('description'); ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" name="add_holiday" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pop-up  -->
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
                <button type="submit" class="btn btn-primary" form="holiday_form">Yes</button>
            </div>
        </div>
    </div>
</div>