<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <form class="login100-form validate-form" method="post" action="<?= base_url(
                    'auth/forgot_password'
                ) ?>">


                    <span class="login100-form-title p-b-43">
                        <?= $head ?>
                    </span>

                    <?= $this->session->flashdata('pesan') ?>



                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" value="<?= set_value(
                            'email'
                        ) ?>">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>
                    <?= form_error(
                        'email',
                        '<small class="text-danger pl-3">',
                        '</small>'
                    ) ?>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Send Reset Link
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            back to login ?
                        </span>
                    </div>

                    <div class="login100-form-social flex-c-m">

                        <div class="container-login100-form-btn">
                            <a href="<?= base_url(
                                'auth'
                            ) ?>" class="login100-btn">
                                Login
                            </a>
                        </div>



                    </div>
                </form>

                <div class="login100-more" style="background-image: url('<?= base_url(
                    'assets_auth/'
                ) ?>images/spiderman.jpeg');">
                </div>
            </div>
        </div>
    </div>