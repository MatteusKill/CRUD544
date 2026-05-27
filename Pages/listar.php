<?php
    require "../Classes/usuario.php";
    $usuario = new Usuario();
    $usuario->conectar("crud544", "localhost", "root", "");

    $dados = $usuario->ListarDados();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuário</title>
</head>
<body>
    <h2 class="titulo-pagina">LISTAR USUÁRIOS</h2>

    <a href="cadastro.php"><button>CADASTRAR</button></a>

    <table border="1" cellpading="10">
        <thead>
            <tr>
                <th>ID USUARIO</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <?php
            foreach($dados as $pessoa)
            {
        ?>
        <tbody>
            <tr>
                <td>
                    <!-- Informações sobre o id do usuário -->
                     <?php echo $pessoa['id_usuario'] ?>
                </td>
                <td>
                    <?php echo $pessoa['nome'] ?>
                    <!-- Informações sobre o nome do usuário -->
                </td>
                <td>
                    <!-- Informações sobre o email do usuário -->
                     <?php echo $pessoa['email'] ?>
                </td>
                <td>
                    <!-- Informações sobre o telefone do usuário -->
                     <?php echo $pessoa['telefone'] ?>
                </td>
                <td>
                    <a href="editar.php?id_usuario=<?php echo $pessoa['id_usuario']; ?>"><button>EDITAR</button></a>
                    <a href="excluir.php?id_usuario=<?php echo $pessoa['id_usuario']; ?>"><button>EXCLUIR</button></a>
                </td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>
</body>
</html>