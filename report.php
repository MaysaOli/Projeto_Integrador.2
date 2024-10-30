<?php
// Inclui o arquivo de configuração
include_once('config.php');

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
    // Sanitizar dados para evitar XSS
    $nome = htmlspecialchars($_POST['nome']);
    $local = htmlspecialchars($_POST['local']);
    $descricao = htmlspecialchars($_POST['descricao']);

    // Escapar dados para prevenção de SQL Injection
    $nome = mysqli_real_escape_string($conexao, $nome);
    $local = mysqli_real_escape_string($conexao, $local);
    $descricao = mysqli_real_escape_string($conexao, $descricao);

    // Query para inserir dados no banco de dados
    $query = "INSERT INTO sitemaysa (nome, local, descricao) VALUES ('$nome', '$local', '$descricao')";
    $result = mysqli_query($conexao, $query);

    // Verifica se a query foi executada com sucesso
    if ($result) {
        // Exibir mensagem de sucesso
        echo "<!DOCTYPE html>
        <html lang='pt-BR'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Confirmação de Envio</title>
            <style>
                body {
                    font-family: Arial, Helvetica, sans-serif;
                    background-image: linear-gradient(to right, rgba(224, 0, 217, 0.767), rgba(246, 147, 241, 0.767));
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    text-align: center;
                }
                .message {
                    background-color: rgba(0, 0, 0, 0.8);
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    color: #ffcc00;
                }
                .message h1 {
                    margin-top: 0;
                }
                .message a {
                    color: #ffcc00;
                    text-decoration: none;
                    font-weight: bold;
                }
                .message a:hover {
                    text-decoration: underline;
                }
            </style>
        </head>
        <body>
            <div class='message'>
                <h1>Enviado com Sucesso!</h1>
                <p>Obrigado por reportar o incidente. Estamos encaminhando uma unidade para a sua residência.</p>
                <p><a href='site.html'>Voltar para o início</a></p>
            </div>
        </body>
        </html>";
        exit(); // Garante que o restante do código não será executado
    } else {
        // Exibir mensagem de erro
        echo "Erro ao enviar o relatório: " . mysqli_error($conexao);
    }

    // Fechar a conexão
    mysqli_close($conexao);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportar Agressão</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgba(224, 0, 217, 0.767), rgba(246, 147, 241, 0.767));
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        nav {
            position: absolute;
            top: 20px;
            width: 100%;
            text-align: center;
        }
        nav a {
            margin: 0 15px;
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
            background-color: rgba(99, 5, 96, 0.767);
            padding: 10px 20px;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: rgba(255, 0, 255, 0.9);
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            width: 90%;
            max-width: 1200px;
            gap: 20px;
        }
        form {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        h1 {
            margin-bottom: 30px;
            color: #ffcc00;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            color: #ffcc00;
        }
        input[type="text"], textarea {
            width: calc(100% - 20px);
            padding: 8px 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #ffcc00;
            color: #000;
            padding: 8px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #e6b800;
        }
        .info {
            padding: 20px;
            color: #ffcc00;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .info h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <nav>
        <a href="site.html">Início</a>
        <a href="conselhos.html">Conselhos</a>
        <a href="superacao.html">Mensagem de Superação</a>
        <a href="contato.html">Contato</a>
    </nav>
    <div class="container">
        <form action="report.php" method="POST">
            <h1>Reportar Agressão</h1>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="local">Local do Incidente:</label>
            <input type="text" id="local" name="local" required>

            <label for="descricao">Me conte o que Aconteceu:</label>
            <textarea id="descricao" name="descricao" rows="4" required></textarea>

            <input type="submit" name="submit" value="Enviar">
        </form>

        <div class="info">
            <h2>Importante</h2>
            <p>As informações fornecidas serão tratadas com total confidencialidade. Sua segurança é nossa prioridade.</p>
        </div>
    </div>
</body>
</html>
