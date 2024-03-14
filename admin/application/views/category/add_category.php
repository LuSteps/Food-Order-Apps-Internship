<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <?php if ($this->session->flashdata('flash')) { ?>
                        <div class="alert alert-info">
                            <?php echo $this->session->flashdata('flash'); ?>
                        </div>
                    <?php } ?>
                    <!-- Input Size -->
                    <div class="card">
                        <div class="card-header">
                            <strong>Add Category</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php echo site_url('category/add_category'); ?>" method="post" class="form-horizontal" id="categoryForm">
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="input-normal" class=" form-control-label">Category<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <input type="text" id="input-normal" name="Category" placeholder="Type here..." class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="input-normal" class=" form-control-label">Sequence/Sort<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <input type="text" id="input-normal" name="Sort" placeholder="Type here..." class="form-control">
                                    </div>
                                </div>
                            </form>
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-warning">
                                    <?php echo validation_errors('<div class="error">', '</div>'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo site_url('Category/index'); ?>" class="btn btn-secondary btn-sm">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class=""></i> Submit
                            </button>
                        </div>
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
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to submit?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary" form="categoryForm">Yes</button>
            </div>
        </div>
    </div>
</div>