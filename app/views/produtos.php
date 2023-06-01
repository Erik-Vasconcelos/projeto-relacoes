<?php include 'layout-top.php' ?>



<form method='POST' action='<?=route('produtos/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Nome
    <input type="text" class="form-control" name="nome" value="<?=_v($data,"nome")?>" >
</label>

<label class='col-md-2'>
    Valor
    <input type="text" class="form-control" name="valor" value="<?=_v($data,"valor")?>" >
</label>

<label class='col-md-6'>
    Categoria
    <select name="categoria_id" class="form-control">
        <?php
        foreach($categorias as $categoria){
            _v($data,"categoria_id") == $categoria['id'] ? $selected='selected' : $selected='';
            print "<option value='{$categoria['id']}' $selected>{$categoria['nome']}</option>";
        }
        ?>
    </select>
</label>

<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("produtos")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome</th>
        <th>Valor</th>
        <th>Categoria</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("produtos/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['nome']?></td>
            <td><?=$item['valor']?></td>
            <td><?=$item['categoria']?></td>
            <td>
                <a href='<?=route("produtos/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>