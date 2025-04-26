<?php
// index.php arquivo padrão
// Name: Projeto Integrador (PI I) Dev: Alex Miller
// Versão: 1.0
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
            <label for="pesquisa">Digite seu nome:</label>
            <input type="text" name="pesquisa" id="pesquisa" placeholder="Ex: Alex" required>
            <button type="submit">Pesquisar</button>
        </form>
    </div>
</body>
</html>