<div id="page_content">



	<div id="page">
    <?php
@$pagina = $_GET['pagina'];


$pagina_sql = mysql_query("SELECT
					  id,
					  pagina,
					  content
					  FROM up_page
					  WHERE pagina = '$pagina'")
or die(mysql_error());
if(@mysql_num_rows($pagina_sql) <= '0'){
	echo "Erro ao selecionar a página";
}else{
while($res_pagina=mysql_fetch_array($pagina_sql)){
	$id = $res_pagina[0];
	$pagina = $res_pagina[1];
	$content = $res_pagina[2];
?>
    	<h1><?php echo $pagina;?></h1>
        <?php echo $content;?>



<?php
  }
}
?>
  
      
      
	</div><!--page-->
    
    <div id="academia">
      <!--<img src="../images/academia.jpg" alt="" width="250" height="471"/>-->
    </div><!--imagem academia-->

</div><!--page_content-->