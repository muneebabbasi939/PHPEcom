<script src="assets/jquery-3.7.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

<!-- alertify js -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
    alertify.set('notifier', 'position', 'top-right');
    <?php
    if (isset($_SESSION['message'])) {
        ?>
        alertify.success('<?= $_SESSION['message'] ?>');

        <?php
        unset($_SESSION['message']);
    }
    ?>
</script>
</body>

</html>