<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>users</title>
    <style>
        form {
            width: 500px;
        }

        section {
            float: left;
        }
    </style>
</head>
<body>
<aside>
    <div>
        <p>Add a user</p>
        <form method="post" name="userForm" action="confirm-user.php">
            <label for="egn">EGN:</label><br>
            <input type="text" name="egn" id="egn"><br>
            <label for="fname">First name:</label><br>
            <input type="text" name="fname" id="fName"><br>
            <label for="family">Last name:</label><br>
            <input type="text" name="family" id="family"><br>
            <label for="city">City:</label><br>
            <input type="text" name="city" id="city"><br>
            <input type="submit" name="submit" value="Add User">
            <a href='#' onclick="self.location='search.php'">Search</a>
        </form>
    </div>
    <br><br><br><br>
</aside>


</body>
</html>

