<?php
session_start();
require "connection.php";

$id = $_GET['id'];
// get id of the item value from the url **.php?id=
$item = getAllItems($id);
// $item is an associative array

function getAllItems($id)
{
        /* CONNECTION */
        $conn = connection();

        /* SQL */
        $sql = "SELECT * FROM items WHERE id = $id";

        /* EXECUTION */
        if ($result = $conn->query($sql)) {
            //success
            return $result->fetch_assoc();
        // return the all items with sections from database
        } else {
            //fail
            die("Error retrieving all sections: " . $conn->error);
            // error is a generic error string holder
        }
}
function updateItem($id,$item_name,$item_price,$quantity)
{
    /* CONNECTION */
    $conn = connection();

    /* SQL */
    $sql = "UPDATE `items` SET `item_name`='$item_name',`item_price`='$item_price',`quantity`='$quantity' WHERE id=$id";

    /* EXECUTION */
    if ($conn->query($sql)) {
        //success
        header("location: view-items.php");
        // go to view-items.php if the query is successful
        exit;
        // same as die()
    } else {
        //fail
        die("Error updateing the item: " . $conn->error);
        // error is a generic error string holder
    }
}
if (isset($_POST['btn_update'])) {
    $id = $_GET['id'];
    // get id of the item value from the url **.php?id=
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $quantity = $_POST['quantity'];
    updateItem($id,$item_name,$item_price,$quantity);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
                                    placeholder="Item Name" required autofocus value="<?= $item['item_name'] ?>">
                                <label for="item_name">Item Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="item_price" id="item_price"
                                    placeholder="Item Price" required value="<?= $item['item_price'] ?>">
                                <label for="item_price">Item Price</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="quantity" id="quantity"
                                    placeholder="Quantity" required value="<?= $item['quantity'] ?>">
                                <label for="quantity">Quantity</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="view-items.php" class="btn btn-outline-indigo w-100">Cancel</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" name="btn_update" class="btn btn-indigo w-100 fw-bold px-5">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>