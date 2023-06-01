<?php

namespace models;

class ItemPedido extends Model {

    protected $table = "item_pedido";
    #nao esqueça da ID
    protected $fields = ["id","pedido_id", "produto_id"];
    
    public function getItem($idPedido){
        #$sql = "SELECT * FROM produtos
        #    INNER JOIN item_pedido ON
        #       produto.id = item_pedido.produto_id
        #   WHERE item_pedido.pedido_id = :idPedido ";
        
        $sql = "SELECT * FROM produtos p
        INNER JOIN item_pedido ip
        ON p.id = ip.produto_id
        where ip.pedido_id = :idPedido";

        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute([':idPedido' => $idPedido]);

        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }
        return $list;
}

}

