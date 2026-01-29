<?php 
    session_start();
?>
<!-- register form-->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
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
    <div class="background">
        <div class="container">
            <div class="screen">
                <div class="screen-header">
                    <div class="screen-header-left">
                        <div class="screen-header-button close"></div>
                            <div class="screen-header-button maximize"></div>
                            <div class="screen-header-button minimize"></div>
                        </div>
                            <div class="screen-header-right">
                            <div class="screen-header-ellipsis"></div>
                        <div class="screen-header-ellipsis"></div>
                    <div class="screen-header-ellipsis"></div>
                </div>
            </div>
                    <div class="screen-body">
                        <div class="screen-body-item left">
                        <div class="app-title">
                            <span>Registration</span>
                        </div>
                        <div class="screen-body-item">  
                            <form action="code.php" method="post">
                                <div class="app-form">
                                    <div class="app-form-group">
                                        <label >name:</label>
                                        <input class="app-form-control" type="text" name="name">
                                        <label >email:</label>
                                        <input class="app-form-control" type="text" name="email">
                                        <label >password:</label>
                                        <input class="app-form-control" type="password" name="password">
                                        <label >confirm password:</label>
                                        <input class="app-form-control" type="password" name="comfir_mpassword">
                                        <div class="app-form-group buttons">
                                            <input class="app-form-button" type="submit" name = "register_btn"value="Registration">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="credits">github.com/pinkimy
            </div>
</body>
</html>