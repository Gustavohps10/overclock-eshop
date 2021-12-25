<?php $v->layout("theme/app/_base");?>

<? $v->start("head")?>
    <link rel="stylesheet" href="<?= asset("/css/register.css")?>">
<? $v->end();?>

<section class="register">
    <a href="<?= $router->route("address.listAddresses")?>" class="back"><i class="fas fa-arrow-left"></i>Endereços</a>
    <form action="<?= $formUrl ?>" method="post" autocomplete="off">
        <div class="form-header">
            <h1><?= $formName?></h1>
        </div>
        <div class="form-content">
            <label for="name">Nome</label>
            <div class="input-field">
                <i class="fas fa-home"></i>
                <input type="text" name="name" id="name" placeholder="Nome, Ex: Casa, Trabalho, etc..." value='<?= $endereco->nome?>'>
            </div>
            <div class="checkbox-container">
                <label for="mainAddress">Principal</label>
                <input type="checkbox" id="mainAddress" name="mainAddress" <?= $endereco->principal?>>
            </div>
            <div class="double-input-field">
                <div class="input-box">
                    <label for="cep">CEP</label>
                    <div class="input-field">
                        <i class="fas fa-map-marked-alt"></i>
                        <input type="text" name="cep" id="cep" placeholder="CEP" value="<?= $endereco->cep?>">
                    </div>
                </div>
                <div class="input-box">
                    <label for="district">Bairro</label>
                    <div class="input-field">
                        <i class="fas fa-map"></i>
                        <input type="text" name="district" id="district" placeholder="Bairro" value="<?= $endereco->bairro?>">
                    </div>
                </div>
            </div>
            <div class="double-input-field">
                <div class="input-box">
                    <label for="street">Rua</label>
                    <div class="input-field">
                        <i class="fas fa-road"></i>
                        <input type="text" name="street" id="street" placeholder="Rua" value="<?= $endereco->rua?>">
                    </div>
                </div>
                <div class="input-box">
                    <label for="house-number">N° da Casa</label>
                    <div class="input-field">
                        <i class="fas fa-list-ol"></i>
                        <input type="text" name="house-number" id="house-number" placeholder="Número da Casa" value="<?= $endereco->numeroCasa?>">
                    </div>
                </div>
            </div>
            <div class="double-input-field">
                <div class="input-box">
                    <label for="city">Cidade</label>
                    <div class="input-field">
                        <i class="fas fa-city"></i>
                        <input type="city" name="city" id="city" placeholder="Cidade" value="<?= $endereco->cidade?>">
                    </div>
                </div>
                <div class="input-box">
                    <label for="state">Etado</label>
                    <div class="input-field">
                        <i class="fas fa-flag-usa"></i>
                        <input type="text" name="state" id="state" placeholder="Exemplo: SP, PR, RJ, etc..." value="<?= $endereco->estado?>">
                    </div>
                </div>
            </div>
            <input type="hidden" name="idAddress"value="<?= $endereco->idEndereco?>">
        </div>
        <div class="form-footer">
            <input class="btn" type="submit" value="<?= $btnName?>">
        </div>
    </form>
</section>

<?php $v->start("scripts");?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js"></script>
<script>
    $("#cep").mask("00000-000");
    $("#state").mask("AA")

</script>
<?php $v->end();?>