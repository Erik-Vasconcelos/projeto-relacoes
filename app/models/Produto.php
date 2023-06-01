<?php

namespace models;

class Produto extends Model {

    protected $table = "produtos";
    #nao esqueça da ID
    protected $fields = ["id","nome","valor","categoria_id"];
    
    
    public function findById($id){
        $sql = "SELECT produtos.*, categorias.nome AS categoria FROM {$this->table} "
                ." LEFT JOIN categorias ON categorias.id = produtos.categoria_id "
                ." WHERE produtos.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data = [':id' => $id];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


    public function all(){
        $sql = "SELECT produtos.*, categorias.nome as categoria FROM {$this->table} "
                ." LEFT JOIN categorias ON categorias.id = produtos.categoria_id ";
        
        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute();
        
        $list = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }

        return $list;
    }
    
}

