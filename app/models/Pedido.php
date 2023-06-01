<?php

namespace models;

class Pedido extends Model {

    protected $table = "pedidos";
    #nao esqueça da ID
    protected $fields = ["id","nomeCliente", "instant"];
    
    
    
    
}

