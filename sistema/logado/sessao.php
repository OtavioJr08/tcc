<?php 

    include_once("php_log/conexaoBD.php");

	$id_categoria = $_REQUEST['idDisc'];
	
	$result_sub_cat = "SELECT * FROM sessao WHERE fk_idDisciplina=$id_categoria ORDER BY nomeSessao";
	$resultado_sub_cat = $conector->query($result_sub_cat);
	
	while ($row_sub_cat = $resultado_sub_cat->fetch_array()) {
		$sub_categorias_post[] = array(
			'idSessao'	=> $row_sub_cat['idSessao'],
			'nomeSessao' => $row_sub_cat['nomeSessao'],
		);
	}
	
	echo(json_encode($sub_categorias_post));
?>