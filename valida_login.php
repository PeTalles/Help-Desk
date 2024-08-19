<?php

    session_start();

    

    //variavel verifica a autenticação do usuario
    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(1=>'Administrativo', 2=>'Usuario' );

    //Usuarios do sistema
    $usuarios_app = array(
        array('id'=> 1,'email'=>'teste@adm.com','senha' => '123456', 'perfil_id' =>1),
        array('id'=> 2,'email'=>'usuario@adm.com','senha' => '123456', 'perfil_id' =>1),
        array('id'=> 3,'email'=>'usuario@adm.com','senha' => '123456', 'perfil_id' =>2),
        array('id'=> 4,'email'=>'jose@adm.com','senha' => '123456', 'perfil_id' =>2),
    );
    
    // echo'<pre/>';
    //print_r($usuarios_app);

    foreach($usuarios_app as $user){

       if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_autenticado = true; 
        $usuario_id=$user['id'];
        $usuario_perfil_id = $user['perfil_id'];
       }

        echo '<br>';
    }

    if($usuario_autenticado){
        echo 'Autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
    }

    
    /*print_r($_POST);
    echo'<br/>';

    echo $_POST['email'];
    echo'<br/>';
    echo $_POST['senha'];*/
?>