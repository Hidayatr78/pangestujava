<!-- Footer Start -->
<div class="container-fluid bg-primary text-white mt-5 py-5 px-sm-3 px-md-5">
    <div class="container text-center py-5">
        <div class="d-flex justify-content-center mb-4">
            <a class="btn btn-light btn-social mr-2" href="<?= $biodata['github']; ?>"><i class="fab fa-github"></i></a>
            <a class="btn btn-light btn-social mr-2" href="<?= $biodata['fb']; ?>"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-light btn-social mr-2" href="<?= $biodata['linked']; ?>"><i class="fab fa-linkedin-in"></i></a>
            <a class="btn btn-light btn-social" href="<?= $biodata['ig']; ?>"><i class="fab fa-instagram"></i></a>
        </div>
        <!-- <div class="d-flex justify-content-center mb-3">
            <a class="text-white" href="#">Privacy</a>
            <span class="px-3">|</span>
            <a class="text-white" href="#">Terms</a>
            <span class="px-3">|</span>
            <a class="text-white" href="#">FAQs</a>
            <span class="px-3">|</span>
            <a class="text-white" href="#">Help</a>
        </div> -->
        <p class="m-0">Copyright &copy; <?php echo date("Y"); ?> <a class="text-white font-weight-bold" href="<?= $biodata['ig']; ?>"><?= $konfigurasi['namaweb']; ?></a>. All Rights Reserved.
            <!-- Designed by <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a> -->
        </p>
    </div>
</div>
<!-- Footer End -->

<!-- Scroll to Bottom -->
<i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

<!-- Back to Top -->
<a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/user/lib/typed/typed.min.js"></script>
<script src="<?= base_url() ?>/user/lib/easing/easing.min.js"></script>
<script src="<?= base_url() ?>/user/lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url() ?>/user/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>/user/lib/isotope/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>/user/lib/lightbox/js/lightbox.min.js"></script>

<!-- Contact Javascript File -->
<script src="<?= base_url() ?>/user/mail/jqBootstrapValidation.min.js"></script>
<script src="<?= base_url() ?>/user/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="<?= base_url() ?>/user/js/main.js"></script>
</body>

</html>