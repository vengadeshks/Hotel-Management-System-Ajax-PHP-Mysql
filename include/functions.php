<?php
session_start();
include('dbConnect.php');


//generate id for all the table in data base
function generateId($prefix,$table,$id,$con){
    $query = "select * FROM  $table  order by $id desc limit 1";
    $result = mysqli_query($con,$query) or die("can't select");

    $last_row = mysqli_fetch_assoc($result);
    $last_id = $last_row[$id];

        if($last_id==" "){
            $new_id = 1;
        }else{
           
            $new_id = intval($last_id);
            //$new_id = $prefix .($new_id+1);
        }
    return $new_id;
}

//showing message (through get method)
function message($url, $message)
{
    header("Location: $url?msg=" . $message);
}
//showing error message (through get method)
function error($url, $err)
{
    header("Location: $url?error=" . $err);
}


?>