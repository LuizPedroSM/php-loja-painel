<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Novo Página</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Páginas</a></li>
        <li class="active">Novo Página</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

<form action="<?php echo BASE_URL; ?>pages/add_action" method="post">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Novo Página</h3>
            <div class="box-tools">
                <input type="submit" class="btn btn-success" value="Salvar">
            </div>
        </div>
        <div class="box-body">
            <div class="form-group <?php echo (in_array('title', $errorItems))? 'has-error':'' ?>">
                <label for="page_title">Título da Página</label>
                <input type="text" class="form-control" name="title" id="page_title">
            </div>
            <div class="form-group <?php echo (in_array('body', $errorItems))? 'has-error':'' ?>">
                <label for="page_body">Título da Página</label>
                <textarea id="page_body" name="body"></textarea>
            </div>
        </div>
    </div>
</form>

</section>
<!-- /.content -->
<script src="https://cloud.tinymce.com/stable/tinymce.min.js" ></script>
<script>
tinymce.init({
    selector:'#page_body',
    height:300,
    menubar:false,
    plugins:['link','table', 'image', 'autoresize', 'lists'],
    toolbar:'undo redo | formatselect | bold italic backcolor | media image | alignleft aligncenter alignright alignjustify | table | link | bullist numlist | removeformat',
    automatic_uploads:true,
    filter_picker_types:'image',
    images_upload_url:'<?php echo BASE_URL; ?>pages/upload'
});
</script>