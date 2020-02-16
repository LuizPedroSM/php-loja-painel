<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Novo Produto</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Produtos</a></li>
        <li class="active">Novo Produto</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

<form action="<?php echo BASE_URL; ?>products/add_action" method="post">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Novo Produto</h3>
            <div class="box-tools">
                <input type="submit" class="btn btn-success" value="Salvar">
            </div>
        </div>
        <div class="box-body">

            <div class="form-group <?php echo (in_array('id_category', $errorItems))? 'has-error':'' ?>">
                <label for="p_cat">Categoria</label>
                <select required class="form-control" name="id_category" id="p_cat">
                    <?php $this->loadView('categories_add_item', array(
                        'items' => $cat_list,
                        'level' => 0,
                    )); ?>
                </select>
            </div>

            <div class="form-group <?php echo (in_array('id_brand', $errorItems))? 'has-error':'' ?>">
                <label for="p_brand">Marca</label>
                <select required class="form-control" name="id_brand" id="p_brand">
                    <?php foreach($brands_list as $item): ?>
                    <option value="<?php echo $item['id']; ?>">
                        <?php echo $item['name']; ?>
                    </option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="form-group <?php echo (in_array('name', $errorItems))? 'has-error':'' ?>">
                <label for="p_name">Nome do Produto</label>
                <input required type="text" class="form-control" name="name" id="p_name">
            </div>

            <div class="form-group <?php echo (in_array('description', $errorItems))? 'has-error':'' ?>">
                <label for="p_description">Descrição do Produto</label>
                <textarea id="p_description" name="description"></textarea>
            </div>
            
            <div class="form-group <?php echo (in_array('stock', $errorItems))? 'has-error':'' ?>">
                <label for="p_stock">Estoque Disponível</label>
                <input required type="number" class="form-control" name="stock" id="p_stock">
            </div>
            
            <div class="form-group <?php echo (in_array('price_from', $errorItems))? 'has-error':'' ?>">
                <label for="p_price_from">Preço (de)</label>
                <input type="text" class="form-control" name="price_from" id="p_price_from">
            </div>
            
            <div class="form-group <?php echo (in_array('price', $errorItems))? 'has-error':'' ?>">
                <label for="p_price">Preço (por)</label>
                <input required type="text" class="form-control" name="price" id="p_price">
            </div>
            <hr>
            <div class="form-group <?php echo (in_array('weight', $errorItems))? 'has-error':'' ?>">
                <label for="p_weight">Peso (em Kg)</label>
                <input type="text" class="form-control" name="weight" id="p_weight">
            </div>
            
            <div class="form-group <?php echo (in_array('width', $errorItems))? 'has-error':'' ?>">
                <label for="p_width">Largura (em cm)</label>
                <input type="text" class="form-control" name="width" id="p_width">
            </div>
            
            <div class="form-group <?php echo (in_array('height', $errorItems))? 'has-error':'' ?>">
                <label for="p_height">Altura (em cm)</label>
                <input type="text" class="form-control" name="height" id="p_height">
            </div>
            
            <div class="form-group <?php echo (in_array('length', $errorItems))? 'has-error':'' ?>">
                <label for="p_length">Comprimento (em cm)</label>
                <input type="text" class="form-control" name="length" id="p_length">
            </div>
            
            <div class="form-group <?php echo (in_array('diameter', $errorItems))? 'has-error':'' ?>">
                <label for="p_diameter">Diametro (em cm)</label>
                <input type="text" class="form-control" name="diameter" id="p_diameter">
            </div>

            <hr>     

            <div class="form-group <?php echo (in_array('featured', $errorItems))? 'has-error':'' ?>">
                <label for="p_featured">Em Destaque</label> <br>
                <input type="checkbox" id="p_featured" name="featured">
            </div>

            <div class="form-group <?php echo (in_array('sale', $errorItems))? 'has-error':'' ?>">
                <label for="p_sale">Em Promoção</label> <br>
                <input type="checkbox" name="sale" id="p_sale">
            </div>

            <div class="form-group <?php echo (in_array('bestseller', $errorItems))? 'has-error':'' ?>">
                <label for="p_bestseller">Mais Vendidos</label> <br>
                <input type="checkbox" name="bestseller" id="p_bestseller">
            </div>

            <div class="form-group <?php echo (in_array('new_product', $errorItems))? 'has-error':'' ?>">
                <label for="p_new_product">Novo Produto</label> <br>
                <input type="checkbox" name="new_product" id="p_new_product">
            </div>

            <?php foreach($options_list as $opitem): ?>
                <div class="form-group">
                    <label for="p_option_<?php echo $opitem['id'] ?>"><?php echo $opitem['name'] ?></label> <br>
                    <input type="text" class="form-control" name="options[<?php echo $opitem['id'] ?>]" id="p_option_<?php echo $opitem['id'] ?>">
                </div>
            <?php endforeach;?>

            <hr>

            <label>Imagens do Produto</label> 
            <button class="p_new_image btn btn-primary btn-xs"> + </button>
            <div class="products_files_area">
                <input type="file" name="images[]" id="file">
            </div>
        </div>
    </div>
</form>

</section>
<!-- /.content -->
<script src="https://cloud.tinymce.com/stable/tinymce.min.js" ></script>
<script>
tinymce.init({
    selector:'#p_description',
    height:300,
    menubar:false,
    plugins:['link','table', 'image', 'autoresize', 'lists'],
    toolbar:'undo redo | formatselect | bold italic backcolor | media image | alignleft aligncenter alignright alignjustify | table | link | bullist numlist | removeformat',
});
</script>