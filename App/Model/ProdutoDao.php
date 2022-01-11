<?php

namespace App\Model;

class ProdutoDao
{

    public function create(Produto $p)
    {

        $sql = 'INSERT INTO produto (nome,descricao) VALUES (?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getDescricao());
        $stmt->execute();
    }
    public function read()
    {
        $sql = 'SELECT * FROM produto';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        } else {
            return [];
        }
    }
    public function update(Produto $p)
    {
        $sql = 'UPDATE produto SET nome = ?, descricao = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getDescricao());
        $stmt->bindValue(3, $p->getId());

        $stmt->execute();
    }
    public function delete($id)
    {
        $sql = 'DELETE FROM produto WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        
        $stmt->execute();
    }
}
