<?php

include ('conbd.php');

$sqlCategorias = "SELECT * FROM categorias";
$resultCat= $con->query($sqlCategorias);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Relatório com FPDF</title>
  </head>
  <body>
    <h1>Relatórios com Banco de Dados</h1>
	
	<div class="container">
		<form action="" method="POST">
			  <div class="form-group">
				<label for="">Categorias</label>
				<select name="cat" class="custom-select my-1 mr-sm-2" required">
					<option value="">Selecionar</option>
					<?php foreach($resultCat as $cat){ ?>
						<option value="<?php echo $cat['IdCategoria'];?>"><?php echo $cat['NombreC'];?></option>
					
					<?php } ?>
					
				</select>
			  </div>
							 
			  <button type="submit" name="mostrar" class="btn btn-primary">Mostrar</button>

			</form>
			
			<?php 
				if(isset($_POST['mostrar'])){
					$catSelecionada = $_POST['cat'];
					
					$sqlProdutos = "SELECT p.CodigoP,p.NombreP, p.Precio, c.IdCategoria FROM productos AS p INNER JOIN categorias AS c ON p.IdCategoria = c.IdCategoria WHERE c.IdCategoria = $catSelecionada";
					$resultProdutos = $con->query($sqlProdutos);
				
			?>
			
			<div class="container">
				<table class="table">
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Produto</th>
					  <th scope="col">Preço</th>
					 
					</tr>
				  </thead>
				  <tbody>
				  <?php
					while($registro = $resultProdutos->fetch_array(MYSQLI_BOTH)){
						echo "
						<tr>
						  <td>" . $registro['CodigoP'] . "</td>
						  <td>" . $registro['NombreP'] . "</td>
						  <td>" . $registro['Precio'] . "</td>
						</tr>";
					}
					$con->close();
				  ?>
					
					
				  </tbody>
				</table>
				
				<a href="../relatoriobd.php?idCat=<?php echo $catSelecionada ?>" class="button" target="_blank"><button type="button" class="btn btn-secondary">PDF</button> </a>
				
				<?php  } else { ?>
					  <div class="alert alert-danger" role="alert">Selecione uma categoria</div>
				<?php } ?>
			</div>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>