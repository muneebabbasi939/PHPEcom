$(document).ready(function () {

    // for increment btn in product-view
    $(document).on('click','.increment-btn',function(e){
    // $('.increment-btn').click(function (e) {
        e.preventDefault();

        // var qty = $('.input-qty').val();
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        // alert(qty);
        var value = parseInt(qty, 10);
        value = isNaN(value) ? '0' : value;
        if (value < 10) {
            value++;
            var qty = $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    // for decrement btn in product-view
    $(document).on('click','.decrement-btn',function(e){
    // $('.decrement-btn').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? '0' : value;
        if (value > 1) {
            value--;
            var qty = $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    $(document).on('click','.addToCartBtn',function(e){
    // $('.addToCartBtn').click(function(e){
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();
        // alert(prod_id);
        $.ajax({
            method:'POST',
            url:'functions/handleCart.php',
            data:{
                "prod_id":prod_id,
                "prod_qty":qty,
                "scope":"add"
            },
            success:function(response){
                if(response == 201){
                    alertify.success("Product Added To Cart Successfully");
                }
                else if(response == "existing"){
                    alertify.success("Product Already In Cart");
                }
                else if(response == 401){
                    alertify.success("Login To Continue");
                }
                else if(response == 500){
                    alertify.success("Something Went Wrong");
                }
            }
        });
    });


    // update QTY button in cart
    $(document).on('click','.updateQty',function(){
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).closest('.product_data').find('.prodId').val();
        // var prod_id = $(this).val();
        // alert(qty);
        $.ajax({
            method:'POST',
            url:'functions/handleCart.php',
            data:{
                "prod_id":prod_id,
                "prod_qty":qty,
                "scope":"update"
            },
            success:function(response){
                // alert(response);
            }
        });
    });

    // delete item from cart
    $(document).on('click','.deleteItem',function(){
        var cart_id = $(this).val();
        // alert(cart_id);
        $.ajax({
            method:'POST',
            url:'functions/handleCart.php',
            data:{
                "cart_id":cart_id,
                "scope":"delete"
            },
            success:function(response){
                if(response == 200){
                    alertify.success("Item Deleted Successfully");
                    $('#myCart').load(location.href + " #myCart");
                }else{
                    alertify.success(response);
                }
            }
        });
    });
});