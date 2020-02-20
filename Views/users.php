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
        </div>
    </div>
</section>
