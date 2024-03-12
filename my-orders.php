<?php
include('functions/userFunctions.php');
include('includes/header.php');
include('authenticate.php');
?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white text-decoration-none" href="index.php">Home/</a>
            <a class="text-white text-decoration-none" href="my-orders.php">My Orders/</a>
        </h6>
    </div>
</div>
<div class="container">
    <div class="">
        <div class="row mt-5">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tracking No</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $orders = getOrders();
                        if (mysqli_num_rows($orders) > 0) {
                            foreach ($orders as $item) {
                                ?>
                                <tr>
                                    <td><?= $item['name']; ?></td>
                                    <td><?= $item['tracking_no']; ?></td>
                                    <td><?= $item['total_price']; ?></td>
                                    <td><?= $item['created_at']; ?></td>
                                    <td>
                                        <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View Details</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                    <td colspan="5">No Orders Yet</td>
                                </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php') ?>