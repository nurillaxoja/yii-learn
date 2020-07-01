<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\BackendAsset;
use yii\helpers\Url;

// AppAsset::register($this);
BackendAsset::register($this);

$url = Yii::$app->homeUrl.'backend/';

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?= Yii::$app->homeUrl ?>" class="logo"><b>Blog UZ</b></a>
            <!--logo end-->

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="profile.html"><img src="<?=$url ?>assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                    <h5 class="centered"><?= Yii::$app->user->identity->full_name ?></h5>
                    <?php $controller = Yii::$app->controller->id; ?>

                  <li class="">
                      <a class="<?=($controller == 'default')?"active": ''?>" href="<?= Url::to(['default/index']) ?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Main Page</span>
                      </a>
                  </li>

                  <li class="">
                      <a class="<?=($controller =='post')?"active": ''?>" href="<?= Url::to(['post/index']) ?>">
                          <i class="fa fa-clipboard"></i>
                          <span>Post</span>
                      </a>
                  </li>

                  <li class="">
                      <a class="<?=($controller == 'category')?"active": ''?>" href="<?= Url::to(['category/index']) ?>">
                          <i class="fa fa-list"></i>
                          <span>Categories</span>
                      </a>
                  </li>

                  <li class="">
                      <a class="<?=($controller == 'tag')?"active": ''?>" href="<?= Url::to(['tag/index']) ?>">
                          <i class="fa fa-tag"></i>
                          <span>Tags</span>
                      </a>
                  </li>


                  <li class="">
                      <a class="<?=($controller == 'page')?"active":''?>" href="<?= Url::to(['page/index']) ?>">
                          <i class="fa fa-file-text-o"></i>
                          <span>Pages</span>
                      </a>
                  </li>

                  <li class="">
                      <a class="<?=($controller == 'user')?"active": ''?> " href="<?= Url::to(['user/index']) ?>">
                          <i class="fa fa-users"></i>
                          <span>Users</span>
                      </a>
                  </li>






                </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

          <?= $content


          ?>

          </section>
      </section>

      <!--main content end-->
  </section>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
