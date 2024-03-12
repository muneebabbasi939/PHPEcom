<?php
include('functions/userFunctions.php');
include('includes/header.php');
?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">Home/Collections</h6>
    </div>
</div>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <h1>Our Collections</h1>
            <hr>
            <div class="row">
                <?php
                $categories = getAllActive('categories');
                if (mysqli_num_rows($categories) > 0) {
                    foreach ($categories as $item) {
                        ?>
                        <div class="col-md-3 mb-3">
                            <a class="text-decoration-none" href="products.php?category=<?= $item['slug']; ?>">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <img src="uploads/<?= $item['image']; ?>" alt="Category Image" class="w-100"
                                            height="200px">
                                        <h4 class="text-center">
                                            <?= $item['name']; ?>
                                        </h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                } else {
                    echo "No data Available";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>