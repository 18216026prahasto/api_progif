<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'cities');
    if (isset($_SESSION['login_user'])) {
        if (!isset($_GET['city'])) {
            if (isset($_GET['country'])) {
                $country = $_GET['country'];
                $query = mysqli_query($connection, "SELECT * FROM city WHERE country='$country'");
                $row = array();
                while ($r = mysqli_fetch_assoc($query)) {
                    $row[] = $r;
                }
                if (json_encode($row) != '[]') {
                    print json_encode($row);
                } else {
                    http_response_code(404);
                }
            } else {
                $query = mysqli_query($connection, "SELECT * FROM city");
                $row = array();
                while ($r = mysqli_fetch_assoc($query)) {
                    $row[] = $r;
                }
                print json_encode($row);
            }
        } else {
            $city = $_GET['city'];
            $query = mysqli_query($connection, "SELECT * FROM city WHERE name='$city'");
            $row = mysqli_fetch_assoc($query);
            if (json_encode($row) != 'null') {
                print json_encode($row);
            } else {
                http_response_code(404);
            }
        }
    } else {
        http_response_code(401);
    }
?>