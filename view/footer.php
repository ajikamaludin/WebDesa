    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area clearfix">
        <!-- Top Fotter Area -->
        <div class="top-footer-area section_padding_100_0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="single-footer-widget mb-100">
                            <div class="contact-form-area">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <input type="text" class="form-control" id="name" placeholder="Nama">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="email" class="form-control" id="email" placeholder="E-mail">
                                        </div>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="subject" placeholder="Subjek">
                                        </div>
                                        <div class="col-12">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Pesan"></textarea>
                                        </div>
                                        <button class="btn mosh-btn mt-50 ml-15" type="submit">Kirim Pesan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-100">
                            <h5>Link Terkait</h5>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Services &amp; Features</a></li>
                                <li><a href="#">Accordions and tabs</a></li>
                                <li><a href="#">Menu ideas</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-100">
                            <h5>Info Kontak</h5>
                            <div class="footer-single-contact-info d-flex">
                                <div class="contact-icon">
                                    <img src="<?= assets('img/core-img/map.png')?>" alt="">
                                </div>
                                <p><?= getPengaturan()['alamat'];?></p>
                            </div>
                            <div class="footer-single-contact-info d-flex">
                                <div class="contact-icon">
                                    <img src="<?= assets('img/core-img/call.png')?>" alt="">
                                </div>
                                <p>Telp: <?= getPengaturan()['kontak']; ?></p>
                            </div>
                            <div class="footer-single-contact-info d-flex">
                                <div class="contact-icon">
                                    <img src="<?= assets('img/core-img/message.png')?>" alt="">
                                </div>
                                <p><?= getPengaturan()['email'];?></p>
                            </div>
                        </div>
                        <div class="footer-social-info">
                                <a href="https://www.instagram.com/<?= getPengaturan()['instagram'];?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="https://www.facebook.com/<?= getPengaturan()['facebook'];?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="https://www.twitter.com/<?= getPengaturan()['twitter'];?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fotter Bottom Area -->
        <div class="footer-bottom-area" style="display: none;">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="footer-bottom-content h-100 d-md-flex justify-content-between align-items-center">
                            <div class="copyright-text">
                                <p style="display: none;"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery-2.2.4 js -->
    <script src="<?= assets('js/jquery-2.2.4.min.js')?>"></script>
    <!-- Popper js -->
    <script src="<?= assets('js/popper.min.js') ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?= assets('js/bootstrap.min.js') ?>"></script>
    <!-- All Plugins js -->
    <script src="<?= assets('js/plugins.js') ?>"></script>
    <!-- Active js -->
    <script src="<?= assets('js/active.js') ?>"></script>