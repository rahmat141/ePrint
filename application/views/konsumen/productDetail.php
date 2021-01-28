<div class="header-services">
    <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0"
        data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1"
        data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard
            delivery
            on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard
            delivery
            on every order with Sky Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i></i><strong>Free delivery</strong>: Get free standard
            delivery
            on every order with Sky Store</p>
    </div>
</div>
<main class="ps-main">
    <div class="test">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
            </div>
        </div>
    </div>
    <div class="ps-product--detail pt-60">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-10 col-md-12 col-lg-offset-1">
                    <div class="ps-product__thumbnail">
                        <div class="ps-product__preview">
                            <div class="ps-product__variants">
                                <div class="item"><img
                                        src="<?php echo base_url() ?>assetsKonsumen/images/product/<?= $detail->gambar ?>"
                                        alt="">
                                </div>
                                <div class="item">
                                    <img src="<?php echo base_url() ?>assetsKonsumen/images/shoe-detail/2.jpg" alt="">
                                </div>
                                <a class="popup-youtube ps-product__video"
                                    href="https://www.youtube.com/watch?v=JYoafOTmivM"><img
                                        src="<?= base_url('assetsKonsumen/') ?>images/shoe-detail/1.jpg" alt=""><i
                                        class="fa fa-play"></i></a>

                            </div>
                        </div>
                        <div class="ps-product__image">
                            <div class="item"><img class="zoom"
                                    src="<?php echo base_url() ?>assetsKonsumen/images/product/<?= $detail->gambar ?>"
                                    alt="" data-zoom-image="images/shoe-detail/1.jpg"></div>
                            <div class="item"><img class="zoom"
                                    src="<?php echo base_url() ?>assetsKonsumen/images/shoe-detail/2.jpg" alt=""
                                    data-zoom-image="images/shoe-detail/2.jpg"></div>

                        </div>
                    </div>
                    <div class="ps-product__thumbnail--mobile">
                        <div class="ps-product__main-img"><img
                                src="<?php echo base_url() ?>assetsKonsumen/images/product/<?= $detail->gambar ?>"
                                alt=""></div>
                        <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true"
                            data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false"
                            data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3"
                            data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on"><img
                                src="<?php echo base_url() ?>assetsKonsumen/images/shoe-detail/1.jpg" alt=""></div>
                    </div>
                    <div class="ps-product__info">

                        <h1><?= $detail->jenis ?></h1>
                        <p class="ps-product__category"><a href="#"><?= $detail->nama_kategori ?></a></p>

                        <div class="ps-product__block ps-product__quickview">
                            <h4>QUICK REVIEW</h4>
                            <p>
                                <?= $detail->caption ?>
                            </p>
                        </div>

                        <!-- <div class="ps-product__block ps-product__style">
                            <h4>CHOOSE YOUR STYLE</h4>
                            <ul>
                                <li><a href="product-detail.html"><img
                                            src="<?php echo base_url() ?>assetsKonsumen/images/shoe/sidebar/1.jpg"
                                            alt=""></a></li>
                                <li><a href="product-detail.html"><img
                                            src="<?php echo base_url() ?>assetsKonsumen/images/shoe/sidebar/2.jpg"
                                            alt=""></a></li>
                                <li><a href="product-detail.html"><img
                                            src="<?php echo base_url() ?>assetsKonsumen/images/shoe/sidebar/3.jpg"
                                            alt=""></a></li>
                                <li><a href="product-detail.html"><img
                                            src="<?php echo base_url() ?>assetsKonsumen/images/shoe/sidebar/2.jpg"
                                            alt=""></a></li>
                            </ul>
						</div> -->


                        <!-- <div class="ps-product__block ps-product__size">
                            <h4>CHOOSE SIZE<a href="#">Size chart</a></h4>
                            <select class="ps-select selectpicker">
                                <option value="1">Select Size</option>
                                <option value="2">4</option>
                                <option value="3">4.5</option>
                                <option value="3">5</option>
                                <option value="3">6</option>
                                <option value="3">6.5</option>
                                <option value="3">7</option>
                                <option value="3">7.5</option>
                                <option value="3">8</option>
                                <option value="3">8.5</option>
                                <option value="3">9</option>
                                <option value="3">9.5</option>
                                <option value="3">10</option>
                            </select>
                            <div class="form-group">
                                <input class="form-control" type="number" value="1">
                            </div>
						</div> -->

                        <!-- <div class="ps-product__shopping"><a class="ps-btn mb-10" href="cart.html">Add to cart<i
                                    class="ps-icon-next"></i></a>

						</div> -->

                    </div>
                    <div class="clearfix"></div>
                    <div class="ps-product__content mt-50">
                        <ul class="tab-list" role="tablist">
                            <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab"
                                    data-toggle="tab">Overview</a></li>
                            <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Review</a></li>

                            <!-- <li><a href="#tab_03" aria-controls="tab_03" role="tab" data-toggle="tab">PRODUCT TAG</a>
                            </li>
                            <li><a href="#tab_04" aria-controls="tab_04" role="tab" data-toggle="tab">ADDITIONAL</a>
							</li> -->

                        </ul>
                    </div>
                    <div class="tab-content mb-60">
                        <div class="tab-pane active" role="tabpanel" id="tab_01">
                            <p>Caramels tootsie roll carrot cake sugar plum. Sweet roll jelly bear claw liquorice.
                                Gingerbread lollipop dragée cake. Pie topping jelly-o. Fruitcake dragée candy canes
                                tootsie roll. Pastry jelly-o cupcake. Bonbon brownie soufflé muffin.</p>
                            <p>Sweet roll soufflé oat cake apple pie croissant. Pie gummi bears jujubes cake lemon drops
                                gummi bears croissant macaroon pie. Fruitcake tootsie roll chocolate cake Carrot cake
                                cake bear claw jujubes topping cake apple pie. Jujubes gummi bears soufflé candy canes
                                topping gummi bears cake soufflé cake. Cotton candy soufflé sugar plum pastry sweet
                                roll..</p>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="tab_02">
                            <p class="mb-20">1 review for <strong>Shoes Air Jordan</strong></p>
                            <div class="ps-review">
                                <div class="ps-review__thumbnail"><img
                                        src="<?php echo base_url() ?>assetsKonsumen/images/user/1.jpg" alt=""></div>
                                <div class="ps-review__content">
                                    <header>
                                        <select class="ps-rating">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <p>By<a href=""> Alena Studio</a> - November 25, 2017</p>
                                    </header>
                                    <p>Soufflé danish gummi bears tart. Pie wafer icing. Gummies jelly beans powder.
                                        Chocolate bar pudding macaroon candy canes chocolate apple pie chocolate cake.
                                        Sweet caramels sesame snaps halvah bear claw wafer. Sweet roll soufflé muffin
                                        topping muffin brownie. Tart bear claw cake tiramisu chocolate bar gummies
                                        dragée lemon drops brownie.</p>
                                </div>
                            </div>

                        </div>

                        <!-- <div class="tab-pane" role="tabpanel" id="tab_03">
                            <p>Add your tag <span> *</span></p>
                            <form class="ps-product__tags" action="_action" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="">
                                    <button class="ps-btn ps-btn--sm">Add Tags</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="tab_04">
                            <div class="form-group">
                                <textarea class="form-control" rows="6"
                                    placeholder="Enter your addition here..."></textarea>
                            </div>
                            <div class="form-group">
                                <button class="ps-btn" type="button">Submit</button>
                            </div>
						</div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                        <h3 class="ps-section__title" data-mask="Related item">- YOU MIGHT ALSO LIKE</h3>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <div class="ps-owl-actions"><a class="ps-prev" href="#"><i
                                    class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i
                                    class="ps-icon-arrow-left"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="ps-section__content">
                <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true"
                    data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4"
                    data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4"
                    data-owl-duration="1000" data-owl-mousedrag="on">
                    <div class="ps-shoes--carousel">
                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">
                                <div class="ps-badge"><span>New</span></div><a class="ps-shoe__favorite" href="#"><i
                                        class="ps-icon-heart"></i></a>
                                <img src="<?php echo base_url() ?>assetsKonsumen/images/shoe/1.jpg" alt="">
                                <a class="ps-shoe__overlay" href="product-detail.html"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal">
                                        <img src="<?php echo base_url() ?>assetsKonsumen/images/shoe/2.jpg" alt="">
                                        <img src="<?php echo base_url() ?>assetsKonsumen/images/shoe/3.jpg" alt="">

                                    </div>

                                </div>
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air
                                        Jordan 7 Retro</a>
                                    <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a
                                            href="#"> Jordan</a></p>

                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
            </ div>
        </div>
