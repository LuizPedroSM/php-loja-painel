<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Categorias</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Categorias</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Categorias</h3>
            <div class="box-tools">
                <a href="<?php echo BASE_URL.'categories/add'; ?>"
                 class="btn btn-success" >Adicionar</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>                
                        <th>Nome da Categoria</th>
                        <th width="130">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $this->loadView('categories_item', array(
                        'items' => $list,
                        'level' => 0,
                    )); ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- /.content -->