		<script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $('#datatables').dataTable({
                    "sPaginationType":"two_button",//or "full_numbers"
                    "aaSorting":[[2, "desc"]],
                    "bJQueryUI":true
                    //Este plugin permite iniciar la busqueda mediante una palabra
                    //"oSearch": {"sSearch": "a"}
                    //Esta pugin te permite cargar datos desde otra fuente
                    //"sAjaxSource": "http://www.sprymedia.co.uk/dataTables/json.php"
                   
                });
            });
			
			


        </script>
        
<?php
	include("mysql.inc.php");
	
	$db = new MySQL();
	$listar= $db ->consulta("SELECT descripcion, nombre, tipo, id_files  FROM tbl_temp_files WHERE id_Oirs='".$_GET['id_Oirs']."' ");

if($db->num_rows($listar)>0){ ?>
	<table cellpadding="0" cellspacing="0" border="0" id="datatables" class="display">
		<thead>
			<tr>
				<td>Descripcion</td>
				<td width="50">Tipo</td>
				<td width="100">Acciones</td>
			</tr>
		</thead>
		<tbody>
		<?php while($row=($db->fetch_array($listar))){ ?>
			<tr class="odd gradeA">

				<td><?php echo $row['descripcion']?></td>
                
				<?php switch ($row['tipo']) {
						case 'pdf':
								echo"<td><a target='_Blank' href='uploads/".$row['nombre']."'><img src='img/file_pdf.png' width='50' height='70'></a></td>";
							break;
						case 'docx':
								echo"<td><a target='_Blank' href='uploads/".$row['nombre']."'><img src='img/file_doc.png' width='50' height='70'></a></td>";
							break;
						case 'xlsx':
								echo"<td><a target='_Blank' href='uploads/".$row['nombre']."'><img src='img/file_xls.png' width='50' height='70'></a></td>";
							break;
						case 'html':
								echo"<td><a target='_Blank' href='uploads/".$row['nombre']."'><img src='img/file_html.png' width='50' height='70'></a></td>";
							break;
						case 'txt':
								echo"<td><a target='_Blank' href='uploads/".$row['nombre']."'><img src='img/file_txt.png' width='50' height='70'></a></td>";
							break;
						case 'zip':
								echo"<td><a target='_Blank' href='uploads/".$row['nombre']."'><img src='img/file_zip.png' width='50' height='70'></a></td>";
							break;
								
						default:
								echo"<td><img border=\"0\" src=\"uploads/".$row['nombre']."\" width='50' height='70'></a></td>";
							break;
						} ?>
                        
				<td>
                <?php if ($row['tipo']=='jpg'){ ?>
                	<a target="_blank" href="uploads/<?php echo $row['nombre']; ?>" title="Ver Archivo" class="icon-ver info-tooltip2"></a>
                 <?php }?>
                    <a href="descargar.php?archivo=<?php echo $row['nombre']; ?>" title="Descargar Archivo" class="icon-down info-tooltip2"></a>
                   <?php $ubicacion = 'upload_main.php?id_Oirs='.$_GET['id_Oirs'].'&idUsuario='.$_GET['idUsuario'].'&del='.$row['id_files'];?>
					<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Archivo" class="icon-borrar info-tooltip2"></a>
                    
                    
                    
                    
                </td>
			</tr>
				<?php }	
			echo '<tbody>';
	echo '</table>';	
	echo "</form>";
}else{
	echo"<div id='mensajevacio' align=\"center\">No hay archivos por el momento</div>";
}
?>