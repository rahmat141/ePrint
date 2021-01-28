<div class="header-services">
    <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0"
        data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1"
        data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery
            on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery
            on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery
            on every order with Sky Store</p>
    </div>
</div>
<main class="ps-main">
    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-cart-listing">
                <?= $this->session->flashdata('pesan') ?>
                <table class="table ps-cart__table">
                    <thead>
                        <tr>
                            <th>All Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sum_harga = 0;
                        foreach ($pesanan as $p): ?>
                        <tr>
                            <td><a class="ps-product__preview" href="product-detail.html"><img class="mr-15"
                                        src="<?php echo base_url(); ?>assetsKonsumen/images/product/cart-preview/1.jpg"
                                        alt="">Produk <?= $p->nama_kategori ?></a></td>
                            <td><?= 'Rp ' .
                                number_format(
                                    $p->harga_paket,
                                    2,
                                    ',',
                                    '.'
                                ) ?></td>
                            <td>
                                <!-- <div class="form-group--number">
                                    <button class="minus"><span>-</span></button>
                                    <input class="form-control" type="text" value="2">
                                    <button class="plus"><span>+</span></button>
																</div> -->
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseExample<?= $p->id_pesanan ?>" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    Edit Jumlah Barang
                                </button>
                                </p>
                                <div class="collapse" id="collapseExample<?= $p->id_pesanan ?>">

                                    <form method="POST" action="<?= base_url(
                                        'konsumen/editJumlahBarang/'
                                    ) . $p->id_pesanan ?>">

                                        <input type="hidden" name="price" value="<?= $p->harga_paket ?>">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="">Ukuran S</label>
                                                <input type="text" class="form-control" placeholder="Ukuran S" $
                                                    value="<?= $p->ukuran_s ?>" name="ukuran_s">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Ukuran M</label>
                                                <input type="text" class="form-control" placeholder="Ukuran M"
                                                    value="<?= $p->ukuran_m ?>" name="ukuran_m">
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="">Ukuran L</label>
                                                <input type="text" class="form-control" placeholder="Ukuran L"
                                                    value="<?= $p->ukuran_l ?>" name="ukuran_l">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Ukuran XL</label>
                                                <input type="text" class="form-control" placeholder="Ukuran XL"
                                                    value="<?= $p->ukuran_xl ?>" name="ukuran_xl">
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="">Ukuran XXL</label>
                                                <input type="text" class="form-control" placeholder="Ukuran XXL"
                                                    value="<?= $p->ukuran_xxl ?>" name="ukuran_xxl">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Ukuran 3XL</label>
                                                <input type="text" class="form-control" placeholder="Ukuran 3XL"
                                                    value="<?= $p->ukuran_3xl ?>" name="ukuran_3xl">
                                            </div>
                                        </div>
                                        <br>
                                        <button class="btn btn-success" type="submit">Update Barang</button>






                                    </form>
                                </div>
                            </td>
                            <td><?= 'Rp ' .
                                number_format(
                                    $p->total_harga,
                                    2,
                                    ',',
                                    '.'
                                ) ?></td>
                            <td>
                                <a class="ps-remove" href="<?= base_url(
                                    'konsumen/hapusInCart/'
                                ) . $p->id_pesanan ?>"></a>
                            </td>
                        </tr>
                        <?php $sum_harga += $p->total_harga; ?>
                        <?php endforeach;
                        ?>



                    </tbody>
                </table>
                <div class="ps-cart__actions">
                    <div class="ps-cart__promotion">
                        <div class="form-group">
                            <div class="ps-form--icon"><i class="fa fa-angle-right"></i>

                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                    </div>
                    <div class="ps-cart__total">
                        <h3>Total Price: <span> <?= number_format(
                            $sum_harga,
                            2,
                            ',',
                            '.'
                        ) ?></span></h3><a class="ps-btn" href="<?= base_url(
    'Konsumen/
checkout'
) ?>">Process to checkout<i class="ps-icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>



    </div>