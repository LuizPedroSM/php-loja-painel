<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Marcas</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Marcas</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Marcas</h3>
            <div class="box-tools">
                <a href="<?php echo BASE_URL.'brands/add'; ?>"
                 class="btn btn-success" >Adicionar</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>                
                        <th>Nome da marca</th>
                        <th width="150">Qtd. de Produtos</th>
                        <th width="130">Ações</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach($list as $item): ?>
                    <tr>
                        <td><?php echo $item['name'];?></td>
                        <td><?php echo $item['product_count'];?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?php echo BASE_URL.'brands/edit/'.$item['id']; ?>" 
                                class="btn btn-xs btn-primary">Editar</a>
                                <a href="<?php echo BASE_URL.'brands/del/'.$item['id']; ?>" 
                                class="btn btn-xs btn-danger <?php echo ($item['product_count'] != '0')? 'disabled':'' ?>">Excluir</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</section>
