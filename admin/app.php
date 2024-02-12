<?php
  require_once "../conexao/pdo_conexao.php";
  require_once "../conexao/sqli_conexao.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>administrador</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">



    <!-- Bootstrap core CSS -->

<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">



    <!-- ´NICIO DO Painel do administrador -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>

<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" >
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Painel do administrador</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap d-flex">
      <a class="nav-link px-3 position-relative" href="#" style="font-size: 22px;"><i class="bi bi-bell"></i><span class="badge rounded-pill bg-danger position-absolute" style="font-size: 12px; left: 25px; top: 5px;">2</span></a>
      <a class="nav-link px-3" href="#" style="font-size: 22px;"><i class="bi bi-person-circle"></i></a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#principal">
              <span data-feather="home"></span>
             Início
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gerenciamento">
              <span data-feather="file"></span>
              <i class="bi bi-person"></i>
              Gerenciar turmas
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#controlar">
              <span data-feather="users"></span>
              <i class="bi bi-person"></i>
              Controlar aulas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#cadProf">
              <span data-feather="bar-chart-2"></span>
              <i class="bi bi-person"></i>
              Cadastrar professores
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modaCurso">
              <i class="bi bi-person"></i>
              Cadastrar Cursos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalDisplina">
              <i class="bi bi-person"></i>
              Cadastrar Disciplina
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalturma">
              <i class="bi bi-person"></i>
              Cadastrar Turmas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"  data-bs-toggle="modal" data-bs-target="#modaluno">
              <i class="bi bi-person"></i>
              Cadastrar Alunos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalclasses">
              <i class="bi bi-person"></i>
              Cadastrar Classe
            </a>
          </li>
          <li class="nav-item d-none">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalturma">
              <i class="bi bi-person"></i>
              Cadastrar Outros
            </a>
          </li>
          <li class="nav-item d-none">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalturma">
              <i class="bi bi-person"></i>
              Cadastrar Outros
            </a>
          </li>
          <?php
          /*  $sql = "SELECT * FROM tb_curso";
            $result = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
                echo "
                <li class='nav-item'>
                <a class='nav-link' href='#'>
                  <i class='bi bi-person'></i>
                  $row[nome_curso]
                </a>
              </li>
                ";
              }
            } else {
              echo "0 results";
            } */
          ?>

        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="principal">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Painel do administrador</h1>
        <div class="btn-toolbar mb-2 mb-md-0" hidden>
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <div class="row" id="nome">
      <div class="row col-sm-12">
        <div class="mx-auto col-sm-6 col-lg-6 my-2">
          <div class="card banerr">
            <div class="card-header">
              professor por cadastrar
            </div>
            <div class="card-body d-flex justify-content-around aligen-items-center">
              <div class="">
               <!-- <i class="bi bi-person-bounding-box" style="font-size: 55px;"></i> -->
               <img src="../img/a13.png" alt="" width="35" height="35" class="rodonded">
              </div>
              <div class="conteudo text-center">
                <h5>Pendentes</h5>
                <h1>33</h1>
              </div>
            </div>
            <div class="card-footer text-muted text-center">
              <a href="#" class="btn btn-azul">Ver Pendentes</a>
            </div>
          </div>
        </div>
        <div class="mx-auto col-sm-6 col-lg-6 my-2">
          <div class="card banerr">
            <div class="card-header">
              Cadastrar Alunos 
            </div>
            <div class="card-body d-flex justify-content-around aligen-items-center">
              <div class="">
                
                <img src="../img/a4.png" alt="" width="35" height="35" class="rodonded">
              </div>
              <div class="conteudo text-center">
                <h1>Alunos</h1>
                <h1></h1>
              </div>
            </div>
            <div class="card-footer text-muted text-center">
              <a href="#" class="btn btn-azul">Cadastrar Alunos</a>
            </div>
          </div>
        </div>

        <!-- LISTAS DE PROFESSORES CADASTRADOS  -->

      <h2>Lista de Professores Cadastrados</h2>
      <div class="table-responsive">

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Formação</th>
              <th scope="col">Email</th>
              <th scope="col">Contacto</th>
            </tr>
          </thead>
          <tbody>
            <?php
               $sql = "SELECT * FROM tb_professor ORDER BY nome_prof ASC";
               $result = mysqli_query($conexao, $sql);
               if (mysqli_num_rows($result) > 0) {
                 // output data of each row
                 $cont = 1;
                 while($row = mysqli_fetch_assoc($result)) {
                  
            ?>
            <tr>
              <td>
                <?php 
                  
                  echo $cont++;
                ?>
              </td>
              <td>
                <?php
                  echo $row['nome_prof'];
                ?>
              </td>
              <td>
              <?php
                  echo $row['nivel_academico'];
                ?>
              </td>
              <td>
              <?php
                  echo $row['email'];
                ?>
              </td>
              <td><?php
                  echo $row['telefone'];
                ?></td>
            </tr>
            <?php 
                 }
              }
            ?>
            <tr>
              <td>1,002</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
          
          </tbody>
        </table>
      </div>
    </main>
    <!-- MODAL CADASTRO  DO PROFESSOR-->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 d-none" id="cadProf">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar Professor</h1>
        <div class="btn-toolbar mb-2 mb-md-0" hidden>
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
      <div class="container">

     
        <form action="../conexao/pdo_cadastro.php" method="post" enctype="multipart/form-data" class="needs-validation"  novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Insira o nome completo</label>
              <input type="text" class="form-control" id="nomeProf" name="nomeProf" placeholder="nome" value="" required>
              <div class="invalid-feedback">
                não insiriu o nome do professor.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="state" class="form-label">Número do BI</label>
              <input type="text" class="form-control" id="num_BIProfe" name="num_BIProfe" placeholder="Número do BI">
              <div class="invalid-feedback">
                não insira o número do BI.
              </div>
            </div>


            <div class="col-sm-6">
              <label for="state" class="form-label">Morada</label>
              <input type="text" class="form-control" id="moradaprof" name="moradaprof" placeholder="Morada">
              <div class="invalid-feedback">
              não insira a morada.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address2" class="form-label"> Nível academico </label>
              <input type="text" class="form-control" id="nivelprof" name="nivelprof" placeholder="Nível academic">
              <div class="invalid-feedback">
              não insira o nível académico.
              </div>
            </div>

            
            <div class="col-sm-6">
              <label for="state" class="form-label">Turno</label>
              <input type="text" class="form-control" id="turnoprof" name="turnoprof" placeholder="Turno">
              <div class="invalid-feedback">
              não insira o Turno.
              </div>
            </div>

            <div class="col-sm-6">
            <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Default checkbox
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
  <label class="form-check-label" for="flexCheckChecked">
    Checked checkbox
  </label>
</div>
            </div>

            
            <div class="col-sm-6">
              <label for="state" class="form-label">Classe</label>
              <?php 
              
         /*     SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
              FROM Orders
              INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID; */

                 //  $sql = "SELECT * FROM tb_cursodisciplina";
               //  $sql = "SELECT tb_cursodisciplina.id_classe, tb_classe.classe FROM tb_cursodisciplina INNER JOIN tb_classe ON tb_cursodisciplina.id_classe=tb_classe.id_classe";
                 $sql = "SELECT tb_cursodisciplina.id_cusodisciplina, tb_classe.classe FROM tb_cursodisciplina INNER JOIN tb_classe ON tb_cursodisciplina.id_classe=tb_classe.id_classe;";

                   $result = mysqli_query($conexao, $sql);
                   if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     while($row = mysqli_fetch_assoc($result)) {
                ?>
             
             <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
                  <?php //print_r($row);
                      echo $row['classe'];
                      
                  ?>
                      </label>
</div>
                  <?php
                   }
                  } else {
                    echo "0 results";
                  } 
                ?>
              <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Default checkbox
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
  <label class="form-check-label" for="flexCheckChecked">
    Checked checkbox
  </label>
</div>
            </div>

            <div class="col-sm-6">
              <label for="address2" class="form-label"> Disciplina</label>
              <input type="text" class="form-control" id="discprof" name="discprof" placeholder="Discilplina">
              <div class="invalid-feedback">
              não insira a Disciplina.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Telefone</label>
              <input type="text" class="form-control" id="telefoneProfe" name="telefoneProfe" placeholder="contato" value="" required>
              <div class="invalid-feedback">
                não insiriu o contato.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="email" class="form-label">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="email" class="form-control" id="emailProf" name="emailProf" placeholder="email" required>
              <div class="invalid-feedback">
                não insiriu o email.
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <label for="username" class="form-label">Insira a senha</span></label>
              <input type="text" class="form-control" id="senhaProf" name="senhaProf" placeholder="senha"required>
              <div class="invalid-feedback">
                não insiriu a senha.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address" class="form-label">Senha de confirmação</label>
              <input type="text" class="form-control" id="confSenhaProf" name="confSenhaProf" placeholder="senha confirmção" required>
              <div class="invalid-feedback">
                não confirmou a senha.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="zip" class="form-label">Foto de perfil<span class="text-muted">(Optional)</span></label>
              <input type="file" class="form-control" id="fotoProf"  name="fotoProf" value="" placeholder="foto" required>
              <div class="invalid-feedback">
              não meteu a foto do perfil.
              </div>
            </div>
            <div class="col-sm-6">
                <h4 class="mb-3">Sexo</h4>
              <div class="my-3 d-flex justify-content-around aling-items-center">
                <div class="form-check">
                  <input id="sexoMascProf" name="sexoProf" type="radio" class="form-check-input" value="Masculino" checked required>
                  <label class="form-check-label" for="credit">Masculino</label>
                </div>
                <div class="form-check">
                  <input id="sexoFemProf" name="sexoProf" type="radio" class="form-check-input" value="Feminino" required>
                  <label class="form-check-label" for="debit">Feminino</label>
                </div>
                <div class="form-check">
                  <input id="sexoOutrocProf" name="sexoProf" type="radio" class="form-check-input" value="Outros"  required>
                  <label class="form-check-label" for="paypal">Outros</label>
                </div>
              </div>
            </div>


          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="cadProfe" id="cadProfe">cadastra-se</button>
        </form>
      </div>

    </main>
<!-- GERENCIAR TURMAS -->

 <!--MODAL CADASTRO TURMAS-->
 <div class="modal fade" id="modalturma" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Cadastrar Turmas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
       
        <form action="../conexao/pdo_cadastro.php" method="post" id="formCurso" class="needs-validation" novalidate>
          <div class="row">
              <div class="col-6">
                <label for="firstName" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="nomedaTurma" name="nomedaTurma"  placeholder="nome da turma" value="" required>
                <div class="invalid-feedback">
                  não insiriu o título.
                </div>
              </div>

              <div class="col-6">
                <label for="lastName" class="form-label">Sala</label>
                <input type="text" class="form-control" id="saladaTurma" name="saladaTurma" placeholder="nº da sala" value="" required>
                <div class="invalid-feedback">
                  não insiriu a sala.
                </div>
              </div>

              </div>
              <div class="col-6">
                <label for="username" class="form-label">Classe</span></label>
                <input type="text" class="form-control" id="classdaTurma" name="classdaTurma" placeholder="Classe/Ano"required>

                <select class="form-select" id="classdaTurma" name="classdaTurma" required="">
                  <option selected="" disabled="" value="">selecionar classe.</option>
                  <?php 
                   $sql = "SELECT * FROM tb_classe";
                   $result = mysqli_query($conexao, $sql);
                   if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     while($row = mysqli_fetch_assoc($result)) {
                ?>
                  <option  value="<?=$row['id_classe']?>"><?=$row['classe']?></option>
                  <?php
                   }
                  } else {
                    echo "0 results";
                  } 
                ?>
                </select>
                <div class="invalid-feedback">
                  não insiriu a classe.
                </div>
              </div>

              <div class="col-6">
                <label for="address2" class="form-label">Ano Lectivo </label>
                <input type="text" class="form-control" id="anoletdaTurma" name="anoletdaTurma" placeholder="Ano Lectivo"required>
              </div>

              <div class="col-6">
                <label for="country" class="form-label">Curso</label>
              
                <select class="form-select" id="cursodaTurma" name="cursodaTurma">
                  <option id="discipldaTurma " name="discipldaTurma " value="" >Seleciona o Curso</option>
                  <?php 
                   $sql = "SELECT * FROM tb_curso";
                   $result = mysqli_query($conexao, $sql);
                   if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     while($row = mysqli_fetch_assoc($result)) {
                ?>
                  <option value="<?=$row['id_curso']?>"><?=$row['nome_curso']?></option>
                  <?php
                   }
                  } else {
                    echo "0 results";
                  } 
                ?>
                </select>
                <div class="invalid-feedback">
                  Por favor seleciona o curso.
                </div>
              </div>

              <div class="col-6">
                  <h4 class="mb-3">Turno</h4>
                <div class="my-3 d-flex justify-content-around aling-items-center">
                  <div class="form-check">
                    <input id="turnoManhaTurma" name="turnoTurma" type="radio" class="form-check-input" value="Manha" checked required>
                   
                    <label class="form-check-label" for="credit">Manha</label>
                  </div>
                  <div class="form-check">
                  <input id="turnoTardeTurma" name="turnoTurma" type="radio" class="form-check-input" value="Tarde" checked required>
                   
                    <label class="form-check-label" for="debit">Tarde</label>
                  </div>
                  <div class="form-check">
                  <input id="turnoNoiteTurma" name="turnoTurma" type="radio" class="form-check-input" value="Noite" checked required>
                   
                    <label class="form-check-label" for="paypal">Noite</label>
                  </div>
                </div>
              </div>


            </div>

            <hr class="my-4">

           
            <button class="w-100 btn btn-primary btn-lg" type="submit" id="btnTurma" name="btnTurma">Cadastrar</button>
        </form>
        </div>
      </div>
    </div>
  </div>   <!--MODAL CADASTRO TURMA FIM -->


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 d-none" id="gerenciamento">
      <div class="container py-4">
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Número</th>
                <th scope="col">Curso</th>
                <th scope="col">Sala </th>
                <th scope="col">Nome da turma</th>
                <th scope="col">Turno</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1,001</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
              </tr>
              <tr>
                <td>1,002</td>
                <td>placeholder</td>
                <td>irrelevant</td>
                <td>visual</td>
                <td>layout</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>data</td>
                <td>rich</td>
                <td>dashboard</td>
                <td>tabular</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>information</td>
                <td>placeholder</td>
                <td>illustrative</td>
                <td>data</td>
              </tr>
              <tr>
                <td>1,004</td>
                <td>text</td>
                <td>random</td>
                <td>layout</td>
                <td>dashboard</td>
              </tr>
              <tr>
                <td>1,005</td>
                <td>dashboard</td>
                <td>irrelevant</td>
                <td>text</td>
                <td>placeholder</td>
              </tr>
              <tr>
                <td>1,006</td>
                <td>dashboard</td>
                <td>illustrative</td>
                <td>rich</td>
                <td>data</td>
              </tr>
              <tr>
                <td>1,007</td>
                <td>placeholder</td>
                <td>tabular</td>
                <td>information</td>
                <td>irrelevant</td>
              </tr>
              <tr>
                <td>1,008</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
              </tr>
              <tr>
                <td>1,009</td>
                <td>placeholder</td>
                <td>irrelevant</td>
                <td>visual</td>
                <td>layout</td>
              </tr>
              <tr>
                <td>1,010</td>
                <td>data</td>
                <td>rich</td>
                <td>dashboard</td>
                <td>tabular</td>
              </tr>
              <tr>
                <td>1,011</td>
                <td>information</td>
                <td>placeholder</td>
                <td>illustrative</td>
                <td>data</td>
              </tr>
              <tr>
                <td>1,012</td>
                <td>text</td>
                <td>placeholder</td>
                <td>layout</td>
                <td>dashboard</td>
              </tr>
              <tr>
                <td>1,013</td>
                <td>dashboard</td>
                <td>irrelevant</td>
                <td>text</td>
                <td>visual</td>
              </tr>
              <tr>
                <td>1,014</td>
                <td>dashboard</td>
                <td>illustrative</td>
                <td>rich</td>
                <td>data</td>
              </tr>
              <tr>
                <td>1,015</td>
                <td>random</td>
                <td>tabular</td>
                <td>information</td>
                <td>text</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 d-none" id="controlar">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Painel Aulas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="pesquisar por professor..." aria-label="Recipient's username" aria-describedby="basic-addon2" style="min-width: 250px;">
            <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
          </div>
        </div>
      </div>
      <div class="container py-4 corpo" >

      </div>
    </main>
  </div>
</div>

  <!--MODAL CLASSE-->
  <div class="modal fade" id="modalclasses" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                  <form action="../conexao/pdo_cadastro.php" method="post" class="needs-validation" >
                  <div class="row g-3">

              <div class="col-sm-6">
              <label for="validationCustom04" class="form-label">Curso</label>
              
              <select class="form-select" id="cursoclasse" name="cursoclasse" required="">
                <option selected="" disabled="" value="">selecionar Curso.</option>
                <?php 
                 $sql = "SELECT * FROM tb_curso";
                 $result = mysqli_query($conexao, $sql);
                 if (mysqli_num_rows($result) > 0) {
                   // output data of each row
                   while($row = mysqli_fetch_assoc($result)) {
              ?>
                <option  value="<?=$row['id_curso']?>"><?=$row['nome_curso']?></option>
                <?php
                 }
                } else {
                  echo "0 results";
                } 
              ?>
              </select>
                <div class="invalid-feedback">
                  não confirmou a senha
                </div>
              </div>

            
              <div class="col-sm-6">
                <label for="validationCustom04" class="form-label">Disciplina</label>
              
                <select class="form-select" id="disciplinaclasse" name="disciplinaclasse" required="">
                  <option selected="" disabled="" value="">selecionar disciplina.</option>
                  <?php 
                   $sql = "SELECT * FROM tb_disciplina";
                   $result = mysqli_query($conexao, $sql);
                   if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     while($row = mysqli_fetch_assoc($result)) {
                ?>
                  <option  value="<?=$row['id_disciplina']?>"><?=$row['nome_disciplina']?></option>
                  <?php
                   }
                  } else {
                    echo "0 results";
                  } 
                ?>
                </select>
                
                <div class="invalid-feedback">
                não confirmou a disciplina
                </div>
              </div>
            
              <div class="col-sm-6 ">
                <label for="lastName" class="form-label">Classe Nivel</abel>
                <div class="input-group">
                  <input type="number" class="form-control" id="classe" name="classe"  placeholder="" value="" required>
                  <span class="input-group-text" id="basic-addon2"><small class=""><strong>ª</strong> classe</span>
                </div>
                
                <div class="invalid-feedback">
                  não insiriu a classe
                </div>
              </div>

            </div>

            <hr class="my-4">
            
            <button class="w-100 btn btn-primary btn-lg" type="submit" id="btnClasses" name="btnClasses">Cadastrar</button>
            </form>
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>

  <!--MODAL CADASTRO CURSOS-->
  
  <div class="modal fade" id="modaCurso" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Cadastrar Curso</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../conexao/pdo_cadastro.php" method="post" id="formCurso" class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="nomeCurso" class="form-label">Nome Do Curso</label>
                <input type="text" class="form-control" id="nomeCurso" name="nomeCurso" placeholder="nome do curso" value="" required>
                <div class="invalid-feedback">
                  não insiriu o nome do curso.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="classeCurso" class="form-label">Classe</label>
                <input type="number" class="form-control" id="classeCurso" name="classeCurso" placeholder="classe numero" value="" required>

              
                <div class="invalid-feedback">
                  não insiriu a classe
                </div>
              </div>


            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit" id="btnCusro" name="btnCusro">Cadastrar</button>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!--MODAL CADASTRO DISCIPLINA-->
  <div class="modal fade" id="modalDisplina" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Cadastrar Disciplina</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


        <form action="../conexao/pdo_cadastro.php" method="post" enctype="multipart/form-data" class="needs-validation"  novalidate>
            <div class="row g-3">
              <div class="col-sm-12">
                <label for="firstName" class="form-label">Nome Disciplina</label>
                <input type="text" class="form-control" id="nomedisciplina" name="nomedisciplina"  placeholder="nome da disciplina" value="" required>
                <div class="invalid-feedback">
                  não insiriu o nome da disciplina.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Classe</label>
                <input type="number" class="form-control" id="classedisciplina" name="classedisciplina"  placeholder="" value="" required>
                
                <select class="form-select" id="classedisciplina" name="classedisciplina" required="">
                  <option selected="" disabled="" value="">selecionar classe.</option>
                  <?php 
                   $sql = "SELECT * FROM tb_classe";
                   $result = mysqli_query($conexao, $sql);
                   if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     while($row = mysqli_fetch_assoc($result)) {
                ?>
                  <option  value="<?=$row['id_classe']?>"><?=$row['classe']?></option>
                  <?php
                   }
                  } else {
                    echo "0 results";
                  } 
                ?>
                </select>
                <div class="invalid-feedback">
                  não insiriu a classe
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Carga Horaria </abel>
                <input type="number" class="form-control" id="cargaHdisciplina" name="cargaHdisciplina"  placeholder="" value="" required>
                <div class="invalid-feedback">
                  não insiriu a carga horaria
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Trimestre</label>
                <input type="number" class="form-control" id="trimestredisciplina" name="trimestredisciplina"  placeholder="" value="" required>
                <div class="invalid-feedback">
                  não insiriu o trimestre
                </div>
              </div>

            
              <div class="col-sm-6">
                <label for="validationCustom04" class="form-label">Curso Disciplina</label>
              
                <select class="form-select" id="cursodisciplina" name="cursodisciplina" required="">
                  <option selected="" disabled="" value="">selecionar disciplina.</option>
                  <?php 
                   $sql = "SELECT * FROM tb_curso";
                   $result = mysqli_query($conexao, $sql);
                   if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     while($row = mysqli_fetch_assoc($result)) {
                ?>
                  <option  value="<?=$row['id_curso']?>"><?=$row['nome_curso']?></option>
                  <?php
                   }
                  } else {
                    echo "0 results";
                  } 
                ?>
                </select>
                
                <div class="invalid-feedback">
                não insiriu o trimestre
                </div>
              </div>
            

            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit" id="btndisciplina" name="btndisciplina">Cadastrar</button>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!--MODAL ALTERAR DADOS PROFESSOR-->
  <div class="modal fade" id="modalAlterar" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Alterar o perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Nome</label>
                <input type="text" class="form-control" id="firstName" placeholder="nome" value="" required>
                <div class="invalid-feedback">
                  não insiriu o seu nome.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">novo número</label>
                <input type="text" class="form-control" id="lastName" placeholder="contato" value="" required>
                <div class="invalid-feedback">
                  não insiriu o seu contato.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="email" class="form-label">novo email</label>

                  <input type="email" class="form-control" id="email" placeholder="email" required>
                <div class="invalid-feedback">
                  não insiriu o seu email.
                  </div>

              </div>
              <div class="col-sm-6">
                <label for="username" class="form-label">nova senha</span></label>
                <input type="text" class="form-control" id="username" placeholder="senha"required>
                <div class="invalid-feedback">
                  não insiriu a senha.
                </div>
                </div>

              <div class="col-sm-6">
                <label for="username" class="form-label">confirmar senha</span></label>
                <input type="text" class="form-control" id="username" placeholder="senha"required>
                <div class="invalid-feedback">
                  não confirmou senha.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="zip" class="form-label">foto de perfil<span class="text-muted">(Optional)</span></label>
                <input type="file" class="form-control" id="zip" placeholder="foto" required>
                <div class="invalid-feedback">
                  não insiriu a foto do perfil.
                </div>
              </div>
              <div class="col-sm-6">
                  <h4 class="mb-3">Sexo</h4>
                <div class="my-3 d-flex justify-content-around aling-items-center">
                  <div class="form-check">
                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                    <label class="form-check-label" for="credit">Masculino</label>
                  </div>
                  <div class="form-check">
                    <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                    <label class="form-check-label" for="debit">Feminino</label>
                  </div>
                  <div class="form-check">
                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                    <label class="form-check-label" for="paypal">Outros</label>
                  </div>
                </div>
              </div>


            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit" href="#">salvar</button>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!--MODAL CADASTRO ALUNOS-->
  <div class="modal fade" id="modaluno" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Cadastrar Aluno</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="../conexao/pdo_cadastro.php" method="post" enctype="multipart/form-data" class="needs-validation"  novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Nome completo</label>
                <input type="text" class="form-control" id="nomeAluno" name="nomeAluno" placeholder="nome" value="" required>
                <div class="invalid-feedback">
                  não insiriu o nome do Aluno.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">número do BI</label>
                <input type="text" class="form-control" id="numBiAluno" name="numBiAluno" placeholder="nome" value="" required>
                <div class="invalid-feedback">
                  não insiriu o número do BI.
                </div>
              </div>

              <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Morada</label>
                <input type="text" class="form-control" id="moradaAluno" name="moradaAluno" placeholder="nome" value="" required>
                <div class="invalid-feedback">
                  não insiriu a morada.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefluno" name="telefluno" placeholder="contato" value="" required>
                <div class="invalid-feedback">
                  não insiriu o contato.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="email" class="form-label">Email</label>

                  <input type="email" class="form-control" id="emailluno" name="emailluno"  placeholder="email" value="" required>
                <div class="invalid-feedback">
                  não insiriu o email.
                  </div>

              </div>


              <div class="col-sm-6">
                <label for="lastName" class="form-label">Cursos</label>
                <input type="text" class="form-control" id="cursoluno" name="cursoluno" placeholder="contato" value="" required>

                <select class="form-select" id="cursoluno" name="cursoluno" required="">
                  <option selected="" disabled="" value="">selecionar disciplina.</option>
                  <?php 
                   $sql = "SELECT * FROM tb_curso";
                   $result = mysqli_query($conexao, $sql);
                   if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     while($row = mysqli_fetch_assoc($result)) {
                ?>
                  <option  value="<?=$row['id_curso']?>"><?=$row['nome_curso']?></option>
                  <?php
                   }
                  } else {
                    echo "0 results";
                  } 
                ?>
                </select>
                <div class="invalid-feedback">
                  não insiriu o curso.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Turma</label>
                <input type="text" class="form-control" id="Turmaluno" name="Turmaluno" placeholder="contato" value="" required>
                <div class="invalid-feedback">
                  não insiriu a turma.
                </div>
              </div>


              <div class="col-sm-6">
                <label for="username" class="form-label">Classe</span></label>
                <input type="text" class="form-control" id="classeluno" name="classeluno" placeholder="senha"required>

                <select class="form-select" id="classeluno" name="classeluno" required="">
                  <option selected="" disabled="" value="">selecionar classe.</option>
                  <?php 
                   $sql = "SELECT * FROM tb_classe";
                   $result = mysqli_query($conexao, $sql);
                   if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                     while($row = mysqli_fetch_assoc($result)) {
                ?>
                  <option  value="<?=$row['id_classe']?>"><?=$row['classe']?></option>
                  <?php
                   }
                  } else {
                    echo "0 results";
                  } 
                ?>
                </select>
                <div class="invalid-feedback">
                  não insiriu a classe.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="zip" class="form-label">foto de perfil<span class="text-muted">(Optional)</span></label>
                <input type="file" class="form-control" id="fotoluno" name="fotoluno" value="" placeholder="foto" required>
                <div class="invalid-feedback">
                  .
                </div>
              </div>
              <div class="col-sm-6">
                  <h4 class="mb-3">Sexo</h4>
                <div class="my-3 d-flex justify-content-around aling-items-center">
                  <div class="form-check">
                    <input id="sexoMascluno" name="sexoluno" type="radio" class="form-check-input" value="Masculino" checked required>
                    <label class="form-check-label" for="credit">Masculino</label>
                  </div>
                  <div class="form-check">
                  <input id="sexoFemcluno" name="sexoluno" type="radio" class="form-check-input" value="Feminino" checked required>
                    <label class="form-check-label" for="debit">Feminino</label>
                  </div>
                  <div class="form-check">
                  <input id="sexoOutcluno" name="sexoluno" type="radio" class="form-check-input" value="Outros" checked required>
                    <label class="form-check-label" for="paypal">Outros</label>
                  </div>
                </div>
              </div>


            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit" name="cadAluno" id="cadAluno" href="#" >cadastrar</button>
          
          </form>

        </div>
      </div>
    </div>
  </div>

 



<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/chart.js/chart.umd.js"></script>
<script src="../js/form-validation.js"></script>
 <script src="dashboard.js"></script>


  <script>


     var ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ],
      datasets: [{
        data: [
          15339,
          21345,
          18483,
          24003,
          23489,
          24092,
          12034
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })

  $("a[href='#cadProf']").click(()=>{
    $("main").addClass('d-none');
    $("#cadProf").removeClass('d-none');
    $(".nav-link").removeClass('active');
    $("a[href='#cadProf']").addClass('active');
    if(window.innerWidth <= 767){
     // alert("Ola")
     $("#sidebarMenu").toggleClass('show');
    }
})
  $("a[href='#principal']").click(()=>{
    $("main").addClass('d-none');
    $("#principal").removeClass('d-none');
    $(".nav-link").removeClass('active');
    $("a[href='#principal']").addClass('active');
    if(window.innerWidth <= 767){
     // alert("Ola")
     $("#sidebarMenu").toggleClass('show');
    }
})
  $("a[href='#gerenciamento']").click(()=>{
    $("main").addClass('d-none');
    $("#gerenciamento").removeClass('d-none');
    $(".nav-link").removeClass('active');
    $("a[href='#gerenciamento']").addClass('active');

    if(window.innerWidth <= 767){
     // alert("Ola")
     $("#sidebarMenu").toggleClass('show');
    }
})
  $("a[href='#controlar']").click(()=>{
    $("main").addClass('d-none');
    $("#controlar").removeClass('d-none');
    $(".nav-link").removeClass('active');
    $("a[href='#controlar']").addClass('active');

    if(window.innerWidth <= 767){
     // alert("Ola")
     $("#sidebarMenu").toggleClass('show');
    }
})
$("#cadProfe").click(()=>{
 // alert("Ola")
})

  </script>

    </body>
</html>
