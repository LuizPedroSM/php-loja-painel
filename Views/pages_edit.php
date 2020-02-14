<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Editar Página</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo BASE_URL; ?>pages"><i class="fa fa-dashboard"></i> Páginas</a></li>
        <li class="active">Editar Página</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

<form action="<?php echo BASE_URL; ?>pages/edit_action/<?php echo $info['id']; ?>" method="post">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Editar Página</h3>
            <div class="box-tools">
                <input type="submit" class="btn btn-success" value="Salvar">
            </div>
        </div>
        <div class="box-body">
            <div class="form-group <?php echo (in_array('title', $errorItems))? 'has-error':'' ?>">
                <label for="page_title">Título da Página</label>
                <input type="text" class="form-control" name="title" id="page_title" value="<?php echo $info['title']; ?>" >
            </div>
            <div class="form-group <?php echo (in_array('body', $errorItems))? 'has-error':'' ?>">
                <label for="page_body">Título da Página</label>
                <textarea id="page_body" name="body"><?php echo $info['body']; ?></textarea>
            </div>
        </div>
    </div>
</form>

</section>
<!-- /.content -->