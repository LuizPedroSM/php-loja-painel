<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Permissões</h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

<form action="<?php echo BASE_URL; ?>permissions/items_edit_action/<?php echo $permission_item['id']; ?>" method="post">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Editar Item de Permissão</h3>
            <div class="box-tools">
                <input type="submit" class="btn btn-success" value="Salvar">
            </div>
        </div>
        <div class="box-body">
            <div class="form-group <?php echo (in_array('name', $errorItems))? 'has-error':'' ?>"
            >
                <label for="group_name">Nome do Item de Permissão</label>
                <input type="text" class="form-control" name="name" id="group_name" value="<?php echo $permission_item['name']; ?>">
            </div>
            <div class="form-group <?php echo (in_array('name', $errorItems))? 'has-error':'' ?>"
            >
                <label for="group_name">Slug</label>
                <input type="text" class="form-control" disabled id="group_name" value="<?php echo $permission_item['slug']; ?>">
            </div>
        </div>
    </div>
</form>

</section>
<!-- /.content -->