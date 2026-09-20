<?php
header('Content-Type: text/html; charset=utf-8');

$pg = $_GET['pg'] ?? "";

// Remove a barra inicial se existir (ex: /pg1.php -> pg1.php)
$pg = ltrim($pg, '/');

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Aulas de PHP</title>
</head>
<body>
    <h1>Aulas de PHP</h1>
    <p>Selecione um arquivo abaixo ou acesse diretamente pela URL:</p>
    <ul>
        <li><a href="/aula1.php">aula1.php - Variáveis</a></li>
        <li><a href="/aula2.php">aula2.php - Estruturas Condicionais</a></li>
    </ul>
    <?php
        
        
        $nomeArquivo = basename($pg);

        // Monta o caminho absoluto para a pasta /aulas
        $caminhoArquivo = __DIR__ . '/../aulas/' . $nomeArquivo;

        // Executa o include se o arquivo existir
        if (!empty($pg) && file_exists($caminhoArquivo)) {
            echo"<hr><h2>Página: $pg</h2>";
            include $caminhoArquivo;
        } else if(!file_exists($caminhoArquivo)){
            http_response_code(404);
            echo "<h3>Erro 404: O arquivo '{$nomeArquivo}' não foi encontrado em /aulas/</h3>";
        }
    ?>
</body>
</html>