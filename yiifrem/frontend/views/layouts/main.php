<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\BookAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

BookAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
</head>
<body class="">
<?php $this->beginBody() ?>

<div id="wrapper">
    <!-- Header -->
    <header id="header">
            <div class="inner">

                <!-- Logo -->
                    <a href="/book/index" class="logo">
                        <span class="fa fa-book"></span> <span class="title">Book Online Store Website</span>
                    </a>

                <!-- Nav -->
                    <nav>
                        <ul>
                            <li><a href="#menu">Menu</a></li>
                        </ul>
                    </nav>

            </div>
        </header>

    <!-- Menu -->
        <nav id="menu">
            <h2>Menu</h2>
            <ul>
                <li><a href="/book/index" class="active">Home</a></li>

                <li><a href="/book/product">Products</a></li>

                <li><a href="/book/basket">Basket</a></li>

                <li>
                    <a href="/site/about" class="dropdown-toggle">About</a>

                    <ul>
                        <li><a href="/site/about">About Us</a></li>
                        <li><a href="/site/contact">Contact</a></li>
                    </ul>
                </li>
                <li><a href="/book/contactus">Contact Us</a></li>
                <li><a href="/site/signup">Signup</a></li>
                <li><a href="/site/login">Login</a></li>
                <li><a href="/site/logout">Logout</a></li>
            </ul>
        </nav>

    <!-- Main -->
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <section>
                <h2>Contact Us</h2>
                <form method="post" action="#">
                    <div class="fields">
                        <div class="field half">
                            <input type="text" name="name" id="name" placeholder="Name" />
                        </div>

                        <div class="field half">
                            <input type="text" name="email" id="email" placeholder="Email" />
                        </div>

                        <div class="field">
                            <input type="text" name="subject" id="subject" placeholder="Subject" />
                        </div>

                        <div class="field">
                            <textarea name="message" id="message" rows="3" placeholder="Notes"></textarea>
                        </div>

                        <div class="field text-right">
                            <label>&nbsp;</label>

                            <ul class="actions">
                                <li><input type="submit" value="Send Message" class="primary" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </section>
            <section>
                <h2>Contact Info</h2>

                <ul class="alt">
                    <li><span class="fa fa-envelope-o"></span> <a href="mailto:husniddin13124041@email.com"> husniddin13124041@gmail.com</a></li>
                    <li><span class="fa fa-phone"></span> +998 (93) 129 1312</li>
                    <li><span class="fa fa-map-pin"></span> Tashkent University of Information Technologies, Samarkand Branch, Faculty of Computer Engineering, M254+HFP, street Usto Umara Djurakulova, Samarkand, Samarkand region</li>
                </ul>

                <h2>Follow Us</h2>

                <ul class="icons">
                    <li><a target="_blank" href="https://github.com/Husniddin03" class="icon style2 fa-github"><span class="label">Twitter</span></a></li>
                    <li><a target="_blank" href="https://www.facebook.com/husniddin.gafforov" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a target="_blank" href="https://instagram.com/profila/husniddin.2003.09.11" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a target="_blank" href="https://t.me/muslimu3" class="icon style2 fa-telegram"><span class="label">LinkedIn</span></a></li>
                </ul>
            </section>

            <ul class="copyright">
                <li>Copyright © 2024 Company Name </li>
                <li>Template by: <a href="mailto:husniddin13124041@email.com">husniddin13124041@gmail.com</a></li>
            </ul>
        </div>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
