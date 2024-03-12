<?php
include('functions/userFunctions.php');
include('includes/header.php');
include('authenticate.php');
?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white text-decoration-none" href="index.php">Home/</a>
            <a class="text-white text-decoration-none" href="cart.php">Cart/</a>
        </h6>
    </div>
</div>
<div class="container">
    <div class="">
        <div class="row mt-5">
            <div class="col-md-12">
                <div id="myCart">
                    <?php
                    $cart_items = getCartItems();
                    if (mysqli_num_rows($cart_items) > 0) {
                        ?>
                        <div class="row align-items-center mb-4 ">
                            <div class="col-md-5">
                                <h5>Product</h5>
                            </div>
                            <div class="col-md-3">
                                <h5>Selling Price</h5>
                            </div>
                            <div class="col-md-2">
                                <h5>Quantity</h5>
                            </div>
                            <div class="col-md-2">
                                <h5>Action</h5>
                            </div>
                        </div>
                        <div id="myCart">
                            <?php
                            foreach ($cart_items as $item) {
                                ?>
                                <div class="card product_data shadow-sm mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $item['image']; ?>" alt="Image" class="w-" width="80px"
                                                height="80px">
                                        </div>
                                        <div class="col-md-3">
                                            <h5>
                                                <?= $item['name'] ?>
                                            </h5>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>
                                                Rs
                                                <?= $item['selling_price'] ?>
                                            </h5>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="hidden" class="prodId" value="<?= $item['prod_id'] ?>">
                                            <div class="input-group mb-3" style="width:130px">
                                                <button class="input-group-text decrement-btn updateQty">-</button>
                                                <input type="text" class="form-control bg-white text-center input-qty"
                                                    value="<?= $item['prod_qty'] ?>" disabled>
                                                <button class="input-group-text increment-btn updateQty">+</button>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-danger btn-sm deleteItem" value="<?= $item['cid'] ?>">
                                                <i class="fa fa-trash"></i>
                                                Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="float-end">
                            <a href="checkout.php" class="btn btn-outline-primary">Proceed To Checkout</a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="card card-body text-center">
                            <h4 class="py-3">Your Cart Is Empty</h4>
                        </div>
                        <?php

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>