<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <form class="login100-form validate-form" method="post" action="<?= base_url(
                    'auth/changePassword'
                ) ?>">


                    <span class="login100-form-title p-b-43">
                        <?= $head ?>
                    </span>

                    <?= $this->session->flashdata('pesan') ?>



                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password1">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>
                    <?= form_error(
                        'password1',
                        '<small class="text-danger pl-3">',
                        '</small>'
                    ) ?>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password2">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Re-type Password</span>
                    </div>
                    <?= form_error(
                        'password2',
                        '<small class="text-danger pl-3">',
                        '</small>'
                    ) ?>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Reset Password
                        </button>
                    </div>




                </form>

                <div class="login100-more" style="background-image: url('<?= base_url(
                    'assets_auth/'
                ) ?>images/spiderman.jpeg');">
                </div>
            </div>
        </div>
    </div>