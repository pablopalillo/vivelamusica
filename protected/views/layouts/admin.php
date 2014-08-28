<?php /* @var $this Controller */ 
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=1024">
    <meta name="description" content="Es el momento para presentar tu propuesta artística y hacer parte de la programación cultural de la Feria de las Flores 2013. Este es el formulario para inscribirte como solista, con una agrupación o un colectivo.">
    <meta name="author" content="telemedellín">
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    <!--[if LTE IE 8]>
      <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" />
      <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.custom.95570.js"></script>
    <![endif]-->
    <style>
      body {
        padding-top: 60px;
        padding-bottom: 40px;
        padding-left: 20px;
        padding-right: 20px;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
       .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  </head>
  <body>
   <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="span12">

        <div class="nav-collapse collapse">
          <ul class="nav pull-left">
            <li><span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/propuestas/listar" id="backarr" title="Home"> <figure> </figure> </a> </span></li>
            <li class="active"><span><?php echo Yii::app()->name /*echo CHtml::link( Yii::app()->name , array('propuestas/listar'), array("class"=>"brand"))*/ ?> </span></li>
          </ul>

          <ul class="nav pull-right">
            <li class="active"><span><?php echo $this->user->username ?></span></li>
            <li class="divider"></li>
            <li><?php echo CHtml::link('Salir', array('site/logout')) ?></li>
          </ul>

        </div><!--/.nav-collapse -->


      </div>
    </div>
  </div>

    <div class="span11">
      <?php echo $content ?>
    </div>
    
  </body>
  <?php Yii::app()->clientScript->registerScriptFile("http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js", CClientScript::POS_HEAD) ?>    
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/bootstrap.js", CClientScript::POS_END) ?>      
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/bootbox.js", CClientScript::POS_END) ?>          
</html>
