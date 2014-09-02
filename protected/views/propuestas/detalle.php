<?php
/* @var $this AdministradorController */
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/jquery.fancybox/jquery.fancybox.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.fancybox/jquery.fancybox.pack.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript('fancybox', '$(".fancybox").fancybox();', CClientScript::POS_READY);
?>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="row-fluid">
        <div id="foto-perfil" class="span6">
            <?php 
              if( !empty($perfil->fotoses) ):
                foreach($perfil->fotoses as $foto): ?>
                <?php if( $foto->es_perfil): ?>
                  <img src="<?php echo $foto->src ?>" width="210" height="210" alt="<?php echo $perfil->nombre ?>" />
                <?php endif ?>
            <?php 
                endforeach; 
              else:
            ?>
                <img src="/files/default.jpg" width="210" height="210" alt="<?php echo $perfil->nombre ?>" />
          <?php endif; ?>
        </div><!--/span-->
        <div id="info-basica" class="span6">
            <h3><?php echo $perfil->propuestases[0]->nombre ?></h3><br/>
            <strong class="subtitle1">Subgénero:</strong> <span> <?php echo $perfil->propuestases[0]->subgenero ?></span> <br/><br/>
            <strong class="subtitle1">Número Integrantes:</strong> <?php echo $perfil->propuestases[0]->numero_integrantes ?><br/><br/>
            <strong class="subtitle1">Trayectoria:</strong> 
            <?php 
            switch ($perfil->propuestases[0]->trayectoria ) {
            	case '1':
            		echo "De 1 a 5 Años";
            		break;
            	case '2':
            		echo "De 5 a 10 Años";
            		break;
            	default:
            		echo "De 10 Años en adelante";
            		break;
            }
            ?><br/><br/>
         <!--   <strong>Valor Presentación:</strong> <?php //echo number_format($perfil->propuestases[0]->valor_presentacion,0) ?> -->
           <strong class="subtitle1">Facebook:</strong> <?php echo Yii::app()->format->formatUrl($perfil->redesHasPerfiles[1]->url) ?><br/><br/>
           <strong class="subtitle1">Twitter:</strong> <?php echo Yii::app()->format->formatUrl($perfil->redesHasPerfiles[0]->url) ?><br/><br/>
           <strong class="subtitle1">Sitio Web:</strong> <?php if( !empty($perfil->web) ):?><?php echo Yii::app()->format->formatUrl($perfil->web) ?><?php endif; ?><br/><br/>
        </div><!--/span-->
      </div><!--/row-->


      <div class="row-fluid">
        <div class="span12">
            <h3 class="tituloBackground">representante</h3>
        </div>
        <div class="span5">
          <strong class="subtitle2">Representante:</strong> <?php echo $perfil->propuestases[0]->representante ?><br/><br/>
          <strong class="subtitle2">Cédula:</strong> <?php echo $perfil->propuestases[0]->cedula ?><br/><br/>
          <strong class="subtitle2">Teléfono:</strong> <?php echo $perfil->propuestases[0]->telefono ?><br/><br/>
        </div>
        <div class="span5">
          <strong class="subtitle2">Email:</strong> <?php echo $perfil->propuestases[0]->email ?><br/><br/>
          <strong class="subtitle2">Celular:</strong> <?php echo $perfil->propuestases[0]->celular ?><br/><br/>
          <strong class="subtitle2">Dirección:</strong> <?php echo $perfil->propuestases[0]->direccion ?><br/><br/>
        </span>
      </div><!--/row-->

      <div class="row-fluid">
      	<div class="span12">
          <h3 class="tituloBackground">Reseña</h3>
      		<p class="res"> <?php echo $perfil->propuestases[0]->resena ?> </p>
      	</div>
      </div>   

      <div class="row-fluid">
      	<div class="span12">
      		 <h3 class="tituloBackground">Video</h3>
          		<?php
    			       $url = $perfil->propuestases[0]->video;
    			       preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
    			       if(isset($matches[1])):
    		    	   ?> 
    			          <iframe type="text/html" width="840" height="400" src="http://www.youtube.com/embed/<?php echo $matches[1] ?>?rel=0" frameborder="0"></iframe>		
    			       <?php endif; ?>
      	</div>

      	<?php if($perfil->areas_id === "1"): ?>

        	<div class="row-fluid">
            <div class="span12">
            		<h3 class="tituloBackground">Audios</h3>
            		<?php foreach($perfil->audioses as $audio): ?>

                      <div class="span5">
            		        <h6><?php echo $audio->nombre ?>.mp3</h6>
                  			<audio controls>
                  			  <source src="<?php echo Yii::app()->request->baseUrl.$audio->url ?>" type="audio/mpeg">
                  			  Su Navegador no soporta reproducción de audio. Actualicelo o descargue el archivo a su computado 
                  			  [<a href="<?php echo Yii::app()->request->baseUrl.$audio->url ?>" target="_BLANK">Descargar</a>]
                  			</audio>         		
                      </div>  

            		<?php endforeach; ?>
            </div> 		
        	</div>

      	<?php endif; ?>
      </div>

      <div class="row-fluid">
        <div class="span12">
            <h3 class="tituloBackground">Galería de la propuesta</h3>
            <div id="galeria">
                <?php 
                  if( !empty($perfil->fotoses) ):
                    foreach($perfil->fotoses as $foto): ?>
                    <?php if( !$foto->es_perfil): ?>
                      <a href="<?php echo $foto->src ?>" class="fancybox" rel="group" title="<?php echo $perfil->nombre ?>"><img src="<?php echo $foto->src ?>" width="140" height="117" alt="<?php echo $perfil->nombre ?>" class="img-rounded" /></a>
                    <?php endif ?>
                <?php 
                      endforeach;
                  endif; 
                  ?>
            </div>
        </div>
      </div>            
    </div><!--/span-->  	
<!--    <div class="span4">
      <div class="well sidebar-nav" id="calificador">
        <?php if($this->user->roles_id == "2"): ?>
          <?php if ($estaCalificada): ?>
        <ul class="nav nav-list calificador">          
          <?php $idCriterioActual = 0; ?>
          <?php $i=0; foreach($criterios as $criterio): ?>    

          <?php if($idCriterioActual !== $criterio->tipo_criterio_id): ?>
            <li class="nav-header"><?php echo $criterio->tipoCriterio->nombre ?></li>      
          <?php $idCriterioActual = $criterio->tipo_criterio_id ?>
          <?php endif; ?>
          <li>
            <span class="lista-criterios"><?php echo $criterio->titulo ?></span> 
            <h5 class="select-mini"><?php echo $puntajes[$i] ?></h5>
          </li>
          <?php $i++; endforeach; ?>   
          <li><button id="btnCalificar" class="btn btn-info centrar">Calificar</button></li>         
        </ul> 
          <?php else: ?>
        <div class="alert alert-info">
          <h6>La propuesta aún no ha sido calificada</h6>
        </div>
          <?php endif; ?>
        <?php else: ?>
          <?php if ($estaCalificada): ?>
        <ul class="nav nav-list calificador">          
          <?php $idCriterioActual = 0; ?>
          <?php $i=0; foreach($criterios as $criterio): ?>    

          <?php if($idCriterioActual !== $criterio->tipo_criterio_id): ?>
            <li class="nav-header"><?php echo $criterio->tipoCriterio->nombre ?></li>      
          <?php $idCriterioActual = $criterio->tipo_criterio_id ?>
          <?php endif; ?>
          <li>
            <span class="lista-criterios"><?php echo $criterio->titulo ?></span> 
            <h5 class="select-mini"><?php echo $puntajes[$i] ?></h5>
          </li>
          <?php $i++; endforeach; ?>   
          <li><button id="btnCalificar" class="btn btn-info centrar">Calificar</button></li>         
        </ul>          
          <?php else: ?>
        <ul class="nav nav-list calificador">          
          <?php $idCriterioActual = 0; ?>
          <?php foreach($criterios as $criterio): ?>    

          <?php if($idCriterioActual !== $criterio->tipo_criterio_id): ?>
            <li class="nav-header"><?php echo $criterio->tipoCriterio->nombre ?></li>      
          <?php $idCriterioActual = $criterio->tipo_criterio_id ?>
          <?php endif; ?>
          <li>
            <span class="lista-criterios"><?php echo $criterio->titulo ?></span> 
            <select class="select-mini" id="criterio_<?php echo $criterio->id ?>">
              <option></option>
              <option>0</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
            </select>
          </li>
          <?php endforeach; ?>   
          <li><button id="btnCalificar" class="btn btn-info centrar">Calificar</button></li>         
        </ul>  
          <?php endif; ?>      
        <?php endif; ?>
      </div>
    </div>
  </div>
-->
  <div class="row-fluid">
  	<div class="span12">
  		<h5>Rider Técnico</h5>
  		<embed src="<?php echo Yii::app()->request->baseUrl.$perfil->propuestases[0]->rider ?>" toolbar="0" width="100%" height="550">
  	</div>
  </div>  

  <hr>

</div>
<script type="text/javascript">
$(function(){
  $("#btnCalificar").click(function(){
    sinCalificar = 0;
    <?php foreach($criterios as $criterio): ?>   
    if(isEmpty($("#criterio_<?php echo $criterio->id ?>").val())){
      sinCalificar ++;
    }
    <?php endforeach; ?>

    if(sinCalificar > 0){
      bootbox.alert("Debe seleccionar todos los items a calificar.");
    }
    else{
      <?php $quotedUrl = $this->createUrl('propuestas/calificar'); ?>
      
      calificaciones = {
        idPropuesta: <?php echo $perfil->propuestases[0]->id ?>,
        calificaciones: [
        <?php foreach($criterios as $criterio): ?>
          {"id": "<?php echo $criterio->id ?>", "cal": $("#criterio_<?php echo $criterio->id ?>").val() },
        <?php endforeach ?>        
        ]
      };
      bootbox.confirm("¿Está seguro de guardar su calificación? Recuerde que no podrá modificarla", 'No', 'Si', function(result){
        if(result){
          $.ajax({
              type: "POST",
              url: "<?php echo $quotedUrl ?>",
              data: calificaciones,
              success: function(data) {
                $(".select-mini").attr("disabled","disabled");
                bootbox.alert("Se ha registrado su calificación de manera exitosa.");
              }
          });            
        }
      });
    }
  });
});

function isEmpty(valor){
  var str = valor;
  str = str.replace(/^\s*|\s*$/g,"");
  if(str.length < 1) {  
      return true;  
  }  
  return false; 
}
</script>