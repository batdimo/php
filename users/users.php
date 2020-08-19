<?php
require_once('config.inc.php');

class users {
    private $conn;

    function  __construct() {
        // connect to DB server
        $this->conn = mysqli_connect(DBSERVER, DBUSER, DBPASSWORD);
        // select the correct database that we are going to use
        mysqli_select_db($this->conn, DBNAME) or die(
            'Error select DB '.DBNAME.' '.mysqli_error($this->conn));
    }

    function adduser($egn, $fname, $family, $city) {
        $query = "INSERT INTO users(egn, fname, family, city ) VALUES ('$egn','$fname','$family','$city');";

        mysqli_query($this->conn, $query) or die(
            'Error insert into DB.<br /> Query: '.$query.'<br /> Error: '.mysqli_error($this->conn). '<br />' );
    }
    function searchByEgn($egn){
        $sQuery = 'SELECT * FROM users WHERE `egn` LIKE "%'.$egn.'%"';
        $iDBres = mysqli_query($this->conn, $sQuery) or die(
            'Error select from DB.<br /> Query: '.$sQuery.'<br /> Error: '.mysqli_error($this->conn). '<br />' );
        while ($row = mysqli_fetch_assoc($iDBres)) {
            var_dump($row);
            die;
        }
        mysqli_free_result($iDBres);
    }
    function printAllusers() {
        $query = "SELECT * FROM users where egn LIKE  '%elm%'";
         $result = mysqli_query($this->conn, $query) or die(
            'Error select from DB.<br /> Query: '.$query.'<br /> Error: '.mysqli_error($this->conn). '<br />' );
        $usersCount = mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($result)) {
            print "<pre>";
            print_r($row);
            print "</pre>";
        }
        echo "<br /><b>Total number of users: $usersCount</b>";
        mysqli_free_result($result);
    }

    function closeConnection() {
        mysqli_close($this->conn);
    }

}
// www.unisvyat.com
