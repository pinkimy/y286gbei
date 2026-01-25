<!-- register form-->
<body>
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
</body>

<?php 
    echo "{$_POST["name"]} <br>";
    echo "{$_POST["password"]} <br>";
?>