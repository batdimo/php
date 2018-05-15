<?php
$nameErr = '';
//https://gender-api.com/en/account/overview#my-api-key
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name   is required";
    } else {
        $nameValue = test_input($_POST['name']);
        $ch = curl_init();
        $query = http_build_query([
            'key' => 'CesfsanefbubcEqcUk',
            'name' => $nameValue,
        ]);
        //http://api.funtranslations.com/translate/minion.json
        curl_setopt($ch, CURLOPT_URL, "https://gender-api.com/get?$query");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response, true);
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<h2>Guess gender by name</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Search*: <input type="text" name="name" />
    <span class="error"><?php echo $nameErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>
<?php if (!empty($response)):?>
    <div>
        <p><b>Name</b>: <?php echo $response['name_sanitized']; ?></p>
        <p><b>Gender</b>: <?php echo $response['gender']; ?></p>
        <p><b>Accuracy</b>: <?php echo $response['accuracy']; ?></p>
        <p><b>Duration</b>: <?php echo $response['duration']; ?></p>
    </div>
<?php endif; ?>
</body>
</html>