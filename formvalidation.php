
<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $subjectErr = $emailErr = $genderErr = $websiteErr =  ""; // erori za greshki
$name = $subject = $email = $gender = $comment = $website = "";// form data var

if ($_SERVER["REQUEST_METHOD"] == "POST") {  // dannite sha doidat kato post




    if (($_POST["name"])) { // empty e i 0 ne se hvashta
        $nameErr = "Ne se krii!!!";
    } else {
        $name = test_input($_POST["name"]);
    }




    if (empty($_POST["name"])) { // empty e i 0 ne se hvashta
        $nameErr = "Ne se krii!!!";
    } else {
        $name = test_input($_POST["name"]);
    }
    if (empty($_POST["subject"])) {
        $subjectErr = "pls fill it";
    } else {
        $subject = test_input($_POST["subject"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required!";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    Subject:<input type="text" name="subject">
    <span class="error">* <?php echo $subjectErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Website: <input type="text" name="website">
    <span class="error"><?php echo $websiteErr;?></span>
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $subject;
echo "<br>";
echo $email;
echo "<br>";
if (empty($website)) {
}
else {
    echo $website;
    echo "<br>";
}
if (empty($comment)) {
}
else {
    echo $comment;
    echo "<br>";
}
echo $gender;
?>

</body>
</html>