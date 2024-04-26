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
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<div id="wrapper">
    <!-- Header -->
    <header id="header">
            <div class="inner">

                <!-- Logo -->
                    <a href="index.html" class="logo">
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
                <li><a href="index.html" class="active">Home</a></li>

                <li><a href="products.html">Products</a></li>

                <li><a href="checkout.html">Checkout</a></li>

                <li>
                    <a href="#" class="dropdown-toggle">About</a>

                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="testimonials.html">Testimonials</a></li>
                        <li><a href="terms.html">Terms</a></li>
                    </ul>
                </li>

                <li><a href="contact.html">Contact Us</a></li>

                <li><a href="/site/index">Home</a></li>
                <li><a href="/site/about">About</a></li>
                <li><a href="/site/contact">Contact</a></li>
                <li><a href="/site/signup">Signup</a></li>
                <li><a href="/site/login">Login</a></li>
                <li><a href="/site/logout">Logout</a></li>
            </ul>
        </nav>

    <!-- Main -->

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="float-end"><?= Yii::powered() ?></p>
        </div>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
