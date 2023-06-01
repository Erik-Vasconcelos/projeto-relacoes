<?php include 'layout-top.php' ?>

<form method='POST' action='<?=route('pedidos/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Nome do cliente
    <input type="text" class="form-control" name="nomeCliente" value="<?=_v($data,"nomeCliente")?>" >
</label>

<label class='col-md-6'>
    Data
    <input type="text" class="form-control" name="instant" value="<?=_v($data,"instant")?>" >
</label>

<label class='col-md-6'>
        Item
        <select name="produto_id" class="form-control">
            <option></option>
            <?php
            foreach($produtos as $prod){
                print "<option value='{$prod['id']}'>{$prod['nome']}</option>";
            }
            ?>
        </select>  
</label>

    <?php if (_v($data,'id')) : ?>
    <table class='table'>
        <tr>
            <th>Nome</th>
            <th>Deletar</th>
        </tr>
        <?php foreach($itens as $item): ?>
            <tr>
                <td><?=$item['nome']?></td>
                <td>
                    <a href='<?=route("pedidos/deletarItem/{$item['id']}")?>'>Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>    
<?php endif; ?>


<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("pedidos")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome do cliente</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("pedidos/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['nomeCliente']?></td>
            <td><?=$item['instant']?></td>
            
            <td>
                <a href='<?=route("pedidos/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>