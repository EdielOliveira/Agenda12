<?php
if (!isset($_SESSION)) {
    session_start();
}
class OutrasFormacoesController
{

    public function inserir($inicio, $fim, $descricao, $idusuario)
    {
        require_once '../Model/OutrasFormacoes.php';
        $OFormacao = new OutrasFormacoes();
        $OFormacao->setInicio($inicio);
        $OFormacao->setFim($fim);
        $OFormacao->setDescricao($descricao);
        $OFormacao->setIdUsuario($idusuario);
        $r = $OFormacao->inserirBD();
        return $r;
    }

    public function remover($id)
    {
        require_once '../Model/OutrasFormacoes.php';
        $OFormacao = new OutrasFormacoes();
        $r = $OFormacao->excluirBD($id);
        return $r;
    }

    public function gerarLista($idusuario)
    {
        require_once '../Model/OutrasFormacoes.php';
        $OFormacao = new OutrasFormacoes();
        return $results = $OFormacao->listaFormacoes($idusuario);
    }
}
