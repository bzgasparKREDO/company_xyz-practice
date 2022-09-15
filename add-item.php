<?php
session_start();
require "connection.php";

function addProduct($item_name,$item_price,$quantity){
    
    /* CONNECTION */
    $conn = connection();

    /* SQL */
    $sql = "INSERT INTO `items` (`item_name`,`item_price`,`quantity`)VALUES('$item_name','$item_price','$quantity')";

    /* EXECUTION */
    if ($conn->query($sql)) {
        //success
        header("location: view-items.php");
        // go to view-items.php if the query is successful
        exit;
        // same as die()
    } else {
        //fail
        die("Error inserting the product: " . $conn->error);
        // error is a generic error string holder
    }
}
    //collect data from the form
    if (isset($_POST['btn_add'])) {
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $quantity = $_POST['quantity'];
        addProduct($item_name,$item_price,$quantity);
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Items</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<?php
    include 'navbar.php' 
    ?>
    <main class="container">
        <div class="card w-50 mx-auto my-auto p-0">
            <div class="card-header">
                <div class="col">
                    <h2 class="fw-light mb-3">Add Items</h2>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-shop"></i></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="item_name" id="item_name"
                                    placeholder="Item Name" required autofocus>
                                <label for="item_name">Item Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="item_price" id="item_price"
                                    placeholder="Item Price" required autofocus>
                                <label for="item_price">Item Price</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="quantity" id="quantity"
                                    placeholder="Quantity" required autofocus>
                                <label for="quantity">Quantity</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="view-items.php" class="btn btn-outline-indigo w-100">Cancel</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" name="btn_add" class="btn btn-indigo w-100 fw-bold px-5">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>