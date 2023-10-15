</main><!-- End #main -->

<script>
    document.getElementById('poliklinik').addEventListener('change', function() {
        var selectedPoli = this.value;
        var dokterSelect = document.getElementById('dokter');
        var dokterOptions = dokterSelect.getElementsByTagName('option');

        for (var i = 0; i < dokterOptions.length; i++) {
            var dokterPoliId = dokterOptions[i].getAttribute('data-poliklinik-id');
            if (dokterPoliId == selectedPoli) {
                dokterOptions[i].style.display = '';
            } else {
                dokterOptions[i].style.display = 'none';
            }
        }
    });
</script>

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Prima Medika</h3>
                    <p>
                        Jalan Cigintung No.1 <br>
                        Kec. Kuningan<br>
                        Jawa barat <br>
                        45517 <br><br>

                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <strong>Phone:</strong> 089633445941<br>
                    <strong>Email:</strong> info@primamedika.com<br>

                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Contact</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">
        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>PrimaMedika</span></strong>. All Rights Reserved
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url('') ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?= base_url('') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('') ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url('') ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url('') ?>assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('') ?>assets/js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>