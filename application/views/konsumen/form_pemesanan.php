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
    <div style="text-align: center;padding-top: 20px;">
        <img src="<?=base_url(
    'assetsKonsumen/'
)?>images/cart-preview/shopping-cart.png" alt="" width=150>
        <h1>Silahkan Lihat Paket <?=$nama_barang1?> Disini</h1><br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            Lihat Paket
        </button>
    </div>
    <div class="ps-blog-grid pt-40 pb-80">
        <div class="ps-container">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                        <?php if ($this->session->flashdata('pesan')): ?>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?=$this->session->flashdata('pesan')?>
                            </div>
                        </div>

                        <?php endif;?>

                        <!--  -->

                        <form method="POST" action="<?=base_url(
    'konsumen/masukKeranjang'
)?>" enctype="multipart/form-data">
                            <input type="hidden" name="nama_barang" value="<?=$nama_barang?>">

                            <input type="hidden" value="<?=$id_kategori?>" name="id_kategori">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputState">Pilih Paket</label>
                                    <select id="inputState" class="form-control" name="paket" id="paket" required>
                                        <option value="" selected>Choose...</option>
                                        <?php
$i = 1;
foreach ($barang as $item): ?>
                                        <option value="<?=$item->id_pakaiian?>">Paket <?=$i++?></option>
                                        <?php endforeach;
?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Ukuran S</label>
                                    <input type="number" class="form-control" id="" name="uk_s" value="0" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Ukuran M</label>
                                    <input type="number" class="form-control" id="inputPassword4" name="uk_m" value="0">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Ukuran L</label>
                                    <input type="number" class="form-control" id="inputPassword4" name="uk_l" value="0">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Ukuran XL</label>
                                <input type="number" class="form-control" id="inputEmail4" name="uk_xl" value="0">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Ukuran XXL</label>
                                <input type="number" class="form-control" id="inputPassword4" value="0" name="uk_xxl">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Ukuran 3XL</label>
                                <input type="number" class="form-control" id="inputPassword4" value="0" name="uk_3xl">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputState">Punya Desain Sendiri? (Jika ada upload desain mu !)</label>
                                    <input type="file" class="form-control" id="inputPassword4" value="0"
                                        style="padding: 10px;" name="desain">
                                    <div class="valid-feedback" style="margin: 5px; ">
                                        <sup>*</sup><i>Jika tidak mengisi, maka desain akan dibuat kan oleh pihak
                                            kami</i>
                                    </div>
                                </div>
                            </div>
                            <div class=" form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success" style="padding: 10px;">Masukkan
                                        Keranjang</button>
                                </div>
                            </div>
                    </div>
                    </form>



                </div>







            </div>




        </div>
    </div>
    </div>


    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Paket <?=$nama_barang?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <img src="<?=base_url('assetsKonsumen/paket/') . $paket['list_paket']?>" alt="">



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


















































































                </div>
            </div>
        </div>
    </div>