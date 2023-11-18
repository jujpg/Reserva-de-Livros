<?php
include("../conexao.php");

$sql = "SELECT r.id_reserva, l.titulo, r.data_reserva
        FROM reservas r
        INNER JOIN livros l ON r.id_livro = l.id_livro";

$result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
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
    <!-- ... (seu código HTML) ... -->
    <table class="controle">
        <thead>
            <tr class="etq">
                <th class="ue">Codigo de Reserva</th>
                <th class="ue">Titulo do Livro</th>
                <th class="ue">Data e Hora da Reserva</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $reservas): ?>
                <tr class="etq">
                    <td class="ue"><?php echo $reservas['id_reserva']; ?></td>
                    <td class="ue"><?php echo $reservas['titulo']; ?></td>
                    <td class="ue"><?php echo $reservas['data_reserva']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</td>
</tr>
</table>
</body>
</html>
