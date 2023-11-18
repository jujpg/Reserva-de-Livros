<?php
include("../conexao.php");

$categoria = "Infantil"; 

$sql = 'SELECT id_livro, titulo, capa FROM livros WHERE categoria LIKE ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $categoria);
$stmt->execute();
$resultados = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" href="../logo.png" type="image/icon type">
<link rel="stylesheet" href="homepg.css" type="text/css">
<title>Página Inicial</title>
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
      <br/>
      <br/>
      <br/>
    <div class="carousel">
      <div class="icons-container">
        <div class="icon">
          <a href="maisprocurados.php">
          <img src="maisprocurados.png" alt="Ícone 1" />
          </a>
    </div>
      <div class="icon">
        <a href="fantasia.php">
        <img src="fantasia.png" alt="Ícone 2" />
        </a>
      </div>
    <div class="icon">
      <a href="infantil.php">
      <img src="infantil.png" alt="Ícone 3" />
      </a>
    </div>
    <div class="icon">
      <a href="romance.php">
      <img src="romance.png" alt="Ícone 4" />
      </a>
    </div>
    <div class="icon">
      <a href="didatico.php">
      <img src="didatico.png" alt="Ícone 5" />
      </a>
    </div>
    <div class="icon">
      <a href="misterio.php">
      <img src="misterio.png" alt="Ícone 6" />
      </a>
    </div>
    <div class="icon">
      <a href="todososlivros.php">
      <img src="todoslivros.png" alt="Ícone 7" />
      </a>
    </div>
  </div>
</div>
<br>
<br>
<h1>
  VOCÊ ESTÁ NO GÊNERO: INFANTIL!
</h1>
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
      echo "Nenhum livro encontrado na categoria";
    }
  
    $stmt->close();
    $conn->close();
    ?>
</section>
    <footer>
    <div class="footerContainer">
      <div class="footerNav">
        <ul>
          <li><a href="pagina_inicial.html">Página Inicial</a></li>
          <li><a href="sobre.html">Sobre a Biblioteca</a></li>
          <li><a href="quemsomos.html">Quem Somos</a></li>
          <li><a href="https://www.instagram.com/reservadelivrosdafito/">Siga-nos no Instagram</a></li>
        </ul>
        </div>
        </div>
      </div>
      <div class="footerBottom">
        <p>Contato: 3652-3074 / Endereço: Rua Camélia, 26</p>
        <br/>
        <p>Copyright &copy;2023; Designed by <span class="designer">Equipe Gama</span></p>
      </div>
    </div>
  </footer>
</body>
</html>
