<div class="page-content--bge5">
    <div class="container">
        <div class="login-wrap">
            <div class="login-content">
                <div class="login-logo">
                    <a href="#">
                        <img src="https://www.swa-jkt.com/uploads/logo/logo.png" alt="SWA" />
                    </a>
                </div>
                <div class="login-form">
                    <form action="<?php echo base_url('login/change_password'); ?>" method="post">
                        <div class="form-group">
                            <label class="font-weight-bold">Current Password <span class="text-danger">*</span></label>
                            <input class="au-input au-input--full" type="password" name="current_password" placeholder="Current Password" required />
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">New Password <span class="text-danger">*</span></label>
                            <input class="au-input au-input--full" type="password" name="new_password" placeholder="New Password" required />
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Confirm New Password <span class="text-danger">*</span></label>
                            <input class="au-input au-input--full" type="password" name="confirm_new_password" placeholder="Confirm New Password" required />
                        </div>

                        <!-- Change the type to 'button' so it doesn't submit the form -->
                        <button class="au-btn au-btn-lg au-btn--block btn-success text-center m-b-20" data-toggle="modal" data-target="#exampleModalCenter" type="submit">
                            change password
                        </button>
                    </form>
                </div>
                <form action="<?php echo base_url('login/redirect_back'); ?>" method="post">
                    <button class="au-btn au-btn-lg au-btn--block btn-secondary text-center m-b-20" data-toggle="modal" data-target="#exampleModalCenter" type="submit">
                        Back
                    </button>
                </form>
                <?php if ($this->session->flashdata('error2')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error2'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('success') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


Modal Pop-up
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <!-- Add a click event to the 'Yes' button to submit the form -->
<button type="button" class="btn btn-primary" onclick="document.forms[0].submit();">Yes</button>
</div>
</div>
</div>
</div> -->