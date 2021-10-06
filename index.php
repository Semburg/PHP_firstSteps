<?php

$connection = mysqli_connect('127.0.0.1', 'root', '', 'test_db');

if ($connection == false) {
    echo 'Connection failed!</br>';
    echo mysqli_connect_error();
    exit();
} 
    
echo 'Connection to DB created</br><hr>';

$result = mysqli_query($connection, "SELECT * FROM `article_categories`");

// echo $result; // does not work!!

// $r1 = mysqli_fetch_assoc($result);
// $r2 = mysqli_fetch_assoc($result);
// $r3 = mysqli_fetch_assoc($result);
// $r4 = mysqli_fetch_assoc($result);
// echo $r1;
// echo '<br>';
// print_r($r1);
// echo '<br>';
// print_r($r2);
// echo '<br>';
// print_r($r3);
// echo '<br>';
// print_r($r4);

// while (($record = mysqli_fetch_assoc($result)))
// {
//     print_r($record);
//     echo '<hr>';
// }



?>

<ul>
    <?php
        
        while( $cat = mysqli_fetch_assoc($result))
        {
            echo '<li>' . $cat['title'] . '</li>';
        }
        
    ?>
</ul>


<?php
    mysqli_close($connection);
?>

