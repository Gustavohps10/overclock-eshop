<?php $v->layout("_base");?>

<?php $v->start("head")?>
    <link rel="stylesheet" href="<?= url("static/css/crud.css");?>">
<?php $v->end()?>

<?php $v->start("modal");?>
    <div class="modal">
        <div class="modal-container">
            <i class="fas fa-times modal-close"></i>
            <div class="modal-header">
                <i>LO</i>
                <h1 class="modal-title">CADASTRAR</h1>
            </div>
            <div class="modal-content">
                <form action="#" method="post">
                <div class="input-box">
                    <div class="box">
                        <label for="perfil">PERFIL</label>
                        <input type="text" placeholder="Nome do Perfil" name="nome" id="perfil">
                    </div>
                </div>
                <div class="input-box s-50">
                    <div class="box">
                        <label for="nome">Nome</label>
                        <input type="text" placeholder="Nome do Perfil" name="nome" id="nome">
                    </div>
                    <div class="box">
                        <label for="nome">teste</label>
                        <input type="text" placeholder="Nome do Perfil" name="teste" id="teste">
                    </div>
                </div>
                <div class="input-box">
                    <div class="box"><label for="rr">RRR</label>
                    <input type="text"></div>
                </div>
                <input id="btn-confirm" class="btn" type="submit" value="CONFIRM">
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
                <th>Salary</th>
                <th>Date</th>
                <th>Years</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i=1; $i < 1000 ; $i++) { 
            ?>
            <tr>
                <td><?php echo $i?></td>
                <td>John</td>
                <td>$556</td>
                <td>2021-09-20</td>
                <td>23</td>
                <td><i class="fas fa-edit"></i></td>
                <td><i class="fas fa-trash-alt"></i></td>
            </tr>
            <?php
            }
            ?>
            
        </tbody>
    </table>
</section>
    
   
<?php $v->start("scripts");?>
    <script src="https://cdn.jsdelivr.net/gh/Rakhmadi/RdataTB@master/dist/index.js"></script>
    <script src="<?= url("static/js/crud.js")?>"></script>
<?php $v->end()?>