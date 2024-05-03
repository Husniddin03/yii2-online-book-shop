<?php

use common\models\Book;
use common\models\Bookimg;

$bookimg = new Bookimg();
$imgs = $bookimg->find()->where(['bookid' => $model->id])->all();
?>

<div id="main">
    <div class="inner">
        <h1><?=$model->name?> <span class="pull-right"><del><?=$model->price+30000?> USZ</del> <?=$model->price?> USZ</span></h1>
        
        <div class="container-fluid">
            <div class="row">

                <div id="carouselExampleControls" class="carousel slide col-md-5" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php $i=true; foreach($imgs as $img){ ?>
                        <div class="carousel-item <?php if($i){ echo 'active';$i=false;} ?>">
                        <img class="d-block w-100 img-fluid" src="/uploads/bookimgs/<?=$img->path?>" alt="First slide">
                        </div>
                        <?php }?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="col-md-7">
                    <p><?=$model->description?></p>

                    <p><?=$model->description?></p>

                    <div class="row">
                        <div class="col-sm-4">
                            <label class="control-label">Extra 1</label>

                            <div class="form-group">
                                <select>
                                    <option value="0">Extra 1</option>
                                    <option value="1">Extra 2</option>
                                    <option value="2">Extra 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <label class="control-label">Quantity</label>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <input type="submit" class="primary" value="Add to Cart">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="container-fluid">
            <h2 class="h2">Similar Products</h2>

            <!-- Products -->
        <section class="tiles">
            <?php
            $model = new Book();
            $data = $model->find()->limit(3)->all();
                foreach($data as $item){ 
                    $bookimg = new Bookimg();
                    $imgs = $bookimg->find()->where(['bookid' => $item->id])->one();
                    ?>
                    <article class="style1">
                        <span class="image">
                            <img src="/uploads/bookimgs/<?=$imgs->path?>" alt="<?=$imgs->path?>" />
                        </span>
                        <a href="/book/view?id=<?=$item->id?>">
                            <h2><?=$item->name?></h2>
                            
                            <p><del><?=$item->price+30000?> USZ</del> <strong><?=$item->price?> USZ</strong></p>

                            <p><?=$item->description?></p>
                        </a>
                    </article>
            <?php } ?>
        </section>
        </div>
    </div>
</div>
