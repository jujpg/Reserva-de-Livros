<?php
include("../conexao.php");

// Verifica se o parâmetro 'id' foi passado na URL
if (isset($_GET['id'])) {
    $livro_id = $_GET['id'];
    
    // Consulta o banco de dados para obter informações do livro com base no ID
    $sql = 'SELECT titulo, autor, capa, sinopse FROM livros WHERE id_livro = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $livro_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $livro = $result->fetch_assoc();
    } else {
        // Livro não encontrado, redireciona para uma página de erro ou outra ação
        header('Location: pagina_de_erro.php');
        exit();
    }
} else {
    // ID não foi fornecido, redireciona para uma página de erro ou outra ação
    header('Location: pagina_de_erro.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" href="../logo.png" type="image/icon type">
<title><?php echo $livro['titulo']; ?></title>
<style>
* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}

body {
  background-color: rgba(40, 4, 199, 0.856);
  font-family: Arial, Helvetica, sans-serif;
}
  
.menu {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px;
}

footer {
    background-color: rgba(40, 4, 199, 0.856);
    opacity: 0.7;
    font-family: Arial, Helvetica, sans-serif;
  }
  
  .footerContainer{
    width: 100%;
    padding: 10px 10px 10px;
  }
  
  .footerNav{
    margin: 10px 0;
  }
  
  .footerNav ul{
    display: flex;
    justify-content: center;
    list-style-type: none;
  }
  
  .footerNav ul li a{
    color: white;
    margin:30px;
    text-decoration:none;
    font-size: 1.1em;
    opacity: 1;
    transition:0.5s;
  }
  
  .footerNav ul li a:hover{
    opacity: 1; 
    color: rgb(123, 131, 241);
  }
  
  .footerBottom{
    background-color: rgba(40, 4, 199, 0.856);
    opacity: 0.7;
    padding: 10px;
    text-align: center;
  }
  
  .footerBottom p{
    color:white;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 1.1em;
  }

.imagem1 {
  float: left;
  text-align: center;
  color: rgba(40, 4, 199, 0.856);
  position: absolute;
  top: 10px;
  left: 30px;
}

.menu li {
  display: flex;
}


.menu li::after{
  content: " ";
  width: 0%;
  height: 4px;
  background-color: red;
  position: absolute;
  top: 13%;
  left: 60;
  transition: 0.5s ease-in-out;
} 

.menu li:hover::after{
  width: 18%;
}

.menu li a {
  display: flex;
  color: rgba(40, 4, 199, 0.856);
  text-align: center;
  padding: 16px;
  text-decoration: none;
  list-style-type: none;
  display: inline-block;
  margin-left: 18px;
  font-size: 18px;
  height: 100%;
  width: 200px;
  margin-top: 1em;
  font-family: Arial, Helvetica, sans-serif;
}

.menu li:not(:nth-child(1)) a:hover{
  content: " ";
}

#search {
  border-radius: 20px 20px 20px 20px;
  background-color: rgba(40, 4, 199, 0.856);
  padding-left: 10px;
  font-style: arial;
  font-size: 18px;
  border: none;
  height: 32px;
  width: 260px;
  color: aliceblue;
  margin: 30px;
  justify-content: right;
  align-items: right;
  text-decoration: none;
  right: 10px;
}

.container { 
  justify-content: space-between;
  padding-top: 1%;
  display: flex;
}
  
.content {
    color: white;
    margin-left: 30px;
    margin-top: 15px;
    text-align: justify;
    width: calc(100% - 80px);
    padding: 20px;
    padding-top: 7px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 18px;
  }
  
  
  .esquerda {
    text-align: center;
    padding: 20px;
    border-radius: 20px;
    margin-left: 25px;
    color: white;
  }
  
  .direita {
    width: 350px;
    background-color: white;
    margin-right: 50px;
    height: 380px;
    right: 8px;
    color: rgba(40, 4, 199, 0.856);
    border-radius: 10px;
    font-family: Arial;
  }
  
  #gerarNumero {
    font-size: 18px;
    font-family: sans-serif;
    font-weight: bolder;
    color: rgba(40, 4, 199, 0.856);
    background-color: rgb(241, 52, 19);
    border-radius: 25px;
    border-color: rgb(241, 52, 19);
    height: 35px;
    width: 100px;
    /*posição fixa do botão 
    right: 950px;
    bottom: 200px;
    position: absolute; */
  }
  
  .resumo {
    width: 750px;
    font-size: larger;
    font-family: Arial, Helvetica, sans-serif;
    margin-top: 20px;
  }
  
  .nome-livro {
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif;
    margin-top: 10px;
  }
  
  .autor-livro {
    font-size: 14px;
    font-family: Arial, Helvetica, sans-serif;
    margin-top: 5px;
  }
  
  ol {
    font-size: 16.5px;
    font-family: Arial, Helvetica, sans-serif;
    text-align: justify;
    width: 195px;
    margin-left: 10px;
    font-weight: bold;
  }
  
  .funcionamento {
    color: rgb(158, 147, 147);
    margin-left: 3%;
    font-size: 23px;
    text-decoration: none;
    font-family: Arial, Helvetica, sans-serif;
    width: 350px;
    padding: 6px;
    font-weight: bold;  
    margin-top: 10px;
  }
  
  .infodireita{
    color:rgb(158, 147, 147);
    bottom: 40px;
    right: 870px;
    text-decoration: none;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 23px;
    margin-left: 27%;
    font-weight: bold;  
    padding: 9px;
    text-align: right;
    margin-top: 20px;
    
  }
  
  .capa {
    border-radius: 5%;
  }
  
  .info {
    display: flex;
    gap: 10px;
  }

  .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal-content {
    background-color: #cb0d0d;
    color: white;
    margin: 15% auto;
    padding: 20px;
    border-radius: 2em;
    width: 30%;
    text-align: center;
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif;
    border-style: outset;
    border-width: 3px;
}

.close {
    color: white;
    float: right;
    font-size: 30px;
    cursor: pointer;
}


button {
    padding: 15px 25px;
    font-size: 18px;
    background-color: #cb0d0d;
    border-radius: 2em;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    margin-top: 30px;
    margin-left: 80%;
}

.caixa {
    font-size: 20px;
    font-weight: bold; 
    text-align: center;
}

#codeDisplay {
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    background-color: blue;
    width: 150px;
    height: 70px;
    border-radius: 50px;
    margin-left: 28%;
    margin-top: 5%;
    font-size: 50px;
}
::placeholder{
    color: white;
  }
</style>
</head>
<body>
<ul class="menu">
  <li><a href="pagina_inicial.html">
    <img src="../biblioteca.png" title="Home - Biblioteca Virtual" width="140px" alt="imagem1" class="imagem1"></li>
</a>
  <li><a href="pagina_inicial.html">PÁGINA INICIAL</a></li>
  <li><a href="sobre.html">BIBLIOTECA</a> </li>
  <li><a href="quemsomos.html">QUEM SOMOS</a></li>
          <div id="divBusca">
            <form action="busca.php">
            <input type="text" name="search" id="search" placeholder="Pesquisar..." required>
            </form>
          </div>
  </ul>
<div class="container">
<div class="esquerda">
<img src="livros/<?php echo $livro['capa']; ?>" alt="Capa do Livro" width="180" height="280">
    <h2 class="nome-livro"><?php echo $livro['titulo']; ?></h2>
    <p class="autor-livro"><?php echo $livro['autor']; ?></p>
</div>
<div class="content">
    <p class="resumo"><?php echo $livro['sinopse']; ?></p>
      <button id="openModal">Reserva</button>

      <div id="myModal" class="modal">
          <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <br>
            <br> 
              <p class="caixa">Para a retirada do livro, apresente o número abaixo na biblioteca.</p>
              <p class="caixa">Obs: o livro irá permanecer reservado por até 3 dias.</p>
              <p id="codeDisplay"></p>
          </div>
      </div>
      <?php
echo "<script>
document.getElementById('openModal').addEventListener('click', function() {
    const modal = document.getElementById('myModal');
    const codeDisplay = document.getElementById('codeDisplay');

    const livroId = $livro_id;

    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'reserva.php?livroId=' + livroId, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            codeDisplay.textContent = response.randomCode;
        }
    };

    xhr.send();

    modal.style.display = 'block';
});

document.getElementById('closeModal').addEventListener('click', function() {
    const modal = document.getElementById('myModal');
    modal.style.display = 'none';
});
</script>";
?>

</div>
<div class="direita">
    <br>
    <br>
    <br>
      <ol>1- Alunos, professores e funcionários podem retirar livros na biblioteca.</ol>
      <br>
      <br>
      <ol>2- Cada usuário poderá retirar 1 livro a cada 7 dias.</ol>
      <br>
      <br>
      <ol>3- Caso o prazo acabe, o usuário deverá renovar o prazo no site.</ol>
</div>
</div>
<div class="info">
  <p class="funcionamento">Horario de Funcionamento: <br> De segunda-feira a sexta-feira <br> 08h ás 21h</p>
  <p class="infodireita">Telefone: 3652-3074 <br> E-mail: biblioteca@fito.br</p>
</div>
</body>
</html>