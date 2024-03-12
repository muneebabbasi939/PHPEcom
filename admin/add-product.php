<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
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
                                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                            <?php
                                        }
                                    } else {
                                        echo "Category not found";
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Name</label>
                                <input type="text" name="name" class="form-control mb-3"
                                    required placeholder="Enter Product Name">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Slug</label>
                                <input type="text" name="slug" class="form-control mb-3" required placeholder="Enter slug">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Small Description</label>
                                <textarea name="small_description" required placeholder="Enter Small Description" rows="3"
                                    class="form-control mb-3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea name="description" required placeholder="Enter Description" rows="3"
                                    class="form-control mb-3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Original Price</label>
                                <input type="text" name="original_price" class="form-control mb-3"
                                    required placeholder="Enter Original Price">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Selling Price</label>
                                <input type="text" name="selling_price" class="form-control mb-3"
                                    required placeholder="Enter Selling Price">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" name="image" class="form-control mb-3" required placeholder="Choose Image">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Quantity</label>
                                    <input type="number" name="qty" class="form-control mb-3"
                                        required placeholder="Enter Quantity">
                                </div>
                                <div class="col-md-3"><br>
                                    <label class="mb-0">Status</label>
                                    <input type="checkbox" name="status"></input>
                                </div>
                                <div class="col-md-3"><br>
                                    <label class="mb-0">Trending</label>
                                    <input type="checkbox" name="trending"></input>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control mb-3"
                                    required placeholder="Enter Meta-Title">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Keywords</label>
                                <textarea name="meta_keywords" required placeholder="Enter Meta-Keywords" rows="3"
                                    class="form-control mb-3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Description</label>
                                <textarea name="meta_description" required placeholder="Enter Meta-Description" rows="3"
                                    class="form-control mb-3"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Add
                                    Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>