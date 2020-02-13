<?php foreach($items as $item): ?>
    <option value="<?php echo $item['id'];?>">
        <?php 
            for($q = 0; $q < $level; $q++)
            echo '-- ';
            echo $item['name'];
        ?>
    </option>

    <?php 
        if(count($item['subs']) > 0) {
            $this->loadView('categories_add_item', array(
                'items' => $item['subs'],
                'level' => $level + 1,
            ));
        }
    ?>
<?php endforeach;?>