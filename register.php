<?php 
    session_start();
?>
<!-- register form-->
<body>
    <div>
        <div class="alert">
            <?php
                if(isset($_SESSION["status"])){
                    echo "<h4>" .$_SESSION["status"] . "</h4>";
                    unset($_SESSION["status"]);
                }
            ?>
        </div>
    </div>
    <div>
        <h5>Registration</h5>
        <form action="code.php" method="post">
        <label >name:</label><br>
        <input type="text" name="name"><br>
        <label >email:</label><br>
        <input type="text" name="email"><br>
        <label >password:</label><br>
        <input type="password" name="password"><br>
        <label >confirm password:</label><br>
        <input type="password" name="comfir_mpassword"><br>
        <input type="submit" name = "register_btn"value="Registration">
        </form>
    </div>
</body>