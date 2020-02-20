<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Usuários</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Usuários</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Filtro</h3>
        </div>
        <div class="box-body">
            <form action="" method="get">            
                <div class="row">
                    <div class="col-sm-5">
                        <label for="form_user">Nome ou E-mail</label>
                        <input type="text" name="name" id="form_user" class="form-control" value="<?php echo $filter['name'];?>">
                    </div>
                    <div class="col-sm-5">
                        <label for="form_permission">Nível de Permissão</label>
                        <select type="text" name="permission" id="form_permission" class="form-control">
                            <option></option>
                            <?php foreach($permission_list as $item): ?>
                                <option value="<?php echo $item['id'];?>" <?php echo ($filter['permission'] == $item['id'])? 'selected' : '';?>>
                                    <?php echo $item['name'];?>
                                </option>
                            <?php endforeach; ?>
                            
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label>&nbsp;</label> <br>
                        <input type="submit" value="Filtrar" class="btn btn-info">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Usuários</h3>
            <div class="box-tools">
                <a href="<?php echo BASE_URL.'users/add'; ?>"
                 class="btn btn-success" >Adicionar</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>                
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Nível de permissão</th>                       
                        <th width="130">Ações</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach($list as $item): ?>
                    <tr>
                        <?php if ($item['admin'] == '1'): ?>
                            <td> <strong> <?php echo $item['name'];?> </strong> </td>
                        <?php else: ?>
                            <td><?php echo $item['name'];?></td>
                        <?php endif; ?>
                        <td><?php echo $item['email'];?></td>
                        <td><?php echo $item['permission_name'];?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?php echo BASE_URL.'users/edit/'.$item['id']; ?>" 
                                class="btn btn-xs btn-primary">Editar</a>
                                <a href="<?php echo BASE_URL.'users/del/'.$item['id']; ?>" 
                                class="btn btn-xs btn-danger">Excluir</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

            <hr>

            <?php 
                $total_pages = ceil($pag['total'] / $pag['per_page']);
                $items = $_GET;
                unset($items['url']);
            ?>
            <?php for ($q=0; $q < $total_pages; $q++): ?>
                <a href="<?php $items['p'] = ($q + 1); echo BASE_URL.'users?'.http_build_query($items); ?>">
                    <?php echo($q == $pag['currentpage'])?'<strong>[ '.($q + 1).' ]</strong>': '[ '.($q + 1).' ]'?>
                </a>
            <?php endfor;?>

        </div>
    </div>
</section>
