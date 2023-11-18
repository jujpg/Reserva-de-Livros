<?php
include("../conexao.php");

$titulo = "%".trim($_GET['tit_livro'])."%";
$sql = 'SELECT id_livro, titulo, capa FROM livros WHERE titulo LIKE ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $titulo);
$stmt->execute();
$resultados = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" href="../logo.png" type="image/icon type">
<title>Página Inicial</title>
<link rel="stylesheet" href="homepg.css" type="text/css">
</head>
<body>
  <ul class="menu">
    <li>
      <a href="pagina_inicial.html"><img src="../biblioteca.png" title="Home - Biblioteca Virtual" width="140px" alt="imagem1" class="imagem1" /></a>
    </li>
    <li><a href="pagina_inicial.html">PÁGINA INICIAL</a></li>
    <li><a href="sobre.html">BIBLIOTECA</a></li>
    <li><a href="quemsomos.html">QUEM SOMOS</a></li>
    <div id="divBusca">
      <form action="busca.php">
        <input type="text" name="tit_livro" class="search" placeholder="Pesquisar..." required />
    </form>
</div>
</ul>
<br>
<br>
    <h1>Resultado de Busca</h1>
    <section class="grid1">
  <?php
if ($resultados->num_rows > 0) {
      while ($row = $resultados->fetch_assoc()) {
        echo '<div class="pipi">
        <a href="paginalivro.php?id=' . $row['id_livro'] . '">
        <img src="livros/' . $row['capa'] . '" alt="Capa do Livro" width="180" height="280">
        <p>'. $row['titulo'] . '</p>
        </a>
        </div>';
      }
    } else {
      echo "Nenhum livro encontrado com o título: " . $row['titulo'];
    }
  
    $stmt->close();
    $conn->close();
    ?>
</section>
</body>
</html>
