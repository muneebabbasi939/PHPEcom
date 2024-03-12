<?php
include('functions/userFunctions.php');
include('includes/header.php');
include('includes/slider.php');
?>

<style>
    .underline {
        height: 5px;
        width: 200px;
        background-color: red;
        border-radius: 20px;
    }
    .bg-f2f2f2{
        background-color: #f2f2f2;
    }
</style>
<div class="py-5">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Trending Products</h4>
            <div class="underline mb-2"></div>
            <div class="row">
                <div class="owl-carousel">
                    <?php
                    $trendingProducts = getAllTrending();
                    if (mysqli_num_rows($trendingProducts) > 0) {
                        foreach ($trendingProducts as $item) {
                            ?>
                            <div class="item">
                                <a class="text-decoration-none" href="product-view.php?product=<?= $item['slug']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100"
                                                height="200px">
                                            <h6 class="text-center">
                                                <?= $item['name']; ?>
                                            </h6>

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class=" py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>About Us</h4>
                <div class="underline mb-2"></div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos, autem dignissimos nemo commodi, earum animi ducimus tempora illo voluptas repellendus ex cum atque veritatis facilis. perferendis animi quis reiciendis.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos, autem dignissimos nemo commodi, earum animi ducimus tempora illo voluptas repellendus ex cum atque veritatis facilis. perferendis animi quis reiciendis.</p>
            </div>
        </div>
    </div>
</div>

<div class=" py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white"><img height="100px" width="200px" src="assets/img/PHPx.png" alt="logo"></h4>
                <div class="underline mb-2"></div>
                <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i>Home</a><br>
                <a href="#" class="text-white"><i class="fa fa-angle-right"></i>About Us</a><br>
                <a href="cart.php" class="text-white"><i class="fa fa-angle-right"></i>My Cart</a><br>
                <a href="categories.php" class="text-white"><i class="fa fa-angle-right"></i>Our Collections</a>
            </div>

            <div class="col-md-3">
                <h4 class="text-white">Address</h4>
                <p class="text-white">
                Hasilpur Rd, Bahawalpur University, Bahawalpur, Punjab, Pakistan
                </p>
                <a href="tel:+923337660939" class="text-white"><i class="fa fa-phone"></i> +92 3337660939</a><br>
                <a href="mailto:abc@gmail.com" class="text-white"><i class="fa fa-envelope"></i> abc@gmail.com</a>
            </div>

            <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55621.4340479009!2d71.70621440000001!3d29.389619200000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x393b91d700eac173%3A0x1bc6048ec98cce78!2sThe%20Islamia%20University%20of%20Bahawalpur%20-%20IUB%20Baghdad-ul-Jadeed%20Campus!5e0!3m2!1sen!2s!4v1689227379306!5m2!1sen!2s" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

<div class="py-2 bg-danger">
    <div class="text-center">
        <p class="mb-0 text-white">All rights reserved. &copy;Copyright  @ <a href="#">Muneeb Abbasi </a> -<?= date('Y') ?></p>
    </div>
</div>
<?php include('includes/footer.php') ?>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4  
            }
        }
    })
</script>