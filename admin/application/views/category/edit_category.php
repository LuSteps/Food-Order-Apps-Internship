<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Input Size -->
                    <div class="card">
                        <form action="<?php echo site_url('Category/update_category'); ?>" method="post" class="form-horizontal" id="editForm">
                            <div class="card-header">
                                <strong>Edit Category <?= $this->uri->segment(3); ?></strong>
                            </div>
                            <div class="card-body card-block">
                                <input type="hidden" id="hf-id" name="id_number" value="<?= $this->uri->segment(3); ?>">
                                <!-- <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="hf-id" class=" form-control-label">ID</label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <input type="int" id="hf-id" name="id_number" placeholder="<?= $this->uri->segment(3); ?>" class="form-control" disabled>
                                    </div>
                                </div> -->
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="hf-menu" class=" form-control-label">New Category<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <input type="text" id="hf-menu" name="Category" value="<?= $category['category']; ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="hf-menu" class=" form-control-label">Sequence/Sort<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <input type="text" id="hf-menu" name="Sort" value="<?= $category['Sort']; ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="<?php echo site_url('Category/index'); ?>" class="btn btn-secondary btn-sm">
                                        <i class="fa fa-arrow-left"></i> Back
                                    </a>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to change it?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary" form="editForm">Yes</button>
            </div>
        </div>
    </div>
</div>