<?php
    include("partials/header.php");
    include("partials/modal.php");

    if(isset($_COOKIE["signed-in"])){
        session_start();
        $_SESSION["Manager_id"] = $_COOKIE["signed-in"];
        header("location:dashboard.php");
    }

?>
    <div class="main-content">
        <h1>Login as manager</h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="text" name="email" id="email"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
            </table>  
        </form>
        <button class="btn" onclick="loginValidator()">Login</button>
        <a href="register.php"><button class="btn">Register</button></a>
        <a href="../../"><button class="btn">Go Back</button></a>
        
    </div>

<?php include("partials/footer.php"); ?>