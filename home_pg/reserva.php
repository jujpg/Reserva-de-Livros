<?php
include("../conexao.php");

$livroId = isset($_GET['livroId']) ? $_GET['livroId'] : null;

if ($livroId) {
    $randomCode = rand(1000, 9999);

    // Insira o código, livroId, data e hora no banco de dados
    $sql = "INSERT INTO reservas (id_reserva, id_livro, data_reserva) VALUES ('$randomCode', '$livroId', NOW())";

    if ($conn->query($sql) === TRUE) {
        $response = array("randomCode" => $randomCode);
        echo json_encode($response);
    } else {
        echo "Erro ao registrar a reserva: " . $conn->error;
    }
} else {
    echo "ID do livro não especificado.";
}

$conn->close();
?>