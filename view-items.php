<?php
session_start();
require "connection.php";

function getAllItems()
{
    /* CONNECTION */
    $conn = connection();

    /* SQL */
    $sql = "SELECT * FROM items";

    /* EXECUTION */
    if ($result = $conn->query($sql)) {
        //success
        return $result;
    // return the all products with sections from database
    } else {
        //fail
        die("Error retrieving all sections: " . $conn->error);
        // error is a generic error string holder
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
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
        <div class="card">
            <div class="card-header">
                <div class="row mb-4">
                    <div class="col">
                        <h2 class="fw-light mb-3">Items</h2>
                    </div>
                    <div class="col text-end">
                        <a href="add-item.php" class="btn btn-indigo"><i class="fa-solid fa-plus"></i> New
                            Item</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover align-middle border">
                    <thead class="small bg-indigo">
                        <tr>
                            <th>ID</th>
                            <th>ITEM</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th style="width: 100px;"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $all_itemss = getAllItems();
                            while ($items = $all_itemss->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?=$items['id'] ?> </td>
                            <td><?=$items['item_name'] ?> </td>
                            <td><?=$items['item_price'] ?> </td>
                            <td><?=$items['quantity'] ?> </td>
                            <td>
                                <a href="edit-item.php?id=<?=$items['id'] ?>" class="btn btn-outline-secondary btn-sm">
                                    <i class="fa-solid fa-pencil-alt"></i>
                                </a>
                                <a href="delete-item.php?id=<?=$items['id'] ?>" class="btn btn-outline-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>