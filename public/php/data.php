<?php
    if ( isset($_POST['name']) ) {

        $name = $_POST['name'];
        mysql_connect('localhost', 'root', 'bernoud');
        mysql_select_db('GeoRapport');
        $data = " SELECT * FROM `users` WHERE `firstname` = '$name%' OR `lastname` = '$name%'";
        $query = mysql_query($data);

        while($row = mysql_fetch_array($query)){
            echo "<p>".$row['name']."</p>";
        }
    }
?>