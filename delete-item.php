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
    $sql = "SELECT * FROM items WHERE id=$id";

    /* EXECUTION */
    if ($result = $conn->query($sql)) {
        //success
            return $result->fetch_assoc();
    // return the all items with sections from database
    } else {
        //fail
        die("Error retrieving item: " . $conn->error);
        // error is a generic error string holder
    }
}
function deleteItem($id)
{
    /* CONNECTION */
    $conn = connection();

    /* SQL */
    $sql = "DELETE FROM items WHERE id =$id";

    /* EXECUTION */
    if ($conn->query($sql)) {
        //success
        header("location: view-items.php");
        // go to items.php if the query is successful
    // return the delete the sections from database
    } else {
        //fail
        die("Error deleting section: " . $conn->error);
        // error is a generic error string holder
    }
}
if(isset($_POST['btn_delete'])){
    $id = $_GET['id'];
    // get id of the item value from the url **.php?id=
    deleteItem($id);
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
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="text-center mb-4">
                    <i class="fa-solid fa-triangle-exclamation text-warning" style="font-size:150px;"></i>
                    <h2 class="fw-light mb-3 text-danger">Delete item</h2>
                    <p class="mb-0">Are you sure you want to delete " <span class="fw-bold"><?= $item['item_name'] ?></span> "?</p>
                </div>
                <div class="row">
                    <div class="col-6">
                        <a href="view-items.php" class="btn btn-outline-indigo w-100">Cancel</a>
                    </div>
                    <div class="col-6">
                        <form action="" method="post">
                            <button type="submit" class="btn btn-indigo w-100"
                                name="btn_delete">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>