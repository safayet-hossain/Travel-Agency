<?php
    include("partials/header.php");
    include("partials/modal.php");
?>

<div class="main-content">
        <h1>Register as manager</h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="username">Username :</label></td>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td><label for="email">Email :</label></td>
                    <td><input type="text" name="email" id="email"></td>
                </tr>
                <tr>
                    <td><label for="password">Password :</label></td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td><label for="gender">Gender :</label></td>
                    <td>
                        <select name="gender" id="gender" class="gender">
                            <option value="" disabled selected>Select Gender Below</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="birthday">Birthday :</label></td>
                    <td><input type="date" id="birthday" name="birthday" class="gender"></td>
                </tr>
                <tr>
                    <td><label for="address">Address :</label></td>
                    <td><input type="text" name="address" id="address"></td>
                </tr>
                <tr>
                    <td><label for="contact">Contact :</label></td>
                    <td><input type="number" name="contact" id="contact"></td>
                </tr>
            </table>  
        </form>
        <button class="btn" onclick="registrationValidator()">Register</button>
        <a href="home.php"><button class="btn">Go Back</button></a>
</div>


<?php include("partials/footer.php"); ?>
    
