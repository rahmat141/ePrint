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
    <div style="text-align: center;padding-top: 20px;">
        <img src="<?= base_url(
                        'assetsKonsumen/'
                    ) ?>images/cart-preview/shopping-cart.png" alt="" width=150>
        <h1>Mau pesan apa kak?</h1>
    </div>
    <div class="ps-blog-grid pt-40 pb-80">
        <div class="ps-container">

            <div class="row">

                <?= $this->session->flashdata('pesan') ?>





                <?php foreach ($pilih_kategori as $pk) : ?>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <div class="ps-post mb-30">
                            <div class="ps-post__thumbnail">
                                <a class="ps-post__overlay" href="<?= base_url(
                                                                        'konsumen/pesanBarang/'
                                                                    ) .
                                                                        $pk->id_kategori ?>">
                                </a>
                                <img src="<?= base_url('assetsKonsumen/images/kategori/tshirt.jpg') ?>" alt="" height="250">
                            </div>
                            <div class="ps-post__content"><a class="ps-post__title" href="<?= base_url(
                                                                                                'konsumen/pesanBarang/'
                                                                                            ) . $pk->id_kategori ?>" style="text-align: center;margin-left:-15px"><?= $pk->nama_kategori ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>



            </div>














        </div>
    </div>
    </div>