<?php

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'encodeup_internship';

    //connect to a database
    $connect = mysqli_connect($host, $username, $password, $db);
    if(!$connect)//there is an error in the connection
        die('Connection Error');

    //write a query
    $sql = 'SELECT * FROM `users`';

    //execute the query
    $query = mysqli_query($connect, $sql);
    if(!$query)
        die('Query Error');

    //fetch result
    //(Use the result)
    while($rs = mysqli_fetch_assoc($query)){//while there is still a record
        echo $rs['name'] . '<br>';
    }

    //close the connection
    mysqli_close($connect);
