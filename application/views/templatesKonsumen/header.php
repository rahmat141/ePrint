<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">


    <link rel="icon" type="image/png" href="<?= base_url(
        'assetsKonsumen/'
    ) ?>images/favicon.png" />




    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>Digital Printing</title>
    <!-- Fonts-->
    <link
        href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetsKonsumen/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetsKonsumen/plugins/ps-icon/style.css">
    <!-- CSS Library-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assetsKonsumen/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetsKonsumen/plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assetsKonsumen/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetsKonsumen/plugins/slick/slick/slick.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assetsKonsumen/plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assetsKonsumen/plugins/Magnific-Popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetsKonsumen/plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetsKonsumen/plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetsKonsumen/plugins/revolution/css/layers.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetsKonsumen/plugins/revolution/css/navigation.css">
    <!-- Custom-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetsKonsumen/css/style.css">




    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <title>Digital Printing</title>
</head>

<body class="ps-loading">
    <div class="header--sidebar"></div>
    <header class="header">
        <div class="header__top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                        <p>460 West 34th Street, 15th floor, New York - Hotline: 804-377-3580 - 804-399-3580</p>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="header__actions">
                            <?php if (!$this->session->userdata('id_user')): ?>
                            <div class="btn-group ps-dropdown">
                                <a href="<?= base_url('auth') ?>
								">Login & Register</a>
                            </div>

                            <?php else: ?>
                            <div class="btn-group ps-dropdown">
                                <a class="" href="<?= base_url(
                                    'konsumen/profile/'
                                ) . $this->session->userdata('id_user') ?>
								">Profile</a>
                            </div>
                            <div class="btn-group ps-dropdown">
                                <a class="" href="<?= base_url('auth/logout') ?>
								">Logout</a>
                            </div>

                            <?php endif; ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navigation">
            <div class="container-fluid">
                <div class="navigation__column left">
                    <div class="header__logo"><a class="ps-logo" href="<?php echo base_url(); ?>"><img
                                src="<?php echo base_url(); ?>assetsKonsumen/images/logo.png" alt=""></a></div>
                </div>
                <div class="navigation__column center">
                    <ul class="main-menu menu">
                        <li class="menu-item"><a href="<?= base_url() ?>">Home</a></li>
                        <!-- <li class="menu-item menu-item-has-children has-mega-menu"><a href="#">Men</a>
                            <div class="mega-menu">
                                <div class="mega-wrap">
                                    <div class="mega-column">
                                        <ul class="mega-item mega-features">
                                            <li><a href="<?= base_url(
                                                'Konsumen/productList'
                                            ) ?>">NEW RELEASES</a></li>
                                            <li><a href="product-listing.html">FEATURES SHOES</a></li>
                                            <li><a href="product-listing.html">BEST SELLERS</a></li>
                                            <li><a href="product-listing.html">NOW TRENDING</a></li>
                                            <li><a href="product-listing.html">SUMMER ESSENTIALS</a></li>
                                            <li><a href="product-listing.html">MOTHER'S DAY COLLECTION</a></li>
                                            <li><a href="product-listing.html">FAN GEAR</a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-column">
                                        <h4 class="mega-heading">Shoes</h4>
                                        <ul class="mega-item">
                                            <li><a href="product-listing.html">All Shoes</a></li>
                                            <li><a href="product-listing.html">Running</a></li>
                                            <li><a href="product-listing.html">Training & Gym</a></li>
                                            <li><a href="product-listing.html">Basketball</a></li>
                                            <li><a href="product-listing.html">Football</a></li>
                                            <li><a href="product-listing.html">Soccer</a></li>
                                            <li><a href="product-listing.html">Baseball</a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-column">
                                        <h4 class="mega-heading">CLOTHING</h4>
                                        <ul class="mega-item">
                                            <li><a href="product-listing.html">Compression & Nike Pro</a></li>
                                            <li><a href="product-listing.html">Tops & T-Shirts</a></li>
                                            <li><a href="product-listing.html">Polos</a></li>
                                            <li><a href="product-listing.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="product-listing.html">Jackets & Vests</a></li>
                                            <li><a href="product-listing.html">Pants & Tights</a></li>
                                            <li><a href="product-listing.html">Shorts</a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-column">
                                        <h4 class="mega-heading">Accessories</h4>
                                        <ul class="mega-item">
                                            <li><a href="product-listing.html">Compression & Nike Pro</a></li>
                                            <li><a href="product-listing.html">Tops & T-Shirts</a></li>
                                            <li><a href="product-listing.html">Polos</a></li>
                                            <li><a href="product-listing.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="product-listing.html">Jackets & Vests</a></li>
                                            <li><a href="product-listing.html">Pants & Tights</a></li>
                                            <li><a href="product-listing.html">Shorts</a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-column">
                                        <h4 class="mega-heading">BRAND</h4>
                                        <ul class="mega-item">
                                            <li><a href="product-listing.html">NIKE</a></li>
                                            <li><a href="product-listing.html">Adidas</a></li>
                                            <li><a href="product-listing.html">Dior</a></li>
                                            <li><a href="product-listing.html">B&G</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li> -->
                        <!-- <li class="menu-item"><a href="#">Women</a></li>
                        <li class="menu-item"><a href="#">Kids</a></li> -->

                        <li class="menu-item menu-item-has-children dropdown"><a href="#">Pemesanan</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="<?= base_url(
                                    'konsumen/'
                                ) ?>pesan_pilihkat">Pesan
                                        Sekarang Yuk!</a></li>
                                <li class="menu-item"><a href="<?= base_url(
                                    'konsumen/statusPemesanan'
                                ) ?>">Status Pemesanan</a></li>
                                <li class="menu-item"><a href="<?= base_url(
                                    'konsumen/historyPemesanan'
                                ) ?>">History Pemesanan</a></li>
                            </ul>
                        </li>

                        <!-- <li class="menu-item"><a href="<?= base_url(
                            'konsumen/'
                        ) ?>pesan_pilihkat">Pesan Yuk!</a></li> -->

                        <li class="menu-item menu-item-has-children dropdown"><a href="#">Contact</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="contact-us.html">Contact Us #1</a></li>
                                <li class="menu-item"><a href="contact-us.html">Contact Us #2</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="navigation__column right">
                    <form class="ps-search--header" action="do_action" method="post">
                        <input class="form-control" type="text" placeholder="Search Product…">
                        <button><i class="ps-icon-search"></i></button>
                    </form>


                    <div class="ps-cart"><a class="ps-cart__toggle" href="#"><span>

                                <?php if (!empty($jumlah_keranjang->jml)): ?>

                                <i><?= $jumlah_keranjang->jml ?></i>
                                <?php else: ?>
                                <i>0</i>
                                <?php endif; ?>


                            </span><i class="ps-icon-shopping-cart"></i></a>
                        <div class="ps-cart__listing">
                            <div class="ps-cart__content">


                                <?php
                                $sum_quantity = 0;
                                $sum_harga = 0;

                                foreach ($barang_keranjang as $item): ?>
                                <?php $hasil_rupiah =
                                    'Rp ' .
                                    number_format(
                                        $item->total_harga,
                                        2,
                                        ',',
                                        '.'
                                    ); ?>

                                <div class="ps-cart-item"><a class="ps-cart-item__close" href="<?= base_url(
                                    'konsumen/hapusCart/'
                                ) . $item->id_pesanan ?>"></a>
                                    <div class="ps-cart-item__thumbnail">
                                        <img src="<?php echo base_url(); ?>assetsKonsumen/images/cart-preview/1.jpg"
                                            alt="">
                                    </div>
                                    <div class="ps-cart-item__content"><a class="ps-cart-item__title">Produk
                                            <?= $item->nama_kategori ?></a>
                                        <p><span>Quantity:<i><?= $item->jumlah_barang ?></i></span><span>Total:<i><?= $hasil_rupiah ?></i></span>
                                        </p>
                                    </div>
                                </div>

                                <?php
                                $sum_harga += $item->total_harga;
                                $sum_quantity += $item->jumlah_barang;
                                ?>

                                <?php endforeach;
                                ?>



                            </div>

                            <div class="ps-cart__total">

                                <?php if (!empty($jumlah_keranjang->jml)): ?>

                                <p>Number of items:<span><?= $sum_quantity ?></span></p>
                                <p>Item
                                    Total:<span><?= 'Rp ' .
                                        number_format(
                                            $sum_harga,
                                            2,
                                            ',',
                                            '.'
                                        ) ?></span>
                                </p>

                                <?php else: ?>
                                <p>KOSONG</p>

                                <?php endif; ?>



                            </div>




















                            <?php if ($this->session->userdata('id_user')): ?>

                            <div class="ps-cart__footer"><a class="ps-btn" href="<?= base_url(
                                'Konsumen/cart'
                            ) ?>">Check
                                    out<i class="ps-icon-arrow-left"></i></a>
                            </div>
                            <?php else: ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="menu-toggle"><span></span></div>
                </div>
                < /div>
        </nav>
    </header>
