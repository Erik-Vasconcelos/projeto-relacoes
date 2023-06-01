<?php
use models\Produto;
use models\Categoria;

/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class ProdutosController {

	/**
	* Para acessar http://localhost/NOMEDOPROJETO/produtos/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Produto();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		#recupera a lista com todos os modelos
		$categoriasModel = new Categoria();
		$send['categorias'] = $categoriasModel->all();
   
		#chama a view
		render("produtos", $send);
	}

	
	function salvar($id=null){

		$model = new Produto();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		redirect("produtos/index/$id");
	}

	function deletar(int $id){
		
		$model = new Produto();
		$model->delete($id);

		redirect("produtos/index/");
	}


}
