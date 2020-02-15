<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Editar Opção</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo BASE_URL; ?>products"><i class="fa fa-dashboard"></i> Produtos</a></li>
        <li><a href="<?php echo BASE_URL; ?>options"><i class="fa fa-dashboard"></i> Opções</a></li>
        <li class="active">Editar Opção</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

<form action="<?php echo BASE_URL; ?>options/edit_action/<?php echo $info['id']; ?>" method="post">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Editar Opção</h3>
            <div class="box-tools">
                <input type="submit" class="btn btn-success" value="Salvar">
            </div>
        </div>
        <div class="box-body">
            <div class="form-group <?php echo (in_array('name', $errorItems))? 'has-error':'' ?>">
                <label for="option_name">Título da Opção</label>
                <input type="text" class="form-control" name="name" id="option_name" value="<?php echo $info['name']; ?>" >
            </div>
        </div>
    </div>
</form>

</section>