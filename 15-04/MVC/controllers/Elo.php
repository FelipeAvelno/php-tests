<?php
    require_once('../models/Usuario.php');

    $json = file_get_contents('php://input');
    $rb = json_decode($json);

    $user_infos = $rb->values;
    $name = $user_infos[0];
    $password = $user_infos[1];

    $new_user = new Usuario();
    $new_user->set_nome($name);    
    $new_user->set_senha($password);

    $view_request_name = $new_user->get_nome();
    $view_request_password = $new_user->get_senha();

    echo(json_encode($user_infos));
?>