<?php
date_default_timezone_set('America/Bogota');
$archivo = 'Teatro_' .date('Y-m-d_H-i-s') .".xls";
header('Content-type: application/vnd.ms-excel; charset=UTF-8');
header("Content-Disposition: attachment; filename=" . $archivo);
header("Pragma: no-cache");
header("Expires: 0");
?>
<table>
	<tr>
		<td>ID</td>
		<td>Nombre</td>
		<td>Nombre Propuesta</td>
		<td>Representante<td>
		<td>C&eacute;dula Representante</td>
		<td>Tel&eacute;fono</td>
		<td>Celular</td>
		<td>Email</td>
		<td>Direcci&oacute;n</td>
		<td>Trayectoria</td>
		<td># Integrantes</td>
		<td>Valor Presentaci&oacute;n</td>
		<td>&Aacute;rea</td>
		<td>Actuaci&oacute;n (Fuerza Interpretativa)</td>
		<td>Adaptaci&oacute;n</td>
		<td>Montaje</td>
		<td>Repertorio</td>
		<td>Lenguaje del Contenido</td>
		<td>Originalidad</td>
		<td>Reconocimiento Art&iacute;stico</td>
		<td>Proyecci&oacute;n e Identidad Cultural</td>
		<td>Viabilidad Econ&oacute;mica</td>
		<td>Viabilidad Esc&eacute;nica</td>
		<td>Total</td>
	</tr>
	<?php foreach($perfiles as $perfil): ?>
	<tr>		
		<td><?php echo $perfil->id ?></td>
		<td><?php echo utf8_decode($perfil->nombre) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->nombre) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->representante) ?><td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->cedula) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->telefono) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->celular) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->email) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->direccion) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->trayectoria) ?></td>
		<td><?php echo utf8_decode($perfil->propuestases[0]->numero_integrantes) ?></td>
		<td><?php echo number_format($perfil->propuestases[0]->valor_presentacion) ?></td>
		<td>Teatro</td>
		<?php $suma = 0; ?>
		<td><?php $class = new CriterioHasPropuestas; $p = $class::model()->find("criterio_id=21 AND propuestas_id=".$perfil->propuestases[0]->id); echo $p->puntaje; $suma += $p->puntaje; ?></td>
		<td><?php $class = new CriterioHasPropuestas; $p = $class::model()->find("criterio_id=22 AND propuestas_id=".$perfil->propuestases[0]->id); echo $p->puntaje; $suma += $p->puntaje; ?></td>
		<td><?php $class = new CriterioHasPropuestas; $p = $class::model()->find("criterio_id=23 AND propuestas_id=".$perfil->propuestases[0]->id); echo $p->puntaje; $suma += $p->puntaje; ?></td>
		<td><?php $class = new CriterioHasPropuestas; $p = $class::model()->find("criterio_id=24 AND propuestas_id=".$perfil->propuestases[0]->id); echo $p->puntaje; $suma += $p->puntaje; ?></td>
		<td><?php $class = new CriterioHasPropuestas; $p = $class::model()->find("criterio_id=25 AND propuestas_id=".$perfil->propuestases[0]->id); echo $p->puntaje; $suma += $p->puntaje; ?></td>
		<td><?php $class = new CriterioHasPropuestas; $p = $class::model()->find("criterio_id=26 AND propuestas_id=".$perfil->propuestases[0]->id); echo $p->puntaje; $suma += $p->puntaje; ?></td>
		<td><?php $class = new CriterioHasPropuestas; $p = $class::model()->find("criterio_id=27 AND propuestas_id=".$perfil->propuestases[0]->id); echo $p->puntaje; $suma += $p->puntaje; ?></td>
		<td><?php $class = new CriterioHasPropuestas; $p = $class::model()->find("criterio_id=28 AND propuestas_id=".$perfil->propuestases[0]->id); echo $p->puntaje; $suma += $p->puntaje; ?></td>
		<td><?php $class = new CriterioHasPropuestas; $p = $class::model()->find("criterio_id=29 AND propuestas_id=".$perfil->propuestases[0]->id); echo $p->puntaje; $suma += $p->puntaje; ?></td>
		<td><?php $class = new CriterioHasPropuestas; $p = $class::model()->find("criterio_id=30 AND propuestas_id=".$perfil->propuestases[0]->id); echo $p->puntaje; $suma += $p->puntaje; ?></td>		
		<td><?php echo $suma ?></td>
	</tr>
	<?php endforeach; ?>	
<table>