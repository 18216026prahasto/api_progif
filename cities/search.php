<?php
    session_start();
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, 'cities');
        $city = $_GET['city'];
        if ($city == NULL) {
            $country = $_GET['country'];
            if ($country != NULL) {
                $query = mysqli_query($connection, "SELECT * FROM city WHERE country='$country'");
                $row = array();
                while ($r = mysqli_fetch_assoc($query)) {
                    $row[] = $r;
                }
                print json_encode($row);
            } else {
                $query = mysqli_query($connection, "SELECT * FROM city");
                $row = array();
                while ($r = mysqli_fetch_assoc($query)) {
                    $row[] = $r;
                }
                print json_encode($row);
            }
        } else {
            $query = mysqli_query($connection, "SELECT * FROM city WHERE name='$city'");
            $row = mysqli_fetch_assoc($query);
            print json_encode($row);
        }
        
?>