<?php /* @var $this Controller */ 
Yii::app()->clientScript->registerScriptFile("http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/bootstrap.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/vendor/jquery.ui.widget.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/tmpl.min.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/load-image.min.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/canvas-to-blob.min.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/jquery.iframe-transport.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/jquery.fileupload.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/jquery.fileupload-process.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/jquery.fileupload-resize.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/jquery.fileupload-validate.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.fileupload/jquery.fileupload-ui.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/app.js", CClientScript::POS_END);
?>
<!DOCTYPE html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=1024">
    <meta name="description" content="La Alcaldía de Medellín, invita a los artistas, entidades y agrupaciones locales a inscribir sus propuestas en el proceso de selección para la programación del Festival Medellín Vive la Música.">
    <meta name="author" content="telemedellín">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/base.css" />  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link href='http://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>

  </head>
  <body>
      <header>
        <div class="contenedor-header">
          <h1>
             Medellín vive la mùsica        
          </h1>
          <div class="fechas">
            <div class="item-fecha">
              <span class="tit-fechas"> INICIO INSCRIPCIÓN </span class="tit-fechas">
              <span class="tex-fechas">1 de septiembre<span>
            </div>
            <div class="item-fecha">
              <span class="tit-fechas"> FINALIZACIÓN INSCRIPCIÓN  </span class="tit-fechas">
              <span class="tex-fechas">12 de septiembre</span>
            </div>
            <div class="item-fecha">
               <span class="tit-fechas"> RESULTADOS  </span class="tit-fechas">
              <span class="tex-fechas">16 de septiembre</span>
            </div>
          </div>
          <h2> INSCRIPCIÓN ARTISTAS</h2>
        </div>
      </header>

      <div class="container">
        <?php echo $content ?>
      </div>

      <footer>
        <div class="content">
          <ul class="logos-patrocinadores">
            <li> <a src="#" class="fondo-med">Fondo Medellín ciudad para la vida</a>  </li>
            <li> <a src="#" class="alcaldia">Alcaldía de Medellín</a> </li>
            <li> <a src="#" class="med-musica">Medellín vive la música</a> </li>
          </ul>
        </div>
      </footer>

      <input type="hidden" value="<?php echo Yii::app()->request->baseUrl ?>" id="PUBLIC_PATH"/>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-41382664-3', 'directorioartisticomedellin.com');
      ga('send', 'pageview');
    </script> 
  </body>
</html>
