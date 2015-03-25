<ul>
<?php
//SELECIONA A CATEGORIA E SETA O LIMITE
if($recuperar == 'destaque'){
   $limite = '0,3';
   $quando = 'novidades';
}else if($recuperar =='lista'){
	$limite = '3,5';
	$quando = 'novidades';
}else if($recuperar =='eventos'){
	$limite = '2';
	$quando = 'eventos';	
}else if($recuperar =='produtos'){
	$limite = '0,1';
	$quando = 'produtos';	
}

//RECUPERA AS NOTICIAS
$noticias = mysql_query("SELECT
						id,
						thumb, 
						titulo, 
						texto, 
						categoria, 
						data, 
						autor, 
						valor_real, 
						valor_pagseguro
						FROM up_posts
						WHERE categoria = '$quando'
						LIMIT $limite")

		or die(mysql_error());
if(@mysql_num_rows($noticias)<='0'){
	echo "Não encontramos noticias neste momento";
}else{
	
	$numero = '0';
	
	while($res_noticias=mysql_fetch_array($noticias)){
		
		$id_do_post = $res_noticias[0];
		$thumb = $res_noticias[1];
		$titulo = $res_noticias[2];
		$texto = $res_noticias[3];
		$categoria = $res_noticias[4];
		$data = $res_noticias[5];
		$autor = $res_noticias[6];
		$valor_real = $res_noticias[7];
		$valor_pagseguro = $res_noticias[8];
		$numero++
			
?>

<!-- LISTA AS NOTICIAS -->
<?php
if($recuperar =='destaque'){
?>
   <li>
        <img src="upload/<?php echo $categoria; ?>/<?php echo $thumb; ?>" alt="" width="500" height="300"/>
        <p><a href="index.php?topicos=nav/single&amp;topico=<?php echo $id_do_post; ?>"><strong><?php echo $titulo; ?></strong>, <?php echo strip_tags(trim(@str_truncate($texto, 140, $rep))); ?> </a></p>
   </li>
<?php
}else if($recuperar =='lista'){
?>	
<li>
  <a href="index.php?topicos=nav/single&amp;topico=<?php echo $id_do_post; ?>">
  <span><?php echo $numero; ?></span>
   <img src="upload/<?php echo $categoria; ?>/<?php echo $thumb; ?>" alt="<?php echo $titulo; ?>" width="120" height="70"/>
   <h1><?php echo $titulo; ?></h1>
   <p><?php echo strip_tags(trim(@str_truncate($texto, 75, $rep))); ?></p>
   <h2><?php echo date('d/m/Y',strtotime($data)); ?> por <?php echo $autor;?></h2>
  </a>
</li>
<?php
}else if($recuperar =='eventos'){
?>	
<li>
 <a href="index.php?topicos=nav/single&amp;topico=<?php echo $id_do_post; ?>">
 <img src="upload/<?php echo $categoria; ?>/<?php echo $thumb; ?>" alt="<?php echo $titulo; ?>" width="250" height="150"/>
 <p><?php echo strip_tags(trim(@str_truncate($texto, 350, $rep))); ?></p>
 </a>
</li>
<?php
}else if($recuperar =='produtos'){
?>
<!--<li>
   <a href="#">
   <img src="upload/<?php echo $categoria; ?>/<?php echo $thumb; ?>" alt="<?php echo $titulo; ?>" width="80" height="80"/>
   <p><strong><?php echo $titulo; ?></strong><?php echo $texto; ?></p>
   <span>R$<?php echo $valor_real; ?></span>
   </a>
 </li>-->



<?php
	}
}
?>

<?php
	}

?>        
</ul>

