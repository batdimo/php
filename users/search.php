

<?php
require_once ("users.php");
if(isset($_GET['searchKey'])){
    $rf = new users();
    $egn = $_GET['searchKey'];
    $rf->searchByEgn($egn);
}

?>
<form method="get"  action="search.php">
    <label for="searchKey">search EGN</label><br>
    <input type="text" name="searchKey" id="searchKey"><br>
    <button type="submit">search</button>
</form>