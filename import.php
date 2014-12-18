<?php

define('ID', 0);
define('MANUFACTURER_ID', 1);
define('TAX_CATEGORY_ID', 2);
define('SHIPPING_CATEGORY_ID', 3);
define('NAME', 4);
define('SLUG', 5);
define('SHORT_DESCRIPTION', 6);
define('DESCRIPTION', 7);
define('AVAILABLE_ON', 8);
define('CREATE_AT', 9);
define('UPDATE_AT', 10);
define('DELETE_AT', 11);
define('VARIANT_SELECTION_METHOD', 12);

$link = mysql_connect('localhost:8080', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';

$db = mysql_select_db('rubikin') or die('Could not select database');

if ($db) {
    $row = 1;
    $first_row = fopen("products.csv", "r");
    echo $first_row . '</br>';
    if (($handle = fopen("products.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            echo "<p> Insert fields in line $row: <br /></p>\n";
            $row++;
            $query = "INSERT INTO product VALUES('"
                .$data[ID]."', '".$data[MANUFACTURER_ID]."', '".$data[TAX_CATEGORY_ID]."', '".$data[SHIPPING_CATEGORY_ID]."','"
                .$data[NAME]."', '".$data[SLUG]."', '".$data[SHORT_DESCRIPTION]."', '".$data[DESCRIPTION]."','"
                .$data[AVAILABLE_ON]."', '".$data[CREATE_AT]."', '".$data[UPDATE_AT]."', '".$data[DELETE_AT]."','"
                .$data[VARIANT_SELECTION_METHOD]."')";
            mysql_query($query) or die(mysql_error());
        }
        fclose($handle);
    }
}

mysql_close($link);
