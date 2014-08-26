<?php
/* @var $this DirectorioController */
$this->pageTitle = Yii::app()->name . ' - Resultados de búsqueda';
$this->breadcrumbs = array('Resultados de búsqueda');
$np  = count($perfiles);
$bu  = Yii::app()->homeUrl;
$url = CHtml::normalizeUrl( $bu . 'busqueda?artista=' . $termino );
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.scrollTo-1.4.3.1-min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript(
	'cargar-mas', 
	'	var perfiles = $("#perfiles");
	var	pagina 	 = '.($pagina+1).';
	var np 		 = ' . $np . '	  ;

	if(np >= 12)
	{
		perfiles.append("<a href=\''.$url.'&page='.($pagina+1).'\' class=\'cargar-mas btn btn-large btn-block btn-primary clear\'>Cargar más</a>");
	}	
	
	$(".cargar-mas").on("click", cargar_mas);

	function cargar_mas(e)
	{
		e.preventDefault();
		$.get( 
			"'.$url.'", 
			{page:pagina}, 
			function(data){
				var datos = data;
				console.log( datos );
				if(Object.keys(datos.perfiles).length >= 12){
					pagina = parseInt(datos.pagina)+1;
					var link = $(".cargar-mas").attr("href");
					link = link.trim();
					link = link.substr(0, link.length-1);
					link += pagina;
					$(".cargar-mas").attr("href", link);
				}else{
					$(".cargar-mas").off("click", cargar_mas).remove();
				}
				cargar_perfiles(datos);
			}
		);
		
	}//cargar-mas

	function cargar_perfiles(data)
	{
		perfiles.append("<div class=\'pagina clear\' id=\'pagina"+parseInt(data.pagina)+"\'>Página "+parseInt(data.pagina)+"</div>");
		$.each(data.perfiles, function(index, value){
			//console.log(value);
			var url = "'.$bu.'"+data.categoria;
			if(value.propuestas[0].subgenero) url += "/"+value.propuestas[0].subgenero;
			url += "/"+value.slug;
			var html = "";
			html += "<div class=\'perfil\'>";
			html += "	<div class=\'categoria\'>";
			html += "		<span class=\'"+data.categoria+"\'>"+data.categoria+"</span>";
			if(value.propuestas){
				if(value.propuestas[0].subgenero){
					if(value.propuestas[0].subgenero.length > 18)
						html += "		<span>"+value.propuestas[0].subgenero.substring(0, 15)+"...</span>";
					else
						html += "		<span>"+value.propuestas[0].subgenero+"</span>";
				}
			}
			html += "	</div>";
			if(value.fotos)
			{
				$.each(value.fotos, function(i, v){
					if(v.es_perfil == "1")
						html += "	<img src=\'"+v.url+"\' width=\'174\' height=\'145\' alt=\'"+value.nombre+"\' class=\'img-rounded\' />";
				});
			}
			else html += "	<img src=\'/files/default.jpg\' width=\'174\' height=\'145\' alt=\'"+value.nombre+"\' class=\'img-rounded\' />";
			html += "	<div class=\'nombre\'>";
			html += "		<h3>";
			html += "		<a href=\'"+url+"\'>"+value.nombre+"</a>";
			html += "		</h3>";
			html += "	</div>";
			html += "</div>";
			
			perfiles.append( html );
		});
		if ($(".cargar-mas").length > 0){
		  $(".cargar-mas").remove().insertAfter( $(".perfil:last") );
		  $(".cargar-mas").on("click", cargar_mas);
		}
		$.scrollTo("#pagina"+parseInt(data.pagina), {duration:1000});
		
	}//cargar-perfiles
	', 
	CClientScript::POS_READY
);
?>
<h2>Resultados de búsqueda para "<?php echo $termino; ?>"</h2>
<div id="perfiles">
	<?php if( $np ): ?>
	<?php foreach($perfiles as $perfil): ?>
		<?php $this->renderPartial( '_perfil' , array( 'perfil' => $perfil ) );?>
	<?php endforeach; ?>
	<?php else: ?>
		<p>¡Ooops! No hemos encontrado artistas, puedes usar el menú o el buscador para ver otros artístas.</p>
	<?php endif; ?>
</div>