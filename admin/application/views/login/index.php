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
                    <form action="<?php echo site_url('login/login_btn'); ?>" method="post">
                        <div class="form-group">
                            <label class="font-weight-bold">Email Address</label>
                            <input class="au-input au-input--full" type="email" name="email1" placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <input class="au-input au-input--full" type="password" name="password1" placeholder="Password" />
                            <?php echo form_error('password'); ?>

                        </div>
                        <button class="au-btn au-btn--block btn-danger m-b-20" type="submit">
                            sign in
                        </button>
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error') ?>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('error2')) { ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error2') ?>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('timeout')) { ?>
                            <div class="alert alert-warning">
                                <?= $this->session->flashdata('timeout') ?>
                            </div>
                        <?php } ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>