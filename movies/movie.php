<?php
require_once('config.inc.php');

class Movie {
    private $oConn;

    function __construct()
    {
        // Connect to database server.
        $this->oConn = mysqli_connect(DBSERVER, DBUSER, DBPASSWORD);
        // Select the correct database that we are going to use.
        mysqli_select_db($this->oConn, DBNAME) or die(
            'Error select DB  ' . DBNAME . ' ' . mysqli_error($this->oConn)
        );
    }

    function addMovie($title, $directorId)
    {
        $query = "INSERT INTO movies(title, directorId) VALUES('$title','$directorId')";

        mysqli_query($this->oConn, $query)
        or die ('Error insert into DB.<br /> Query: '.$query.
            '<br />Error:'.mysqli_error($this->oConn).'<br />');
    }


    function addDirector($fName, $lName)
    {
        $query = "INSERT INTO director(fName, lName) VALUES('$fName','$lName')";

        mysqli_query($this->oConn, $query)
        or die ('Error insert into DB.<br /> Query: '.$query.
            '<br />Error:'.mysqli_error($this->oConn).'<br />');
    }

    function printAllMovies()
    {
        $query = "SELECT * FROM movies";
        // $dbResult holds the information coming from DB.
        $dbResult = mysqli_query($this->oConn, $query)
        or die ('Error select from DB.<br /> Query: '.$query.
            '<br />Error:'.mysqli_error($this->oConn).'<br />');
        // How many results do we have from the DB.
        $moviesCount = mysqli_num_rows($dbResult);

        print '<pre>';
        while ($row = mysqli_fetch_assoc($dbResult))
        {
            print_r($row);
        }
        echo "<b>Total number of movies: $moviesCount</b>";
        mysqli_free_result($dbResult);
    }

    function printAllDirectors()
    {
        $query = "SELECT * FROM director";
        // $dbResult holds the information coming from DB.
        $dbResult = mysqli_query($this->oConn, $query)
        or die ('Error select from DB.<br /> Query: '.$query.
            '<br />Error:'.mysqli_error($this->oConn).'<br />');
        // How many results do we have from the DB.
        $directorCount = mysqli_num_rows($dbResult);


        while ($row = mysqli_fetch_assoc($dbResult))
        {
            $currentRow = "<tr>";
            $currentRow .= "<td>" . $row['id'] . "</td>";
            $currentRow .= "<td>" . $row['fName'] . "</td>";
            $currentRow .= "<td>" . $row['lName'] . "</td>";
            $currentRow .= "</tr>";

            echo $currentRow;
        }


        echo "<b>Total number of directors: $directorCount</b>";
        mysqli_free_result($dbResult);
    }
}
