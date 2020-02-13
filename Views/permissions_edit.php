<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Permissões</h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

<form action="<?php echo BASE_URL; ?>permissions/edit_action/<?php echo $permission_id; ?>" method="post">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Editar Grupo de Permissão</h3>
            <div class="box-tools">
                <input type="submit" class="btn btn-success" value="Salvar">
            </div>
        </div>
        <div class="box-body">
            <div class="form-group <?php echo (in_array('name', $errorItems))? 'has-error':'' ?>"
            >
                <label for="group_name">Nome do grupo</label>
                <input type="text" class="form-control" name="name" id="group_name" value="<?php echo $permission_group_name; ?>">
            </div>

            <hr>

            <?php foreach($permission_items as $item): ?>
                <div class="form-group">
                    <input <?php echo (in_array($item['slug'], $permission_group_slugs))? 'checked="checked"' : '' ?>
                    type="checkbox" name="items[]" id="item-<?php echo $item['id']; ?>" value="<?php echo $item['id']; ?>">
                    <label for="item-<?php echo $item['id']; ?>"><?php echo $item['name']; ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</form>

</section>
<!-- /.content -->