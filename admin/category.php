<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Categories</h4>
                </div>
                <div class="card-body" id="category_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $category = getAll("categories");
                            if (mysqli_num_rows($category) > 0) {
                                foreach ($category as $item) {
                                    ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['image']; ?>" height="50px" width="100px" class="mx-auto d-block" alt="<?= $item['name']; ?>">
                                        </td>
                                        <td>
                                            <?= $item['status'] == 0 ? "Visible":"Hidden"; ?>
                                        </td>
                                        <td>
                                            <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-primary">Edit</a>
                                            <!-- <form action="code.php" method="POST">
                                                <input type="hidden" name="category_id" value="<?= $item//['id']; ?>">
                                                <button type="submit" class="btn btn-danger" name="delete_category_btn">Delete</button>
                                            </form> -->
                                            <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $item['id'];?>">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "No Records Found";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php') ?>