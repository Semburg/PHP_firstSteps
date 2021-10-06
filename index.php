<?php

$connection = mysqli_connect('127.0.0.1', 'root', '', 'test_db');

if ($connection == false) {
    echo 'Connection failed!</br>';
    echo mysqli_connect_error();
    exit();
} 
    
echo 'Connection to DB created</br><hr>';


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

// DATEs

echo date("d.m.Y") . '</br>';
echo date("d.m.Y H:i:s") . '</br>'; // hour wrong
date_default_timezone_set('Europe/Berlin');
echo date("l, jS \of F Y H:i:s") . '</br>'; // hour correct


echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2022));
echo '<br><hr>';

// timestamp   UNIX time - 1970.1.1    like a date ms in js
echo 'timestamps:<br><br>';
echo time() . '</br>';

$start_date = '2021-10-09 11:02:00';
$start_date_stamp = strtotime($start_date);
echo $start_date_stamp . '</br>';
echo 'DIFFERENCE: <br>';
echo time() - $start_date_stamp . ' seconds' . '</br>';

$diff = time() - $start_date_stamp;

echo 'Difference in days: ' . floor($diff/60/60/24) . '</br>';

echo '<br><hr>';


// FOMRS






$result = mysqli_query($connection, "SELECT * FROM `article_categories`");

if( mysqli_num_rows($result) == 0 )
{
    echo 'no categories';
} else 
{?>
    <ul>
    <?php
        
        while( $cat = mysqli_fetch_assoc($result))
        {
            $articles_count = mysqli_query($connection, "SELECT COUNT(id) AS `total_count` FROM `articles` WHERE `categorie_id` =" . $cat["id"]);
            $articles_count_result = mysqli_fetch_assoc($articles_count);
            // print_r($articles_count_result);
            echo '<li>' . $cat['title'] . '(' . $articles_count_result['total_count'] . ')</li>';
        }
        
    ?>
    </ul>
<?php
}

?>




<?php
    mysqli_close($connection);
?>

<!-- // FORMS -->

<?php
    include('includes/db.php');;
?>


</br>
<hr>
<hr>
<h4>Forms</h4>

<form method='POST' action="handle.php">
    <input type="text" placeholder='Login' name='login'>
    <input type="text" placeholder='Password' name='password'>
    <br>
    <input type="submit" value='send'>
</form>

