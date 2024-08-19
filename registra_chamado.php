<?php
    session_start();
    
    //montagem do texto
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;
    //abrindo aquivi
    $arquivo = fopen('arquivo.hd', 'a');

    
    //escrevendo o arquivo
    fwrite($arquivo, $texto);
    //fecha o arquivo
    fclose($arquivo);

    header('Location: abrir_chamado.php')

?>