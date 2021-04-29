<?php
    $username = $_POST['username'];
    $token = $_POST['token'];
    $type = $_POST['type'];
    if($type == "set"){
        setcookie("username", $username);
        setcookie("token", $token);
        $data  = ['msg' => 'success set cookie'];
        echo json_encode($data);
    }elseif($type == "remove"){
        setcookie("username");
        setcookie("token");
        $data  = ['msg' => 'success remove cookie'];
        echo json_encode($data);
    }
?>