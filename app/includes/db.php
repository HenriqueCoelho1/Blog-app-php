<?php
$db['db_host'] = 'db_blogpost';
$db['db_user'] = 'user';
$db['db_pass'] = '123456';
$db['db_name'] = 'db';

foreach($db as $key => $value){
    define(strtoupper($key), $value);

}
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(!$connection){
    die ("Data failed!");
}else{
    echo "We are connected!";
}