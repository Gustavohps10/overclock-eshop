<?php $v->layout("theme/admin/_base");?>

<?php $v->start("head")?>
    <link rel="stylesheet" href="<?= asset("/css/crud.css");?>">
<?php $v->end()?>

<?php $v->start("modal");?>
    <div class="modal">
        <div class="modal-container">
            <i class="fas fa-times modal-close"></i>
            <div class="modal-header">
                <h1 class="modal-title">Confirmar Exclusão</h1>
            </div>
            <div class="modal-content">
                <p>Certeza que deseja excluir o perfil <span id="span-id"></span>?</p>
                <form action="<?= $router->route("crud.deleteProfile")?>" method="post">
                    <input id="btn-confirm" class="btn" type="submit" value="CONFIRMAR">
                    <input type="hidden" name="id" id="hidden-id">
                </form>
            </div>
        </div>
    </div>
<?php $v->end()?>

        
<section>
    <h1 id="table-title"><i class="far fa-id-card"></i>PERFIS</h1>
    <table id="myTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>EDITAR</th>
                <th>DELETAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($perfis as $perfil) :
            ?>
            <tr>
                <td><?= $perfil->idPerfil?></td>
                <td><?= $perfil->nome?></td>
                <td><a href="<?= $router->route("admin.editProfile", ["id" => $perfil->idPerfil])?>"><i class="fas fa-edit"></i></a></td>
                <td><i class="fas fa-trash-alt btn-delete" id="<?=$perfil->idPerfil?>"></i></td>
            </tr>
            <?php
            endforeach;
            ?>
            
        </tbody>
    </table>
</section>
    
   
<?php $v->start("scripts");?>
    <script src="https://cdn.jsdelivr.net/gh/Rakhmadi/RdataTB@master/dist/index.js"></script>
    <script>
        let buttons = [
            {id: "btn-export-csv", text: "EXPORT CSV", type:"button"},
            {id: "btn-export-json", text: "EXPORT JSON", type:"button"},
            {id: "btn-register", text: "CADASTRAR", type:"a", href: window.location.href + "/cadastrar"}
        ];
    </script>
    <script src="<?= asset("/js/crud.js")?>"></script>
<?php $v->end()?>