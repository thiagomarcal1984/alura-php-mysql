<?php
require '../config.php';
require '../src/Artigo.php';
require '../src/redireciona.php';

$artigo = new Artigo($mysql);
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $artigo->editar($_POST['id'], $_POST['titulo'], $_POST['conteudo']);
    redireciona('/admin/index.php');
}

$art = $artigo->encontrar($_GET['id']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar-artigo.php" method="post">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?=$art['titulo']?>" />
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo"><?=$art['conteudo']?></textarea>
            </p>
            <p>
                <input type="hidden" name="id" value="<?=$art['id']?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>