<?php 

require "connection.php";

function addUser($first_name,$last_name,$username,$password){
        /* CONNECTION */
        $conn = connection();
    
        /* SQL */
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`,`password`)VALUES('$username','$password')";
        /* EXECUTION */
    if ($conn->query($sql)) {
        //success
        header("location: sign-in.php");
        // go to sign-in.php if the query is successful
        exit;
        // same as die()
    } else {
        //fail
        die("Error inserting the product: " . $conn->error);
        // error is a generic error string holder
    }
    }
if(isset($_POST['btn_sign_up'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password == $confirm_password){
        addUser($first_name,$last_name,$username,$password);
    }else{
        echo "<p class='alert alert-danger'>Password and Confirm Password do not match</p>";
    }
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
</head>

<body>
    <div style="height:100vh;">
        <div class="row h-100 m-0">
            <div class="card w-50 mx-auto my-auto p-0">
                <div class="card-header">
                    Create Your Account
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="username" id="username"
                                        placeholder="Username" required autofocus>
                                    <label for="username">Username</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-unlock-keyhole"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                                        placeholder="Confirm Password" required>
                                    <label for="confirm_password">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="btn_sign_up" class="btn btn-primary w-100">Register</button>
                    </form>
                    <div class="text-center mt-3">
                        <p class="small">Already have an account? <a href="sign-in.php">Sign in.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>