<?php
use models\Pedido;
use models\Produto;
use models\ItemPedido;
/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class PedidosController {

	/**
	* Para acessar http://localhost/NOMEDOPROJETO/pedidos/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Pedido();
		$modelItem = new ItemPedido();
		
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		$produtoModel = new Produto();
        $send['produtos'] = $produtoModel->all();
		
		#se estiver editando um veiculo
		if ($id != null){
            #recupera todos os motoristas já setados para esse veiculo
            $send['itens'] = $modelItem->getItem($id);
        }


		#chama a view
		render("pedidos", $send);
	}

	
	function salvar($id=null){

		$model = new Pedido();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}

		#se a id de um usuario/motorista tiver sido enviada
        if (_v($_POST,'produto_id')){
            $model = new ItemPedido();
            $dados = ["produto_id"=> $_POST['produto_id'], "pedido_id"=>$id];
            $model->save($dados);
        }

		
		redirect("pedidos/index/$id");
	}

	function deletar(int $id){
		
		$model = new Pedido();
		$model->delete($id);

		redirect("pedidos/index/");
	}

	function deletarItem(int $idDoRelacionamento){
       
        $model = new ItemPedido();
        $rel = $model->findById($idDoRelacionamento);
        $model->delete($idDoRelacionamento);

        redirect("pedidos/index/{$rel['pedido_id']}");
    }



}
