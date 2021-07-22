<?php

header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Alloe-Methods, Authorization,X-Requested-With');



include_once('../core/initialize.php');


$post= new Post($db);

$data =json_decode(file_get_contents("php://input"));

$post->title = $data->title;
$post->category_id = $data->category_id;
$post->price = $data->price;
$post->description = $data->description;

if($post->create()){
    echo json_encode(
        array('message' => 'Vytvořeno.')
    );
}else{
    echo json_encode(
        array('message' => 'Nevytvořeno.')
    );
}




?>
