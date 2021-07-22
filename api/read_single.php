<?php
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');


include_once('../core/initialize.php');


$post= new Post($db);


$post ->id= isset($_ę['id']) ? $_GET['id'] : die();
$post-> read_single();

$post_arr = array(
    'id'=> $post -> id,
    'category_id'=> $post -> category_id,
    'title'=> $post -> title,
    'price'=> $post -> price,
    'description'=> $post -> description,
    'category_name'=> $post -> category_name,

);
print_r(json_encode($post_arr));

?>