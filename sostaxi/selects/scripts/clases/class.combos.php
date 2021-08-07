<?php

class selects extends MySQL
{
	var $code = "";
	
	function cargarregiones()
	{
		$consulta = parent::consulta("SELECT region,descripcion FROM regiones ORDER BY region ASC");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$regiones = array();
			while($registro_pais = parent::fetch_assoc($consulta))
			{
				$code = $registro_pais["region"];
				$name = $registro_pais["descripcion"];				
				$regiones[$code]=$name;
			}
			return $regiones;
		}
		else
		{
			return false;
		}
	}
	function cargarcomunas()
	{
		$consulta = parent::consulta("SELECT comunas FROM comuna WHERE reg = '".$this->code."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$comunas = array();
			while($estado = parent::fetch_assoc($consulta))
			{
				$name = $estado["comunas"];				
				$comunas[$name]=$name;
			}
			return $comunas;
		}
		else
		{
			return false;
		}
	}
		
	function cargarlineas()
	{
		$consulta = parent::consulta("SELECT responsable_servicio,nombre_fantasia FROM lineas WHERE id_region = '".$this->code."' order by responsable_servicio");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$lineas = array();
			while($ciudad = parent::fetch_assoc($consulta))
			{
				if ($ciudad["nombre_fantasia"]<>'') {
					$name = $ciudad["nombre_fantasia"];
				}else{
					$name = $ciudad["responsable_servicio"];				
				}
				$lineas[$name]=$name;
			}
			return $lineas;
		}
		else
		{
			return false;
		}
	}		
}
?>