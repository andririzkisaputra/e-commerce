<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- <div class="hero_area"> -->
   <!-- header section strats -->
   <header class="header_section">
      <div class="container">
         <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="<?=  Url::base(true) ?>"><img width="250" src="<?=  Url::base(true).'/images/logo.png' ?>" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" href="<?=  Url::base(true) ?>">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?=  Url::base(true).'/site/produk' ?>">Produk</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?=  Url::base(true).'/site/pesanan' ?>">Pesanan</a>
                  </li>
                  <li class="nav-item">
                      <?php if (!Yii::$app->user->isGuest): ?>
                        <a class="nav-link" href="<?=  Url::base(true).'/site/logout' ?>">Logout (<?=Yii::$app->user->identity->username?>)</a>
                      <?php endif; ?>
                      <?php if (Yii::$app->user->isGuest): ?>
                        <a class="nav-link" href="<?=  Url::base(true).'/site/login' ?>">Login</a>
                      <?php endif; ?>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#" id="nav-item-padding">
                       <i class="fa fa-bell-o" aria-hidden="true"></i>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= Url::base(true).'/site/keranjang' ?>" class="nav-link" id="nav-item-padding">
                       <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="nav-item-padding">
                       <i class="fa fa-search" aria-hidden="true"></i>
                     </a>
                  </i>
               </ul>
            </div>
         </nav>
      </div>
   </header>
   <!-- end header section -->
<!-- </div> -->

<main role="main" class="flex-shrink-0">
    <!-- <div class="container"> -->
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    <!-- </div> -->
</main>

<!-- footer start -->
<footer>
   <div class="container">
      <div class="row">
         <div class="col-md-4">
             <div class="full">
                <div class="logo_footer">
                  <a href="#"><img width="210" src="<?=  Url::base(true).'/images/logo.png' ?>" alt="#" /></a>
                </div>
                <div class="information_f">
                  <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, USA</p>
                  <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                  <p><strong>EMAIL:</strong> yourmain@gmail.com</p>
                </div>
             </div>
         </div>
         <div class="col-md-8">
            <div class="row">
            <div class="col-md-7">
               <div class="row">
                  <div class="col-md-6">
               <div class="widget_menu">
                  <h3>Menu</h3>
                  <ul>
                     <li><a href="#">Home</a></li>
                     <li><a href="#">About</a></li>
                     <li><a href="#">Services</a></li>
                     <li><a href="#">Testimonial</a></li>
                     <li><a href="#">Blog</a></li>
                     <li><a href="#">Contact</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-6">
               <div class="widget_menu">
                  <h3>Account</h3>
                  <ul>
                     <li><a href="#">Account</a></li>
                     <li><a href="#">Checkout</a></li>
                     <li><a href="#">Login</a></li>
                     <li><a href="#">Register</a></li>
                     <li><a href="#">Shopping</a></li>
                     <li><a href="#">Widget</a></li>
                  </ul>
               </div>
            </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="widget_menu">
                  <h3>Newsletter</h3>
                  <div class="information_f">
                    <p>Subscribe by our newsletter and get update protidin.</p>
                  </div>
                  <div class="form_sub">
                     <form>
                        <fieldset>
                           <div class="field">
                              <input type="email" placeholder="Enter Your Mail" name="email" />
                              <input type="submit" value="Subscribe" />
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- footer end -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
