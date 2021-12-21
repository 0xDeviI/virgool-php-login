<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virgool</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div id="form">

        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <input type="submit" onclick="login();" value="Login">
    </div>
    <script>
        function login(){
            var username = $('#username').val();
            var password = $('#password').val();
            $.ajax({
                url: 'http://localhost/virgool/api.php',
                type: 'POST',
                data: {
                    username: username,
                    password: password
                },
                success: function(data){
                    if (data.status === 'success') {
                        $('#form').hide();
                        document.write('<h1>' + data.message + '</h1>');
                    } else {
                        alert('Login failed');
                    }
                }
            });
        }
    </script>
    <?php
        if (isset($_SESSION["username"])) {
            echo '<script>
            $("#form").hide();
            document.write("<h1>Hello ' . $_SESSION["username"] . '</h1>");
            </script>';
        }
        else{
            echo '<script>
            $("#form").show();
            alert("Please login");
            </script>';
        }
    ?>
</body>

</html>