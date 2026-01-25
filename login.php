<!-- register form-->
<body>
    <form action="code.php" method="post">
    <label >email:</label><br>
    <input type="text" name="email"><br>
    <label >password:</label><br>
    <input type="password" name="password"><br>
    <input type="submit" value="Log in">
    </form>
</body>

<?php 
    echo "{$_POST["name"]} <br>";
    echo "{$_POST["password"]} <br>";
?>