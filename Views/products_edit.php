<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Editar Produto</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo BASE_URL; ?>products"><i class="fa fa-dashboard"></i> Produtos</a></li>
        <li class="active">Editar Produto</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

<form action="<?php echo BASE_URL; ?>products/edit_action" method="post" enctype="multipart/form-data" >
    <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Editar Produto</h3>
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
                        'selected' => $info['id_category']
                    )); ?>
                </select>
            </div>

            <div class="form-group <?php echo (in_array('id_brand', $errorItems))? 'has-error':'' ?>">
                <label for="p_brand">Marca</label>
                <select required class="form-control" name="id_brand" id="p_brand">
                    <?php foreach($brands_list as $item): ?>
                    <option <?php echo ($item['id']== $info['id_brand'])? 'selected' : ''; ?> value="<?php echo $item['id']; ?>">
                        <?php echo $item['name']; ?>
                    </option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="form-group <?php echo (in_array('name', $errorItems))? 'has-error':'' ?>">
                <label for="p_name">Nome do Produto</label>
                <input required type="text" class="form-control" name="name" id="p_name" value="<?php echo $info['name']; ?>">
            </div>

            <div class="form-group <?php echo (in_array('description', $errorItems))? 'has-error':'' ?>">
                <label for="p_description">Descrição do Produto</label>
                <textarea id="p_description" name="description"><?php echo $info['description']; ?></textarea>
            </div>
            
            <div class="form-group <?php echo (in_array('stock', $errorItems))? 'has-error':'' ?>">
                <label for="p_stock">Estoque Disponível</label>
                <input required type="number" class="form-control" name="stock" id="p_stock" value="<?php echo $info['stock']; ?>">
            </div>
            
            <div class="form-group <?php echo (in_array('price_from', $errorItems))? 'has-error':'' ?>">
                <label for="p_price_from">Preço (de)</label>
                <input type="text" class="form-control" name="price_from" id="p_price_from" value="<?php echo $info['price_from']; ?>">
            </div>
            
            <div class="form-group <?php echo (in_array('price', $errorItems))? 'has-error':'' ?>">
                <label for="p_price">Preço (por)</label>
                <input required type="text" class="form-control" name="price" id="p_price" value="<?php echo $info['price']; ?>">
            </div>
            <hr>
            <div class="form-group <?php echo (in_array('weight', $errorItems))? 'has-error':'' ?>">
                <label for="p_weight">Peso (em Kg)</label>
                <input type="text" class="form-control" name="weight" id="p_weight" value="<?php echo $info['weight']; ?>">
            </div>
            
            <div class="form-group <?php echo (in_array('width', $errorItems))? 'has-error':'' ?>">
                <label for="p_width">Largura (em cm)</label>
                <input type="text" class="form-control" name="width" id="p_width" value="<?php echo $info['width']; ?>">
            </div>
            
            <div class="form-group <?php echo (in_array('height', $errorItems))? 'has-error':'' ?>">
                <label for="p_height">Altura (em cm)</label>
                <input type="text" class="form-control" name="height" id="p_height" value="<?php echo $info['height']; ?>">
            </div>
            
            <div class="form-group <?php echo (in_array('length', $errorItems))? 'has-error':'' ?>">
                <label for="p_length">Comprimento (em cm)</label>
                <input type="text" class="form-control" name="length" id="p_length" value="<?php echo $info['length']; ?>">
            </div>
            
            <div class="form-group <?php echo (in_array('diameter', $errorItems))? 'has-error':'' ?>">
                <label for="p_diameter">Diametro (em cm)</label>
                <input type="text" class="form-control" name="diameter" id="p_diameter" value="<?php echo $info['diameter']; ?>">
            </div>

            <hr>     

            <div class="form-group <?php echo (in_array('featured', $errorItems))? 'has-error':'' ?>">
                <label for="p_featured">Em Destaque</label> <br>
                <input type="checkbox" id="p_featured" name="featured" <?php echo ($info['featured'] == '1')? 'checked' : ''; ?> >
            </div>

            <div class="form-group <?php echo (in_array('sale', $errorItems))? 'has-error':'' ?>">
                <label for="p_sale">Em Promoção</label> <br>
                <input type="checkbox" name="sale" id="p_sale" <?php echo ($info['sale'] == '1')? 'checked' : ''; ?> >
            </div>

            <div class="form-group <?php echo (in_array('bestseller', $errorItems))? 'has-error':'' ?>">
                <label for="p_bestseller">Mais Vendidos</label> <br>
                <input type="checkbox" name="bestseller" id="p_bestseller" <?php echo ($info['bestseller'] == '1')? 'checked' : ''; ?> >
            </div>

            <div class="form-group <?php echo (in_array('new_product', $errorItems))? 'has-error':'' ?>">
                <label for="p_new_product">Novo Produto</label> <br>
                <input type="checkbox" name="new_product" id="p_new_product" <?php echo ($info['new_product'] == '1')? 'checked' : ''; ?> >
            </div>

            <?php foreach($options_list as $opitem): ?>
                <div class="form-group">
                    <label for="p_option_<?php echo $opitem['id'] ?>"><?php echo $opitem['name'] ?></label> <br>
                    <input type="text" class="form-control" name="options[<?php echo $opitem['id'] ?>]" id="p_option_<?php echo $opitem['id'] ?>"
                    value="<?php echo (isset($info['options'][$opitem['id']])) ? $info['options'][$opitem['id']] : '' ?>"
                    >
                </div>
            <?php endforeach;?>

            <hr>

            <label>Imagens do Produto</label> 
            <div class="images_area">
                <?php foreach($info['images'] as $id_image => $url): ?>
                    <div class="p_image"> 
                        <img src="<?php echo $url; ?>" alt=""> <br>
                        <a href="javascript:;"  
                        class="btn btn-xs btn-danger">Excluir</a>
                        <input type="hidden" name="c_images[]" value="<?php echo $id_image; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="p_new_image btn btn-primary btn-xs"> + </button>
            <div class="products_files_area">
                <input type="file" name="images[]" id="file">
            </div>
        </div>
    </div>
</form>

</section>

<section class="content container-fluid">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Avaliações</h3>
        </div>
        <div class="box-body">
        <?php if(count($rates) > 0): ?>
            <table class="table">
                <thead>
                    <tr>                
                        <th>Autor</th>
                        <th>Data da avaliação</th>
                        <th>Pontos</th>
                        <th>Comentário</th>                        
                        <th width="130">Ações</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach($rates as $rate): ?>
                    <tr>
                        <td><?php echo $rate['name'];?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($rate['date_rated'])) ;?></td>
                        <td><?php echo $rate['points'];?></td>
                        <td><?php echo $rate['comment'];?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?php echo BASE_URL.'products/del_rate/'.$rate['id']; ?>" 
                                class="btn btn-xs btn-danger">Excluir</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        <?php else: ?>
            <span>Este Produto ainda não possui Avaliações</span>
        <?php endif; ?>
        </div>
    </div>
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