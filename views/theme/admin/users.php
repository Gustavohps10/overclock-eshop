<?php $v->layout("theme/admin/_base");?>

<?php $v->start("head")?>
    <link rel="stylesheet" href="<?= asset("/css/crud.css");?>">
<?php $v->end()?>
        
<section>
    <h1 id="table-title"><i class="fas fa-users"></i>USUÁRIOS</h1>
    <table id="myTable">
        <thead>
            <tr>
                <th>#</th>
                <th>NOME</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($usuarios as $usuario) :
            ?>
            <tr>
                <td><?= $usuario->idUsuario?></td>
                <td><?= $usuario->nome?></td>
                <td><?= $usuario->username?></td>
                <td><?= $usuario->email?></td>
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
            {id: "btn-export-json", text: "EXPORT JSON", type:"button"}
        ];
    </script>
    <script src="<?= asset("/js/crud.js")?>"></script>
<?php $v->end()?>