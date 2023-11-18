<?php
include("../conexao.php");

$sql = "SELECT * FROM livros";

$result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque</title>
    <link rel="icon" href="logo.png" type="image/icon type">
    <link rel="stylesheet" href="css/estilo_admin.css" type="text/css">
</head>
<body>
    <table>
        <tr>
            <td>
                <nav class="barra_lateral">
                <a href="admin_home.html"><img width="200px" src="../biblioteca.png"></a>
                    <ul>
                        <li><a class="setor" href="etq_ctrl.php">Controle de Estoque</a></li>
                        <li><a class="setor" href="cad_bk.html">Cadastro de Livros</a></li>
                        <li><a class="setor" href="reserv.php">Reservas</a></li>
                    </ul>
                </nav>
            </td>
            <td>
                <h1 class="title">Controle de Estoque</h1>
                <table class="controle">
                <thead>
                    <tr class="etq">
                        <th class="ueh">Código</th>
                        <th class="ueh">Título</th>
                        <th class="ueh">Autor</th>
                        <th class="ueh">Editora</th>
                        <th class="ueh">Ano de Publicação</th>
                        <th class="ueh">Categoria</th>
                        <th class="ueh">Disponível</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $livros): ?>
                        <tr class="etq">
                            <td class="ue"><?php echo $livros['id_livro']; ?></td>
                            <td class="ue"><?php echo $livros['titulo']; ?></td>
                            <td class="ue"><?php echo $livros['autor']; ?></td>
                            <td class="ue"><?php echo $livros['editora']; ?></td>
                            <td class="ue"><?php echo $livros['ano_publicacao']; ?></td>
                            <td class="ue"><?php echo $livros['categoria']; ?></td>
                            <td class="ue"><?php echo $livros['disponivel']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </td>
</tr>
</table>
</body>
</html>