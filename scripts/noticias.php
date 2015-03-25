<ul>
<?php
//SELECIONA A CATEGORIA E SETA O LIMITE
if($recuperar == 'destaque'){
   $limite = '3';
   $quando = 'novidades';
}else if($recuperar =='lista'){
	$limite = '3,5';
	$quando = 'novidades';
}else if($recuperar =='cursos'){
	$limite = '3';
	$quando = 'cursos';	
}else if($recuperar =='produtos'){
	$limite = '16';
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
						ORDER BY data DESC
						LIMIT $limite")
            or die(mysql_error());
if(@mysql_num_rows($noticias) <= '0'){
	echo "Noticias não encontradas";
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
		$numero++;
		
		$pega_autor = mysql_query("SELECT nome FROM up_users WHERE id = '$autor'")
	                  or die(mysql_error());
	 if(@mysql_num_rows($pega_autor) <= '0') echo 'Erro ao selecionar o usuario';
	 else{
		 
		 while($res_autor=mysql_fetch_array($pega_autor)){
			 
			 $autor_do_post = $res_autor[0];
		
		
?>

<!-- LISTA AS NOTICIAS -->
<?php
if($recuperar =='destaque'){
?>
 <li>          
   <img src="uploads/<?php echo $categoria; ?>/<?php echo $thumb; ?>" alt="<?php echo $titulo; ?>" width="500" height="300"/>
     <p>          
      <a href="index.php?topicos=nav/single&amp;topico=<?php echo $id_do_post; ?>">
       <h1><?php echo $titulo; ?></h1>
          <?php echo strip_tags(trim(@str_truncate($texto, 140, $rep))); ?>
      </a>
     </p>
 </li>
<?php
}else if($recuperar =='lista'){
?>
<li>
  <a href="index.php?topicos=nav/single&amp;topico=<?php echo $id_do_post; ?>">
   <span><?php echo $numero; ?></span>
    <img src="uploads/<?php echo $categoria; ?>/<?php echo $thumb; ?>" alt="<?php echo $titulo; ?>" width="125" height="75"/>
     <h1><?php echo $titulo; ?></h1>
      <p><?php echo strip_tags(trim(@str_truncate($texto, 75, $rep))); ?></p>
       <h2><?php echo date('d/m/Y',strtotime($data)); ?> Por <?php echo $autor_do_post; ?></h2>
  </a>
</li>
<?php
}else if($recuperar =='cursos'){
?>
<li>
 <a href="index.php?topicos=nav/single&amp;topico=<?php echo $id_do_post; ?>">
  <img src="uploads/<?php echo $categoria; ?>/<?php echo $thumb; ?>" alt="<?php echo $titulo; ?>" width="250" height="150"/>
    <p>
    <strong><?php echo $titulo; ?></strong>
    <?php echo strip_tags(trim(@str_truncate($texto, 350, $rep))); ?></p>
  </a>
</li>
<?php
}else if($recuperar =='produtos'){
?>
<li>
	<a href="index.php?topicos=nav/single&amp;topico=<?php echo $id_do_post; ?>">
		<img src="uploads/<?php echo $categoria; ?>/<?php echo $thumb; ?>" alt="<?php echo $titulo; ?>" width="80" height="100" />
			<p><strong class="titulo_loja"><?php echo $titulo; ?></strong> - <?php echo strip_tags(trim(@str_truncate($texto, 35, $rep))); ?></p>
			<span>R$<?php echo $valor_real; ?></span>              
	</a>
</li>
<?php
}
?>
<?php
    }
}
?>
<?php
    }
}
?>
</ul>