<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Alteração de Cadastro</title>
  <body>
    <?php
    include "conexao.php";
      $id = $_GET['id'] ?? '';
      $sql = "SELECT * FROM pessoas WHERE cod_pessoa = $id";
      $dados = mysqli_query($conn, $sql);


      $linha = mysqli_fetch_assoc($dados);
    ?>
      <div class='container'>
          <div class='row'>
            <div class='col'>
              <h1>Cadastro</h1>
              <form action="edit_script.php" method="POST"> 

                <div class="mb-3">
                  <label for="nome" class="form-label">Nome completo</label>
                  <input type="text" class="form-control" placeholder="Ex: Rycherd Dionizo" name="nome" required value="<?php echo $linha['nome'] ?>">
                </div>

                <div class="mb-3">
                  <label for="endereco" class="form-label">Endereço</label>
                  <input type="text" class="form-control" placeholder="Ex: R.Liberdade, 651 - Canoas" name="endereco" value="<?php echo $linha['endereco']?>">
                </div>

                <div class="mb-3">
                  <label for="telefone" class="form-label">Telefone</label>
                  <input type="text" class="form-control" placeholder="Ex: (51)99449-7442" name="telefone" value="<?php echo $linha['telefone']?>">
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" placeholder="Ex: rycherdd@gmail.com" name="email" value="<?php echo $linha['email']?>">
                </div>

                <div class="mb-3">
                  <label for="data" class="form-label">Data nascimento</label>
                  <input type="date" class="form-control" name="dt_nasc" value="<?php echo $linha['dt_nasc']?>">
                </div>

               <div class="mb-3">
                  <input type="submit" class="btn btn-success" value="Salvar Alterações">
                  <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa']?>">
                </div>

              </form>
                <a href="index.php" class="btn btn-info">Voltar para o inicio</a>
            </div>
          </div>
      </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bo  otstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>