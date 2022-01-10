<?php $v->layout("theme/app/_base");?>

<?php $v->start("head");?>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<?php $v->end();?>


    <section class="home" id="home">

        <div class="swiper home-slider">
            <div class="swiper-wrapper wrapper">
                <div class="swiper-slide slide" id="banner-1">
                    <div class="content">
                        <span>Lorem ipsum dolor sit amet.</span>
                        <h3>Monte seu Setup</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut consequuntur vel inventore cupiditate nostrum quos tenetur, temporibus ipsam laboriosam laborum accusantium corporis perferendis, quod quam eveniet neque perspiciatis! Itaque, suscipit!</p>
                        <a href="#" class="btn">order now</a>
                    </div>
                </div>
                <div class="swiper-slide slide" id="banner-2">
                </div>
                <div class="swiper-slide slide" id="banner-3">
                    <div class="content">
                        <span>Lorem, ipsum dolor.</span>
                        <h3>RGB da mais FPS</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut consequuntur vel inventore cupiditate nostrum quos tenetur, temporibus ipsam laboriosam laborum accusantium corporis perferendis, quod quam eveniet neque perspiciatis! Itaque, suscipit!</p>
                        <a href="#" class="btn">order now</a>
                    </div>
                </div>
            </div>

            <div class="swiper-pagination"></div>
        </div>

    </section>

    <section class="new-products" id="new-products">
        <h3 class="sub-heading">Nossos Produtos</h3>
        <h1 class="heading">Novos</h1>

        <div class="box-container">
            <?php
            if(!empty($novosProdutos)): foreach($novosProdutos as $produto):
                $valorProduto = 'R$'.number_format($produto->valor, 2, ',', '.');
            ?>
            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="<?=$router->route("app.productDetail", ["id" => $produto->idProduto])?>" class="fas fa-eye"></a>
                <img src="<?=asset("images/products/".$produto->imagem)?>" alt="">
                <h3><?=$produto->nome?></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span class="price"><?= $valorProduto?></span><br>
                <span class="installment-price">10x de 00,00 sem juros</span>
                <a href="" data-action="<?= $router->route("cart.add", ["id" => $produto->idProduto])?>" class="btn">Comprar <i class="fas fa-shopping-cart"></i></a>
            </div>
            <?php
            endforeach; endif;
            ?>
        </div>
    </section>

    <section class="pc-categories" id="pc-categories">
        <h3 class="sub-heading">GAMER</h3>
        <h1 class="heading">Categorias de pc</h1>

        <div class="box-container">
            <div class="box">
                <div class="image">
                    <img src="<?=asset("/images/pc-categories/")."extreme.jpg"?>" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>EXTREME</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, voluptatibus.</p>
                    <span class="price">R$15.000,00 - R$40.000,00</span>
                    <br>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="<?=asset("/images/pc-categories/")."high.jpg"?>" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>HIGH</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, voluptatibus.</p>
                    <span class="price">R$9.000,00 - 15.000,00</span>
                    <br>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="<?=asset("/images/pc-categories/")."mid.jpg"?>" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>MID</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, voluptatibus.</p>
                    <span class="price">R$5.000,00 - R$9.000,00</span>
                    <br>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="<?=asset("/images/pc-categories/")."low.png"?>" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>LOW</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, voluptatibus.</p>
                    <span class="price">R$3.000,00 - R$5.000,00 </span>
                    <br>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>
        </div>

    </section>

    <section class="about" id="about">
        <h3 class="sub-heading">Sobre</h3>
        <h1 class="heading">Porque nos escolher?</h1>

        <div class="row">
            <div class="image">
                <img src="<?=asset("/images/about.jpg")?>" alt="">
            </div>
            <div class="content">
                <h3>Melhor loja gamer do país</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium magnam voluptas molestiae suscipit numquam, adipisci perspiciatis ipsam repellendus officia eos dolore rerum minima eaque. Iure natus dolorem dolorum. Ut, voluptatem?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero corrupti sunt aspernatur facere consequatur praesentium vitae rerum qui modi error.</p>
                <div class="icons-container">
                    <div class="icons">
                        <i class="fas fa-shipping-fast"></i>
                        <span>Frete Grátis</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-dollar-sign"></i>
                        <span>Pagamento Facil</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-headset"></i>
                        <span>Suporte 24H</span>
                    </div>
                </div>
                <a href="#" class="btn">Ler mais</a>
            </div>
        </div>
    </section>

    <section class="review" id="review">
        <h3 class="sub-heading">Comentários de clientes</h3>
        <h1 class="heading">O que acharam</h1>

        <div class="swiper review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/pic-1.jpg" alt="">
                        <div class="user-info">
                            <h3>name user</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam iusto dolores nisi autem aliquid eos, temporibus quo delectus recusandae error, quam iure pariatur esse, quos consequatur tenetur? Dolorum, animi aspernatur?</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/pic-1.jpg" alt="">
                        <div class="user-info">
                            <h3>name user</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam iusto dolores nisi autem aliquid eos, temporibus quo delectus recusandae error, quam iure pariatur esse, quos consequatur tenetur? Dolorum, animi aspernatur?</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/pic-1.jpg" alt="">
                        <div class="user-info">
                            <h3>name user</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam iusto dolores nisi autem aliquid eos, temporibus quo delectus recusandae error, quam iure pariatur esse, quos consequatur tenetur? Dolorum, animi aspernatur?</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/pic-1.jpg" alt="">
                        <div class="user-info">
                            <h3>name user</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam iusto dolores nisi autem aliquid eos, temporibus quo delectus recusandae error, quam iure pariatur esse, quos consequatur tenetur? Dolorum, animi aspernatur?</p>
                </div>
            </div>
        </div>
    </section>


<?php $v->start("scripts");?>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="<?= asset("/js/swiper.js")?>"></script>
    <script>
        $('[data-action]').on("click",function(e) {
            e.preventDefault();
            $.ajax({
                method: 'post',
                url: $(this).data('action'),
                success: function (){
                    window.location.href = "<?= $router->route("app.order"); ?>";
                }
            });
        });
    </script>
<?php $v->end();?>
