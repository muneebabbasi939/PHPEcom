<?php
include('functions/userFunctions.php');
include('includes/header.php');

if (isset($_GET['category'])) {
    $category_slug = $_GET['category'];
    $category_data = getSlugActive('categories', $category_slug);
    $category = mysqli_fetch_array($category_data);
    if($category){
    $category_id = $category['id'];
    ?>

    <div class="py-3 bg-primary">
        <div class="container">
            <h6 class="text-white">
                <a class="text-white text-decoration-none" href="categories.php">Home/</a>
                <a class="text-white text-decoration-none" href="categories.php">Collections/</a>
                <?= $category['name']; ?>
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <h1>
                    <?= $category['name']; ?>
                </h1>
                <hr>
                <div class="row">
                    <?php
                    $products = getProductByCategory($category_id);
                    if (mysqli_num_rows($products) > 0) {
                        foreach ($products as $item) {
                            ?>
                            <div class="col-md-3 mb-3">
                                <a class="text-decoration-none" href="product-view.php?product=<?= $item['slug'];?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100"
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

    <?php
    }
    else{
        echo "Somethin Went Wrong";
    }
} 
else {
    echo "Something Went Wrong";
}
include('includes/footer.php');
?>