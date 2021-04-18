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
    <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">

            <form class="ps-checkout__form" action="<?=base_url(
    'konsumen/bayar_barang'
)?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">

                        <div class="alert alert-warning alert-dismissible show" role="alert">
                            <strong>Perhatian!</strong> Lakukan pembayaran dalam <strong>1X24 Jam</strong> lebih dari
                            itu, pesanan akan dibatalkan.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="ps-checkout__billing">
                            <h3>Billing Detail</h3>
                            <div class="form-group form-group--inline">
                                <label>Nama Pemesan<span>*</span>
                                </label>
                                <input class="form-control" type="text" name="nama_pemesan" required>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Email Address<span>*</span>
                                </label>
                                <input class="form-control" type="email" name="email" required>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Phone<span>*</span>
                                </label>
                                <input class="form-control" type="text" name="phone" required>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Address<span>*</span>
                                </label>
                                <textarea class="form-control" rows="5" placeholder="" name="alamat"
                                    required></textarea>
                            </div>

                            <div class="form-group form-group--inline">
                                <label>Bukti Bayar<span>*</span>
                                </label>
                                <input type="file" tclass="form-control" rows="5" placeholder="" name="bukti_bayar"
                                    required>
                            </div>

                            <h3 class="mt-40"> Addition information</h3>
                            <div class="form-group form-group--inline textarea">
                                <label>Order Notes</label>
                                <textarea class="form-control" rows="5"
                                    placeholder="Notes about your order, e.g. special notes for delivery."
                                    name="notes"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__order">
                            <header>
                                <h3>Your Order</h3>
                            </header>
                            <div class="content">
                                <table class="table ps-checkout__products">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase">Product</th>
                                            <th class="text-uppercase">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$sum_harga = 0;
foreach ($all_pesanan as $item): ?>
                                        <tr>
                                            <td>PAKET <?=$item->nama_kategori?></td>
                                            <td><?='Rp ' .
number_format(
    $item->total_harga,
    2,
    ',',
    '.'
)?></td>
                                        </tr>
                                        <?php $sum_harga +=
$item->total_harga;
endforeach;
?>



                                        <tr>
                                            <td><b>Order Total</b></td>
                                            <td>
                                                <b> <?='Rp ' .
number_format(
    $sum_harga,
    2,
    ',',
    '.'
)?>
                                                </b>
                                                <input type="hidden" value="<?=$sum_harga?>" name="total_bayar">
                                            </td>

                                        </tr>

                                        <tr>
                                            <td><b>Order DP (50% dari total harga)</b></td>
                                            <td>
                                                <b> <?='Rp ' .
number_format(
    $sum_harga / 2,
    2,
    ',',
    '.'
)?>
                                                </b>
                                                <input type="hidden" value="<?=$sum_harga?>" name="total_bayar">
                                                <input type="hidden" value="<?=$sum_harga / 2?>" name="total_dp">
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <footer>

                                <div class="form-group paypal">

                                    <?php
$data = [];
foreach ($barang_keranjang as $item) {
    array_push($data, $item->id_pesanan);
}

$data_pesan = implode('_', $data);
?>

                                    <div class="form-group form-group--inline">
                                        <label class="text-white">Pilih pembayaran<span>*</span>
                                        </label>
                                        <select class="custom-select mb-2" id="inputGroupSelect01" name="pembayarann">
                                            <option selected>Choose...</option>
                                            <option value="dp">DP</option>
                                            <option value="lunas">Lunas</option>
                                            <!-- <option value="3">Three</option> -->
                                        </select>
                                    </div>



                                    <div class="alert alert-warning alert-dismissible show" role="alert">
                                        Silahkan lakukan pembayaran ke rekening <strong>122131221 BCA
                                            (EGOAPATIS)</strong> .
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>


                                    <button class="ps-btn ps-btn--fullwidth">Place Order<i
                                            class="ps-icon-next"></i></button>
                                </div>
                            </footer>
                        </div>


                        <input type="hidden" value="<?=$data_pesan?>" name="id_pesanan">

                    </div>
                </div>
            </form>
        </div>
    </div>
