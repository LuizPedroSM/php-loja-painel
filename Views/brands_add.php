<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Nova Marca</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo BASE_URL; ?>brands"><i class="fa fa-dashboard"></i> Marcas</a></li>
        <li class="active">Nova Marca</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

<form action="<?php echo BASE_URL; ?>brands/add_action" method="post">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Nova Marca</h3>
            <div class="box-tools">
                <input type="submit" class="btn btn-success" value="Salvar">
            </div>
        </div>
        <div class="box-body">
            <div class="form-group <?php echo (in_array('name', $errorItems))? 'has-error':'' ?>">
                <label for="brand_name">Nome da Marca</label>
                <input type="text" class="form-control" name="name" id="brand_name">
            </div>
        </div>
    </div>
</form>

</section>
