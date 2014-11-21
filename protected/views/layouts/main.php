<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="language" content="en"/>
  <!-- blueprint CSS framework -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection"/>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print"/>
  <!--[if lt IE 8]>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection"/>
  <![endif]-->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
  <? Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
  <? Yii::app()->getClientScript()->registerCoreScript('jquery.ui'); ?>

  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
  <div class="container" id="page">
    <div id="header" class="clearfix">
      <div class="left">
        <div id="logo">
          <a href="/"></a>
        </div>
        <div class="menus">
          <div id="mainmenu">
            <?php $this->widget('zii.widgets.CMenu', array(
              'items' => array(
                array('label' => 'Home', 'url' => array('/site/index')),
                array(
                  'label' => 'About',
                  'url' => array('/site/page', 'view' => 'about')
                ),
                array('label' => 'Contact', 'url' => array('/site/contact')),
                array(
                  'label' => 'Login',
                  'url' => array('/site/login'),
                  'visible' => Yii::app()->user->isGuest
                ),
                array(
                  'label' => 'Logout (' . Yii::app()->user->name . ')',
                  'url' => array('/site/logout'),
                  'visible' => !Yii::app()->user->isGuest
                )
              ),
            )); ?>
          </div>
          <!-- mainmenu -->
          <ul class="service-menu">
            <li class="add-service"><a href="">Добавить сервисный центр или мастера</a></li>
            <li class="ask"><a href="">Задать вопрос специалистам</a></li>
          </ul>
        </div>
      </div>
      <div class="right">
        <div class="header-info-block">
          <div class="inner">
            <div class="searchblock">
              <div class="search-wrap">
                <div id="tabs">
                  <ul class="search-list">
                    <li><a href="#tab1">поиск</a></li>
                    <li><a href="#tab2">города</a></li>
                    <li><a href="#tab3">производители</a></li>
                    <li><a href="#tab4">категории</a></li>
                    <li><a href="#tab5">F.A.Q.</a></li>
                  </ul>
                  <div class="form-wrap">
                    <div id="tab1">
                      <form action="">
                        <div class="row">
                          <select name="" id="">
                            <option>Укажите Город</option>
                            <option>Укажите Город</option>
                            <option>Укажите Город</option>
                          </select>
                        </div>
                        <div class="row">
                          <select name="" id="">
                            <option>Выберите категорию</option>
                            <option>Выберите категорию</option>
                            <option>Выберите категорию</option>
                          </select>
                        </div>
                        <div class="row">
                          <select name="" id="">
                            <option>Выберите производителя</option>
                            <option>Выберите производителя</option>
                            <option>Выберите производителя</option>
                          </select>
                        </div>
                        <div class="row">
                          <button type="submit">Найти &raquo;</button>
                        </div>
                      </form>
                    </div>
                    <div id="tab2">
<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id condimentum leo. Vivamus quis diam eros. Vestibulum eu ex nec ligula lacinia posuere sit amet eget erat. Suspendisse potenti. Curabitur vel orci congue, pharetra orci a, laoreet justo. Proin tempus odio eu nisi finibus, id viverra risus pretium. Fusce ac nisi ut nunc eleifend dictum. Sed tempus luctus egestas. Pellentesque consectetur diam a accumsan imperdiet. Phasellus faucibus justo lorem, ut mattis metus maximus vitae. Sed at libero arcu. Etiam dapibus tortor vitae lorem luctus aliquet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In tortor eros, pulvinar in cursus ac, posuere hendrerit est. Nulla ut nunc vehicula, dictum orci ut, fermentum risus. Quisque nisi nisi, dapibus non nunc sed, posuere imperdiet velit.
</p>
                    </div>
                    <div id="tab3">
<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id condimentum leo. Vivamus quis diam eros. Vestibulum eu ex nec ligula lacinia posuere sit amet eget erat. Suspendisse potenti. Curabitur vel orci congue, pharetra orci a, laoreet justo. Proin tempus odio eu nisi finibus, id viverra risus pretium.
</p>
                    </div>
                    <div id="tab4">
<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id condimentum leo. Vivamus quis diam eros. Vestibulum eu ex nec ligula lacinia posuere sit amet eget erat. Suspendisse potenti. Curabitur vel orci congue, pharetra orci a, laoreet justo. Proin tempus odio eu nisi finibus, id viverra risus pretium. Fusce ac nisi ut nunc eleifend dictum. Sed tempus luctus egestas. Pellentesque consectetur diam a accumsan imperdiet.
</p>
                    </div>
                    <div id="tab5">
<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id condimentum leo. Vivamus quis diam eros. Vestibulum eu ex nec ligula lacinia posuere sit amet eget erat. Suspendisse potenti. Curabitur vel orci congue, pharetra orci a, laoreet justo. Proin tempus odio eu nisi finibus, id viverra risus pretium. Fusce ac nisi ut nunc eleifend dictum. Sed tempus luctus egestas. Pellentesque consectetur diam a accumsan imperdiet. Phasellus faucibus justo lorem, ut mattis metus maximus vitae. Sed at libero arcu. Etiam dapibus tortor vitae lorem luctus aliquet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In tortor eros, pulvinar in cursus ac, posuere hendrerit est.
</p>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- header -->
    <?php if (isset($this->breadcrumbs)): ?>
      <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'links' => $this->breadcrumbs,
      )); ?><!-- breadcrumbs -->
    <?php endif ?>


    <div class="wrapper">
      <div class="row row-grey clearfix">
        <div class="left">
          <div class="box search decored">
            <input placeholder="Поиск..." type="text"/>
          </div>
          <div class="box">
            <h3>Лучшие эксперты:</h3>
            <a class="row">
              <span class="name">Просто сервис</span>
              <span class="reviews-count">2 745 736</span>
            </a>
            <a class="row">
              <span class="name">Просто сервис</span>
              <span class="reviews-count">2 745 736</span>
            </a>
            <a class="row">
              <span class="name">Просто сервис</span>
              <span class="reviews-count">2 745 736</span>
            </a>
            <a class="row">
              <span class="name">Просто сервис</span>
              <span class="reviews-count">2 745 736</span>
            </a>
            <a class="row">
              <span class="name">Просто сервис</span>
              <span class="reviews-count">2 745 736</span>
            </a>
            <a class="row">
              <span class="name">Сервисный центр ДЕМАЛ Перово</span>
              <span class="reviews-count">2 745 736</span>
            </a>
            <a class="row">
              <span class="name">Просто сервис</span>
              <span class="reviews-count">2 745 736</span>
            </a>
            <a class="row">
              <span class="name">Просто сервис</span>
              <span class="reviews-count">2 745 736</span>
            </a>
            <a class="row">
              <span class="name">Просто сервис</span>
              <span class="reviews-count">2 745 736</span>
            </a>
            <a class="row">
              <span class="name">Просто сервис</span>
              <span class="reviews-count">2 745 736</span>
            </a>
            <a class="row">
              <span class="name">Просто сервис</span>
              <span class="reviews-count">2 745 736</span>
            </a>
            <a class="row">
              <span class="name">Просто сервис</span>
              <span class="reviews-count">2 745 736</span>
            </a>
          </div>
          <div class="box">
            <h3>Популярные вопросы:</h3>
            <div class="box">
              <div class="published">

              </div>
              <div class="title">

              </div>
            </div>
          </div>
        </div>
        <div class="right">
          <?php echo $content; ?>
        </div>
      </div>
      <div class="row row-white clearfix">

      </div>

    </div>
    <div class="clear"></div>
    <div id="footer">
      <table class="footer-cols">
        <tr>
          <td>
            <h3>Проект</h3>
            <ul class="menu">
              <li><a href="">Главная</a></li>
              <li><a href="">Новости</a></li>
              <li><a href="">Обратная связь</a></li>
              <li><a href="">Пользовательское соглашение</a></li>
              <li><a href="">Оказание возмездных услуг</a></li>
            </ul>
          </td>
          <td>
            <h3>Каталог сервисов и мастеров</h3>
            <ul class="menu">
              <li><a href="">Добавить частного мастера / сервисный центр</a></li>
              <li><a href="">Модерация</a></li>
              <li class="active"><a href="">Продвижение объявления</a></li>
              <li><a href="">Реклама на сайте</a></li>
            </ul>
          </td>
          <td>
            <h3>Вопросы и ответы</h3>
            <ul class="menu">
              <li><a href="">Вопросы и ответы, проблемы и решения</a></li>
              <li><a href="">Задать вопрос мастерам</a></li>
            </ul>
          </td>
          <td>
            <div class="copy-wrap">
              <h3>«MEGA-MASTER.RU»</h3>
              <span class="copy">© 2014</span>
            </div>
            <ul class="social">
              <li><a class="vk" href=""></a></li>
              <li><a class="od" href=""></a></li>
              <li><a class="fb" href=""></a></li>
              <li><a class="tw" href=""></a></li>
              <li><a class="gl" href=""></a></li>
            </ul>
          </td>
        </tr>
      </table>
    </div>
    <!-- footer -->
  </div>
<!-- page -->

<script>
  $(function() {
    $( "#tabs" ).tabs({
      show: function(event, ui) {
        var $target = $(ui.panel);

        $('.content:visible').effect(
          'explode',
          {},
          1000,
          function(){
            $target.fadeIn();
          });
      }
    });
  });
</script>
</body>
</html>
