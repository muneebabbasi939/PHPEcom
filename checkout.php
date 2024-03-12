<?php
include('functions/userFunctions.php');
include('includes/header.php');
include('authenticate.php');
?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white text-decoration-none" href="index.php">Home/</a>
            <a class="text-white text-decoration-none" href="checkout.php">Checkout/</a>
        </h6>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="functions/placeorder.php" method="POST">
                <div class="row mt-5">
                    <div class="col-md-7">
                        <h5>Basic Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Name</label>
                                <input type="text" name="name" class="form-control" required
                                    placeholder="Enter your Full Name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">E-mail</label>
                                <input type="email" name="email" class="form-control" required
                                    placeholder="Enter your Email">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Phone</label>
                                <input type="text" name="phone" class="form-control" required
                                    placeholder="Enter your Phone Number">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Pin Code</label>
                                <input type="text" name="pincode" class="form-control" required
                                    placeholder="Enter your Pin Code">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="fw-bold">Address</label>
                                <textarea name="address" class="form-control" required rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h5>Order Details</h5>
                        <hr>
                        <?php
                        $cart_items = getCartItems();
                        $totalPrice = 0;
                        foreach ($cart_items as $item) {
                            ?>
                            <div class="mb-1 border">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="uploads/<?= $item['image']; ?>" alt="Image" width="50px">
                                    </div>
                                    <div class="col-md-5">
                                        <label>
                                            <?= $item['name'] ?>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <?= $item['selling_price'] ?>
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>x
                                            <?= $item['prod_qty'] ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $totalPrice += $item['selling_price'] * $item['prod_qty'];
                        }
                        ?>
                        <hr>
                        <h5>Total Price: <span class="float-end fw-bold">
                                <?= $totalPrice; ?>
                            </span></h5>
                        <div class="">
                            <input type="hidden" name="payment_mode" value="COD">
                            <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Confirm and Place Order |
                                COD</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>
 