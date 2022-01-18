<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Origin, content-Type, Accept');

include_once '../../models/Seller.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($seller->validate_params($_POST['name'])){
        $seller->name = $_POST['name'];
    }else{
        echo json_encode(array('success' => 0,'message' => 'Name is Required!'));
        die();
    }

    if($seller->validate_params($_POST['email'])){
        $seller->name = $_POST['email'];
    }else{
        echo json_encode(array('success' => 0,'message' => 'Email is Required!'));
        die();
    }

    if($seller->validate_params($_POST['password'])){
        $seller->name = $_POST['password'];
    }else{
        echo json_encode(array('success' => 0,'message' => 'Password is Required!'));
        die();
    }

    $seller_images_folder = '../../assetes/seller_images';



} else{

    die(header('HTTP/1.1 405 Request Method Not Allowed'));

} 