<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = getById("products", $id);
                if (mysqli_num_rows($product) > 0) {
                    $data = mysqli_fetch_array($product);
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Product
                                <a href="product.php" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-0">Select Category</label>
                                        <select name="category_id" class="form-select mb-3">
                                            <option selected>Select Category</option>
                                            <?php
                                            $categories = getAll("categories");
                                            if (mysqli_num_rows($categories) > 0) {
                                                foreach ($categories as $item) {
                                                    ?>
                                                    <option value="<?= $item['id'] ?>" <?= $data['category_id'] == $item['id']?'Selected':'' ?>><?= $item['name'] ?></option>
                                                    <?php
                                                }
                                            } else {
                                                echo "Category not found";
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
                                        <label class="mb-0">Name</label>
                                        <input type="text" name="name" class="form-control mb-3" required
                                            placeholder="Enter Product Name" value="<?= $data['name'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Slug</label>
                                        <input type="text" name="slug" class="form-control mb-3" required
                                            placeholder="Enter slug" value="<?= $data['slug'] ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Small Description</label>
                                        <textarea name="small_description" required placeholder="Enter Small Description"
                                            rows="3" class="form-control mb-3"><?= $data['small_description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Description</label>
                                        <textarea name="description" required placeholder="Enter Description" rows="3"
                                            class="form-control mb-3"><?= $data['description'] ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Original Price</label>
                                        <input type="text" name="original_price" class="form-control mb-3" required placeholder="Enter Original Price" value="<?= $data['original_price'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control mb-3" required placeholder="Enter Selling Price" value="<?= $data['selling_price'] ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Upload Image</label>
                                        <input type="file" name="image" class="form-control mb-3" 
                                            placeholder="Choose Image">
                                        <label class="mb-0">Current Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image']?>">
                                        <img src="../uploads/<?= $data['image']; ?>" alt="Product Image" height="100px" width="100px">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-0">Quantity</label>
                                            <input type="number" name="qty" class="form-control mb-3" required
                                                placeholder="Enter Quantity" value="<?= $data['qty'] ?>">
                                        </div>
                                        <div class="col-md-3"><br>
                                            <label class="mb-0">Status</label>
                                            <input type="checkbox" name="status" <?= $data['status'] ? "checked" : ""; ?>></input>
                                        </div>
                                        <div class="col-md-3"><br>
                                            <label class="mb-0">Trending</label>
                                            <input type="checkbox" name="trending" <?= $data['trending'] ? "checked" : ""; ?>></input>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control mb-3" required
                                            placeholder="Enter Meta-Title" value="<?= $data['meta_title'] ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Keywords</label>
                                        <textarea name="meta_keywords" required placeholder="Enter Meta-Keywords" rows="3"
                                            class="form-control mb-3"><?= $data['meta_keywords'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Description</label>
                                        <textarea name="meta_description" required placeholder="Enter Meta-Description" rows="3"
                                            class="form-control mb-3"><?= $data['meta_description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_product_btn">Update
                                            Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                }
                else{
                    echo "Product Not Found for Given ID";
                }
            } 
            else {
                echo "Id missing from URL ";
            }
            ?>

        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>