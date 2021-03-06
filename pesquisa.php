<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Pesquisar</title>
  <body>
    <?php

        $pesquisa = $_POST['busca'] ?? '';
        include "conexao.php";
        $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";
    ?>

      <div class='container'>
          <div class='row'>
            <div class='col'>
              <h1>Pesquisar</h1>
              <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <form class="d-flex" action="pesquisa.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                     </div>
            </nav>


            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Endereço</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Função</th>
    </tr>
  </thead>
  <tbody>

  <?php
        $dados = mysqli_query($conn, $sql);

        while($linha = mysqli_fetch_assoc($dados)){
            $cod_pessoa = $linha['cod_pessoa'];
            $nome = $linha['nome'];
            $endereco = $linha['endereco'];
            $telefone = $linha['telefone'];
            $email = $linha['email'];
            $dt_nasc = $linha['dt_nasc'];
            $dt_nasc = mostra_data($dt_nasc);
          echo"<tr>
                    <th scope='row'>$nome</th>
                    <td>$endereco</td>
                    <td>$telefone</td>
                    <td>$email</td>
                    <td>$dt_nasc</td>
                    <td width=150px>
                        <a href='cadastro_edit.php?id=$cod_pessoa' class='btn btn-success btn-sm'>Editar</a>
                        <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma' onclick=" .'"' ."pegar_dados($cod_pessoa, '$nome')".'"' .">Excluir</a>
                    </td>   

                </tr>";
        }
          
    ?>
    
  </tbody>
</table>
                <a href="index.php" class="btn btn-primary btn-info">Voltar para o inicio</a>
            </div>
          </div>
      </div>
    
        <!-- Modal -->
<div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="excluir_script.php" method="POST">
         <p>Deseja realmente excluir, <a id="nome_pessoa"></a>?</p>
       </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
            <input type="hidden" name="nome" id="nome_pessoa_1" value="">
            <input type="hidden" name="id" id="cod_pessoa" value="">
            <input type="submit" class="btn btn-danger" value="Sim">
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function pegar_dados(id, nome){
      document.getElementById('nome_pessoa').innerHTML = nome;
      document.getElementById('nome_pessoa_1').value = nome;
      document.getElementById('cod_pessoa').value = id;
    }
</script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>