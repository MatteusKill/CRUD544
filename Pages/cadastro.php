<?php
require '../Classes/usuario.php';
$usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2 class="titulo-pagina">CADASTRO DE USUÁRIO</h2>
    <form method="post">
        <input type="text" name="nome" id="" class="input-form" placeholder="Digite seu nome">
        <input type="email" name="email" id="" class="input-form" placeholder="Digite seu email">
        <input type="tel" name="telefone" id="" class="input-form" placeholder="Digite seu telefone">
        <input type="password" name="senha" id="" placeholder="Digite a sua senha">
        <input type="password" name="confsenha" id="" placeholder="Confirme a sua senha">
        <input type="submit" value="CADASTRAR">
        <p>Já é cadastrado? Clique <a href="login.php">aqui</a> para acessar</p>
    </form>

    <?php
    if (isset($_POST['nome'])) 
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $confsenha = addslashes($_POST['confsenha']);

        if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($confsenha)) {
            $usuario->conectar("crud54", "localhost", "root", "");
            if ($usuario->msgErro == "") 
            {
                echo "conectou";
                if ($senha == $confsenha) 
                {
                    if ($usuario->cadastrarUsuario($nome, $email, $telefone, $senha)) 
                    {
                        ?>
                            <div class="msg-usuario">
                                <p>Usuário cadastrado com sucesso!</p>
                            </div>
                        <?php
                    }
                    else
                    {
                        ?>
                            <div class="msg-usuario">
                                <p>Usuário já cadastrado!</p>
                            </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div class="msg-usuario">
                            <p>As senhas nao sao iguais!</p>
                        </div>
                    <?php
                }
            }
            else
            {
              ?>
                <div class="msg-usuario">
                    <p>Erro de Conexão com o banco.</p>
                    <?php
                        echo "Erro: ".
                        $usuario->msgErro;
                    ?>
                </div>
              <?php
            }
        }
        else 
        {
            ?>
                <div class="msg-usuario">
                    <p>Preencha todos os campos!</p>
                </div>
            <?php
        }
    }

    ?>

</body>

</html>