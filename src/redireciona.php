<?php
function redireciona(string $url): void
{
    // Redirecionar para a URL com o método GET.
    header("Location: $url");
    die();
}
