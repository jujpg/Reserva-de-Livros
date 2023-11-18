<?php
include("../conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = $_POST['titulo'];
  $autor = $_POST['autor'];
  $editora = $_POST['editora'];
  $ano_publicacao = $_POST['ano_publicacao'];
  $categoria = $_POST['categoria'];
  $sinopse = $_POST['sinopse'];
  $capa = $_POST['capa'];

  // Use declaração preparada
  $sql = "INSERT INTO livros (titulo, autor, editora, ano_publicacao, categoria, sinopse, capa) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  
  if ($stmt) {
    $stmt->bind_param("sssssss", $titulo, $autor, $editora, $ano_publicacao, $categoria, $sinopse, $capa);
    
    if ($stmt->execute()) {
      echo "Livro cadastrado com sucesso!";
    } else {
      echo "Erro ao cadastrar livro: " . $stmt->error;
    }
    
    $stmt->close();
  } else {
    echo "Erro na preparação da declaração: " . $conn->error;
  }
} else {
  echo "Método de solicitação inválido.";
}

header('Location: http://localhost/Biblioteca%20Virtual/admin/cad_bk.html');
    exit;
?>
