<div id="page_content">

	<div id="page">
<?php

$topico = $_GET['topico'];
$noticias = mysql_query("SELECT 
						thumb, 
						titulo, 
						texto, 
						categoria,
						data, 
						autor, 
						valor_real, 
						valor_pagseguro,
						visitas
						FROM up_posts
						WHERE id = '$topico'")

		or die(mysql_error());
if(@mysql_num_rows($noticias)<='0'){
	echo "Não encontramos noticias neste momento";
}else{
	
	$numero = '0';
	
	while($res_noticias=mysql_fetch_array($noticias)){
		
		$thumb = $res_noticias[0];
		$titulo = $res_noticias[1];
		$texto = $res_noticias[2];
		$categoria = $res_noticias[3];
		$data = $res_noticias[4];
		$autor = $res_noticias[5];
		$valor_real = $res_noticias[6];
		$valor_pagseguro = $res_noticias[7];
		$visitas = $res_noticias[8];
		$numero++
			
?>
    	<h1><?php echo $titulo;?></h1>
        
        <span class="info">Data: <?php echo date('d/m/Y - H:m', strtotime($data))?> | Autor: <?php echo $autor;?> | Categoria: <?php echo $categoria;?> | Visitas: <?php echo $visitas;?></span>
        
        <a href="uploads/<?php echo $categoria; ?>/<?php echo $thumb; ?>" rel="shadowbox">
        <img src="upload/<?php echo $categoria; ?>/<?php echo $thumb; ?>" class="alinright" alt="" width="250"/>
        </a>
        <?php echo $texto;?>



<?php
  }
}
?>
  
      
      
	</div><!--page-->
    
    <div id="academia">
      <!--<img src="../images/academia.jpg" alt="" width="250" height="471"/>-->
    </div><!--imagem academia-->

</div><!--page_content-->
<?php

$add_visitas = $visitas + 1;
$up_visitas = mysql_query("UPDATE up_posts SET visitas ='$add_visitas' WHERE id = '$topico'")

?>