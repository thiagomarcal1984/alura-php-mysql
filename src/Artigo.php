<?php

class Artigo 
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function exibirTodos()
    {
        $resultado = $this->mysql->query('SELECT id, titulo, conteudo FROM artigos');
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC); // Retorna um array associativo.
        return $artigos;
    }

    public function encontrar(string $id): array
    {
        $selecionaArtigo = $this->mysql->prepare("SELECT id, titulo, conteudo FROM artigos WHERE id = ?");
        $selecionaArtigo->bind_param('s', $id);
        $selecionaArtigo->execute();
        return $selecionaArtigo->get_result()->fetch_assoc();
    }

    public function adicionar($titulo, $conteudo)
    {
        $insereArtigo = $this->mysql->prepare("INSERT INTO artigos (titulo, conteudo) VALUES(?, ?)");
        $insereArtigo->bind_param('ss', $titulo, $conteudo);
        $insereArtigo->execute();
    }

    public function remover($id):void
    {
        $removerArtigo = $this->mysql->prepare("DELETE FROM artigos WHERE id = ?");
        $removerArtigo->bind_param('s', $id);
        $removerArtigo->execute();
    }
}
