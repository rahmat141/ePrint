<div class="header-services">
    <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery
            on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery
            on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery
            on every order with Sky Store</p>
    </div>
</div>
<main class="ps-main">
    <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
            <form class="ps-checkout__form" action="<?= base_url('konsumen/editProfile') ?>" method="post">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__billing">
                            <?php foreach ($user as $id) : ?>
                                <h3>Profile</h3>
                                <div class="form-group form-group--inline">
                                    <label>Username<span></span>
                                    </label>
                                    <input class="form-control" type="text" name="username" value="<?= $id['username'] ?>" disabled>
                                </div>
                                <div class="form-group form-group--inline">
                                    <label>Email<span></span>
                                    </label>
                                    <input class="form-control" type="email" value="<?= $id['email'] ?>" disabled><br>
                                    <button class="btn btn-light" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Edit Email
                                    </button>
                                    </p>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                            <input class="form-control" type="email" name="email" value="<?= $id['email'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group--inline">
                                    <label>Alamat<span></span>
                                    </label>
                                    <input class="form-control" type="text" name="alamat" value="<?= $id['alamat'] ?>">
                                </div>
                                <div class="form-group form-group--inline">
                                    <label>Status<span></span>
                                    </label>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                    <?php foreach ($status as $key => $value) { ?>
                                        <option <?php if($value->role_id == $id['role_id']){ ?> selected <?php } ?> value="<?= $value->role_id ?>"><?= $value->jenis_pengguna ?></option>
                                    <?php } ?>
                                    </select>
                                    <!-- <input class="form-control" type="text" name="status" value="<?= $id['jenis_pengguna'] ?>"> -->
                                </div>
                                <div class="form-group form-group--inline">
                                    <label>Bergabung pada<span></span>
                                    </label>
                                    <input class="form-control" type="text" value="<?= $id['created_at'] ?>" disabled>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>