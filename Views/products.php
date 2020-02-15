<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Produtos</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Produtos</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Produtos</h3>
            <div class="box-tools">
                <a href="<?php echo BASE_URL.'options'; ?>"
                 class="btn btn-primary" >Opções do Produto</a>
                <a href="<?php echo BASE_URL.'products/add'; ?>"
                 class="btn btn-success" >Adicionar</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>                
                        <th>Categoria</th>
                        <th>Nome do Produto</th>
                        <th width="150">Qtd. Estoque</th>
                        <th width="130">Preço</th>
                        <th width="130">Ações</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach($list as $item): ?>
                    <tr>
                        <td><?php echo $item['name_category'];?></td>
                        <td>
                            <?php echo $item['name'];?> <br>
                            <small> <?php echo $item['name_brand'];?> </small>
                        </td>
                        <td><?php echo $item['stock'];?></td>
                        <td>
                            <small> <strike> R$ <?php echo number_format($item['price_from'], 2, ',', '.');?>  </strike> </small> <br>
                            R$ <?php echo number_format($item['price'], 2, ',', '.');?> 
                        </td>
                        <td> 
                            <div class="btn-group">
                                <a href="<?php echo BASE_URL.'products/edit/'.$item['id']; ?>" 
                                class="btn btn-xs btn-primary">Editar</a>
                                <a href="<?php echo BASE_URL.'products/del/'.$item['id']; ?>" 
                                class="btn btn-xs btn-danger">Excluir</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</section>
