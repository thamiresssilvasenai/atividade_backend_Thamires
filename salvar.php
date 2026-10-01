<?php
    include "config/conexao.php";
    //Post é uma variavel especial do PHP,recebe dados enviados
    //Pelo Formulário quando usamos o method="POST" do HTMl.
    $cliente = $_POST["cliente"];
    $equipamento = $_POST["equipamento"];
    $problema = $_POST["problema"];
    $data_entrada = $_POST["data_entrada"];
    $status = $_POST["status"];

    $sql = "INSERT INTO ordem_servico
            (cliente, equipamento, problema, data_entrada, status)
            values( ?, ?, ?, ?, ?)";
    //STATEMENT
    $stmt = $conexao->prepare($sql);
    
    $stmt->bind_param(
        "sssss",
        $cliente,
        $equipamento,
        $problema,
        $data_entrada,
        $status
    );

    if ($stmt->execute()){
        header("Location: index.php");
        exit;
    } else{
        echo "Erro ao cadastrar ordem de servico.";
    }
?>