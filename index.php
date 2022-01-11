<?php

use App\Model\Produto;
use App\Model\ProdutoDao;

require_once 'vendor/autoload.php';


$produto = new Produto;
$produto->setId(2);
$produto->setNome('Cabo de Alarme');
$produto->setDescricao('Cabo para alarme branco');

$produtoDao = new ProdutoDao;

$produtoDao->read($produto);
$produtoDao->delete(1);

foreach($produtoDao->read() as $produto) {
    echo $produto['nome'].'<br>'.$produto['descricao'];
}
