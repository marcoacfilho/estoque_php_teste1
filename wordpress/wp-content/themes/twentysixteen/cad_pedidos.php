
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		$titulo = "Controle &raquo; Cadastrar Produto";
		require_once ("includes/header.php"); 
	?>

</head>
<body>
			<?php 
				include('includes/topoemenu.php');
				require_once('includes/db.php');
				if ($_POST)
				{
					$prod = $_POST['produto'];
					$cliente = $_POST['cliente'];
					
					if ($prod == '' || $cliente == ''){
						$cad = 0;
						echo "<script>alert('Preencha todos os campos');</script>";
					}
					else					
						$cad = mysql_query ("INSERT INTO pedidos(CODPEDIDO,CODPRODUTO,CODCLIENTE) values(NULL,'$prod','$cliente') ") or die ("ERRO");	
					if ($cad != 0)
						echo "<script>alert('Cadastro foi efetuado com sucesso');</script>";			
				}
				$recupera1 = mysql_query("SELECT * FROM produtos") or die (mysql_error());
				$recupera2 = mysql_query("SELECT * FROM clientes") or die (mysql_error());

			 ?>


				
			
			<div id="principal">
				<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
					<fieldset>
						<legend class="titulo">Entrada de Pedidos &darr; </legend>
						<div class="col-md-12">
							<label>Produto</label>
							<select name ='produto'>
							<?php 
								while($sqlProdutoResultFim= mysql_fetch_assoc($recupera1))
								{
								?>
								<option value="<?=$sqlProdutoResultFim["CODPROD"]?>"> 
								<?=$sqlProdutoResultFim["NOME"]?> 
								</option>
								<?php
								}
							?>
							</select><br />
						</div>
						<div class="col-md-12">
							<label>Cliente</label>
							<select name ='cliente'>
							  <?php 
								while($sqlClienteResultFim= mysql_fetch_assoc($recupera2))
								{
								?>
								<option value="<?=$sqlClienteResultFim["CODIGO"]?>"> 
								<?=$sqlClienteResultFim["NOME"]?> 
								</option>
								<?php
								}
							?>
							</select><br />
						</div>
						
						<input class="botao" type="submit" name="enviar" value="Cadastrar" />
					</fieldset>				
				</form>
			</div> <!-- Fim da div#principal -->
			
			<?php include('includes/fimerodape.php'); ?>
			
</body>
</html>