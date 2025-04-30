<?php
// index.php arquivo padrão
// Name: Projeto Integrador (PI I) Dev: Alex Miller
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achei Você</title> <!-- nome do app -->
    <link rel="stylesheet" href="css/styles.css"> <!-- link para o arquivo css -->
</head>
<body>
    <div class="container">
        <h1>Achei Você - Encontre seu grupo do PI</h1>
        <form method="GET" action=""> <!-- formulario + método GET -->
            <label for="pesquisa">Digite seu RA:</label>
            <input type="text" name="pesquisa" id="pesquisa" placeholder="Ex: 1000009" required>
            <button type="submit">Pesquisar</button>
        </form>

        <?php
        if (isset($_GET['pesquisa'])) {
            $pesquisa = $_GET['pesquisa'];

            // conexão com o banco de dados local
            $servername = "localhost";
            $username = "root"; // usuário padrão
            $password = "";     // senha padrão
            $dbname = "projeto_integrador"; // nome do banco de dados

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            // consulta SQL para buscar o grupo
            $sql = "SELECT * FROM grupos WHERE integrantes LIKE '%$pesquisa%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<div class="resultado">';
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="grupo">';
                    echo '<strong>Grupo:</strong> ' . htmlspecialchars($row['nome_grupo']) . '<br>';
                    echo '<strong>Integrantes:</strong> ' . htmlspecialchars($row['integrantes']) . '<br>';
                    echo '<a href="' . htmlspecialchars($row['link_whatsapp']) . '" target="_blank"><button>Acessar Grupo no WhatsApp</button></a>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                echo '<p class="mensagem">Nenhum resultado encontrado.</p>';
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>