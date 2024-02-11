<?php 
   
    require_once "conexao/pdo_conexao.php";
    require_once "conexao/sqli_conexao.php";

    session_start();

    if (!isset($_SESSION['logado'])) {
      # code...
      header('Location: index.php');
    }
    else{
      $idProf = $_SESSION['id_professor'];
      $sqlDados = "SELECT * FROM tb_professor WHERE id_professor  LIKE '$idProf'";
      $resultadoProf = mysqli_query($conexao, $sqlDados);
      $meusDados = mysqli_fetch_array($resultadoProf);

      
    }
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Adalgisa Antonio, and Professor">
    <meta name="generator" content="Adalgisa 0.0.1">
    <title>Painel Professor</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">


  <!-- Template Main CSS File -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .tab-content{
  border: soli 3px red;
  max-height: 70vh !important;
  overflow: hidden;
  overflow-y: auto !important;
}
    </style>


    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>

<header class="navbar sticky-top  flex-md-nowrap p-0 shadow position-relative" id="cabecalho">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-white" href="#dropdown-toggle">
    <img src="img/<?php 
        echo $meusDados['foto_prof'];
      ?>" alt="" width="35" height="35" class="rounded-circle">
    <span>
      <?php 
        echo $meusDados['nome_prof'];
      ?>
    </span>
  </a>
  <div class="list-group position-absolute left-0 d-none" style="top: 55px;" id="dropdown-menu">
    <a href="#" class="list-group-item list-group-item-action text-dark" data-bs-toggle="modal" data-bs-target="#modalAlterar">Alterar Perfil</a>
  </div>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Pesquisar" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3 text-white" href="index.php"><i class="bi bi-door-open-fill"></i> Sair da conta</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#inicio">
              <i class="bi bi-house"></i>

              InÍcio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#plano">
              <i class="bi bi-book-fill"></i>
                Plano de Aula 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#guard">
              <i class="bi bi-book"></i>
               Aulas Guardadas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#ponto">
              <i class="bi bi-person"></i>
                presença e ponto
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="bi bi-door-open"></i>
              Sair
            </a>
          </li>
        </ul>


      </div>
    </nav>

    <!--PAINEL INICIAL-->
    <main id="inicio" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <div class="container py-4 rolar">
        <div class="row">
        <?php
               $sql = "SELECT * FROM tb_cursodisciplina";
               $result = mysqli_query($conexao, $sql);
               if (mysqli_num_rows($result) > 0) {
                 // output data of each row
                 $cont = 1;
                 while($row = mysqli_fetch_assoc($result)) {
                  
            ?>
          <div class="col-sm-6 col-lg-4 my-2">
            <div class="card">
              <div class="card-header">
              <?php
                  echo $row['id_classe'];
                ?>
              </div>
              <div class="card-body d-flex justify-content-around aligen-items-center">
                <div class="">
                <!--  <i class="bi bi-person-fill" style="font-size: 55px;"></i> -->
                <img src="img/a6.png" alt="" width="35" height="35" class="rodonded">
                </div>
                <div class="conteudo text-center">
                  <h5>
                  <?php
                  echo $row['id_curso'];
                ?>
                  </h5>
                  <h1>
                  <?php
                  echo $row['id_turma'];
                ?>
                  </h1>
                </div>
              </div>
              <div class="card-footer text-muted text-center">
                <a href="#detroturma" class="btn btn-azul">Entrar na turma</a>
              </div>
            </div>
          </div>
          <?php 
                 }
              }
            ?>
          <div class="col-sm-6 col-lg-4 my-2">
            <div class="card">
              <div class="card-header">
                Classe 11ª
              </div>
              <div class="card-body d-flex justify-content-around aligen-items-center">
                <div class="">
                  <img src="img/a6.png" alt="" width="35" height="35" class="rodonded">
                </div>
                <div class="conteudo text-center">
                  <h5>Económicas e Jurídicas </h5>
                  <h1>TA32</h1>
                </div>
              </div>
              <div class="card-footer text-muted text-center">
                <a href="#detroturma" class="btn btn-azul">Entrar na turma</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 my-2">
            <div class="card">
              <div class="card-header">
                Classe 11ª
              </div>
              <div class="card-body d-flex justify-content-around aligen-items-center">
                <div class="">
                  <img src="img/a6.png" alt="" width="35" height="35" class="rodonded">
                </div>
                <div class="conteudo text-center">
                  <h5>ciências Físicas e biológicas</h5>
                  <h1>TA33</h1>
                </div>
              </div>
              <div class="card-footer text-muted text-center">
                <a href="#detroturma" class="btn btn-azul">Entrar na turma</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 my-2">
            <div class="card">
              <div class="card-header">
                Classe 10ª
              </div>
              <div class="card-body d-flex justify-content-around aligen-items-center">
                <div class="">
                  <img src="img/a6.png" alt="" width="35" height="35" class="rodonded">
                </div>
                <div class="conteudo text-center">
                  <h5>Económicas e Jurídicas </h5>
                  <h1>TA35</h1>
                </div>
              </div>
              <div class="card-footer text-muted text-center">
                <a href="#detroturma" class="btn btn-azul">Entrar na turma</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 my-2">
            <div class="card">
              <div class="card-header">
                Classe 12ª
              </div>
              <div class="card-body d-flex justify-content-around aligen-items-center">
                <div class="">
                  <img src="img/a6.png" alt="" width="35" height="35" class="rodonded">
                </div>
                <div class="conteudo text-center">
                  <h5>ciências Físicas e biológicas</h5>
                  <h1>TA35</h1>
                </div>
              </div>
              <div class="card-footer text-muted text-center">
                <a href="#detroturma" class="btn btn-azul">Entrar na turma</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!--FIM PAINEL INICIAL-->

    <!--ENTRAR NA TURNA-->
    <main id="detroturma" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 d-none">
      <div class="container my-4 rolar card">
        <article>
          <h5>Benvindo A turma X</h5>
          <h6>10ª classe</h6>
        </article>
          
               <div class="card-body">
              <h5 class="card-title"></h5>

              <!-- Bordered Tabs Justified -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Lista De Alunos</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Mini Pauta</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Plano De Aula</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="card-body table-responsive">
                    <h5 class="card-title">Lista de presença</h5>
                        <div class="row py-3">
                      <div class="col-6">
                        <label for="firstName" class="form-label">Disciplina</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected="">Escolha uma disciplina</option>
                            <option value="1">Matematica</option>
                            <option value="2">Fisica</option>
                            <option value="3">Quimica</option>
                        </select>
                      </div>
                      
                      <div class="col-6">
                        <label for="firstName" class="form-label">Data Aula</label>
                        <input type="datetime-local" class="form-control" id="firstName" placeholder="Data Aula" value="" required="">
                      
                      </div>
                    </div>
                    <!-- Small tables -->
                    <table class="table table-sm table-hover table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nome</th>
                          <th scope="col" class="">Pontos</th>
                          <th scope="col">Presença</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Brandon Jacob</td>
                     
                          <td class="mx-auto">
                            <input type="number" class="form-control" style="max-width: 100px">
                          </td>
                          <td>
                          
                              <input class="form-check-input" type="checkbox" id="gridCheck1">
                      
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Bridie Kessler</td>
                   
                          <td>
                            <input type="number" class="form-control" style="max-width: 100px">
                          </td>
                          <td>
                           
                           <input class="form-check-input" type="checkbox" id="gridCheck1">
                      
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Ashleigh Langosh</td>
                     
                          <td>
                            <input type="number" class="form-control" style="max-width: 100px">
                          </td>
                          <td>
                           
                             <input class="form-check-input" type="checkbox" id="gridCheck1">
                     
                
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td>Angus Grady</td>
                   
                          <td>
                            <input type="number" class="form-control" style="max-width: 100px">
                          </td>
                          <td>
                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                     
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">5</th>
                          <td>Raheem Lehner</td>
                      
                          <td >
                            <input type="number" class="form-control" style="max-width: 100px">
                          </td>
                          <td>
                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                     
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- End small tables -->

                  </div>
                </div>
                <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="card-body table-responsive">
                    <h5 class="card-title">Mini Paula Aluno</h5>
                    <div class="row py-3">
                      <div class="col-6">
                        <label for="firstName" class="form-label">Disciplina</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected="">Escolha uma disciplina</option>
                            <option value="1">Matematica</option>
                            <option value="2">Fisica</option>
                            <option value="3">Quimica</option>
                        </select>
                      </div>
                      
                      <div class="col-6">
                        <label for="firstName" class="form-label">Data Aula</label>
                        <input type="datetime-local" class="form-control" id="firstName" placeholder="Data Aula" value="" required="">
                      
                      </div>
                    </div>
                    <!-- Small tables -->
                    <table class="table table-sm table-hover table-bordered">
                     <thead class="" style="">
          <tr class="text-center">
            <th rowspan="2" scope="col" style="min-width: 150px;" class="text-center py-4">Nome</th>
            <th colspan="6" scope="col" class="primeiro">Iº Trimestre</th>
            <th colspan="6" scope="col" class="segundo">IIº Trimestre</th>
            <th colspan="6" scope="col" class="terceiro">IIIº Trimestre</th>
            <th rowspan="2" scope="col" class="final">MFD</th>
          </tr>
          <tr class="text-center">

            <td class="nota primeiro">MAC</td>
            <td class="nota primeiro">NPP</td>
            <td class="nota primeiro">NPT</td>
            <td class="nota tab primeiro">MT</td>
            <td class="nota primeiro">PRE</td>
            <td class="nota primeiro">PON</td>

            <td class="nota">MAC</td>
            <td class="nota">NPP</td>
            <td class="nota">NPT</td>
            <td class="nota tab">MT</td>
            <td class="nota">PRE</td>
            <td class="nota">PON</td>

            <td class="nota">MAC</td>
            <td class="nota">NPP</td>
            <td class="nota">NPT</td>
            <td class="nota tab">MT</td>
            <td class="nota">PRE</td>
            <td class="nota">PON</td>



        </tr>
          </thead>
                      <tbody class="">
            <tr>
              <td class="displina"><b>1</b> Aldimiro Santos</td>
              <td class="primeiro"></td>
              <td class="primeiro"></td>
              <td class="primeiro"></td>
              <td class="tab primeiro">Media</td>
              <td class="primeiro"></td>
              <td class="primeiro"></td>


              <td></td>
              <td></td>
              <td></td>
              <td class="tab">Media</td>
              <td></td>
              <td></td>

              <td></td>
              <td></td>
              <td></td>
              <td class="tab">Media</td>
              <td></td>
              <td></td>

              <td>Final</td>
          </tr>
          <tr>
            <td class="displina"><b>2</b> Adalgisa</td>
            <td class="primeiro"></td>
            <td class="primeiro"></td>
            <td class="primeiro"></td>
            <td class="tab primeiro">Media</td>
            <td class="primeiro"></td>
            <td class="primeiro"></td>


            <td></td>
            <td></td>
            <td></td>
            <td class="tab">Media</td>
            <td></td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>
            <td class="tab">Media</td>
            <td></td>
            <td></td>

            <td>Final</td>
           </tr>
           <tr>
            <td class="displina"><b>3</b> Celestino Fragoso</td>
            <td class="primeiro"></td>
            <td class="primeiro"></td>
            <td class="primeiro"></td>
            <td class="tab primeiro">Media</td>
            <td class="primeiro"></td>
            <td class="primeiro"></td>


            <td></td>
            <td></td>
            <td></td>
            <td class="tab">Media</td>
            <td></td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>
            <td class="tab">Media</td>
            <td></td>
            <td></td>

            <td>Final</td>

           </tr>
          </tbody>
                    </table>
                    <!-- End small tables -->

                  </div>
                </div>
                <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">

                    <div class="row py-3">
                      <div class="col-6">
                        <label for="firstName" class="form-label">Disciplina</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected="">Escolha uma disciplina</option>
                            <option value="1">Matematica</option>
                            <option value="2">Fisica</option>
                            <option value="3">Quimica</option>
                        </select>
                      </div>
                      
                      <div class="col-6">
                        <label for="firstName" class="form-label">Data Aula</label>
                        <input type="datetime-local" class="form-control" id="firstName" placeholder="Data Aula" value="" required="">
                      
                      </div>
                    </div>
                    <form action="../conexao/pdo_cadastro.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                <div class="row g-3">
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">Tema da Aula </label>
                    <input type="text" class="form-control" id="TemaAula" name="TemaAula" placeholder="Tema da Aula" value="" required="">
                    <div class="invalid-feedback">
                      não insiriu o seu nome.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">Sub-tema da Aula </label>
                    <input type="text" class="form-control" id="SubTemaAula" name="SubTemaAula" placeholder="Sub-tema da aula" value="" required="">
                    <div class="invalid-feedback">
                      não insiriu o seu nome.
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <label for="lastName" class="form-label">motivação</label>

                    <textarea class="form-control" id="MotivaAula" name="MotivaAula" cols="30" rows="5" style="width: 100%;" placeholder="Motivação"></textarea>
                  </div>

                  <div class="col-sm-12">
                    <label for="lastName" class="form-label">materia</label>

                    <textarea class="form-control" id="MateraAula" name="MateraAula" cols="30" rows="10" style="width: 100%;" placeholder="materia"></textarea>
                  </div>

                  <div class="col-sm-6">
                    <label for="username" class="form-label">objectivo geral</label>
                    <input type="text" class="form-control" id="objectGeAula" name="objectGeAula" placeholder="Objetivo Geral" required="">
                    <div class="invalid-feedback">
                      não insiriu a senha.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="username" class="form-label">objetivo especifico</label>
                    <input type="text" class="form-control" id="objectEspAula" name="objectEspAula" placeholder="Objetivo Especifco" required="">
                    <div class="invalid-feedback">
                      não insiriu a senha.
                    </div>
                  </div>

                  <div class="col-sm-6 d-none">
                    <label for="username" class="form-label">Turma</label>
                    <input type="text" class="form-control" id="turmadapAula" name="turmadapAula" placeholder="Turma" required="">
                    <div class="invalid-feedback">
                      não insiriu a senha.
                    </div>
                  </div>

                  <div class="col-sm-6 d-none">
                    <label for="address2" class="form-label">data da aula </label>
                    <input type="date" class="form-control" id="dataAula" name="dataAula" placeholder="Data" required="">
                  </div>

                  <div class="col-sm-6">
                      <h4 class="mb-3">Turno da aula</h4>
                    <div class="my-3 d-flex justify-content-around aling-items-center">
                      <div class="form-check">
                        <input id="turnoManhaAuluna" name="turnoAuluno" type="radio" class="form-check-input" value="Manha" checked="" required="">
                        <label class="form-check-label" for="credit">Manha</label>
                      </div>
                      <div class="form-check">
                        <input id="turnoTardAuluna" name="turnoAuluno" type="radio" class="form-check-input" value="Tarde" checked="" required="">
                        <label class="form-check-label" for="debit">Tarde</label>
                      </div>
                      <div class="form-check">
                        <input id="turnoNoitAuluna" name="turnoAuluno" type="radio" class="form-check-input" value="Noite" checked="" required="">
                        <label class="form-check-label" for="paypal">Noite</label>
                      </div>
                    </div>
                  </div>


                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-azul btn-lg" type="submit" name="guardAula" id="guardAula" href="index.html">Guardar</button>
              </form>
                </div>
              </div><!-- End Bordered Tabs Justified -->

            </div>
      </div>
      
    </main>
    <!-- FIM ENTRAR NA  TURMA -->

    <!--PAINEL INICIAL-->
    <main id="perPonto" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 d-none">

      <div class="container py-4 rolar">
        <div class="row d-none">

          <div class="col-sm-6 col-lg-4 my-2">
            <div class="card">
              <div class="card-header">
                Turma TA31
              </div>
              <div class="card-body d-flex justify-content-around aligen-items-center">
                <div class="">
                <!--  <i class="bi bi-person-fill" style="font-size: 55px;"></i> -->
                <img src="img/a6.png" alt="" width="35" height="35" class="rodonded">
                </div>
                <div class="conteudo text-center">
                  <h5>ciências Físicas e biológicas</h5>
                  <h1>TA31</h1>
                </div>
              </div>
              <div class="card-footer text-muted text-center">
                <a href="#" class="btn btn-azul">Entrar na turma</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 my-2">
            <div class="card">
              <div class="card-header">
                Turma TA32
              </div>
              <div class="card-body d-flex justify-content-around aligen-items-center">
                <div class="">
                  <img src="img/a6.png" alt="" width="35" height="35" class="rodonded">
                </div>
                <div class="conteudo text-center">
                  <h5>Económicas e Jurídicas </h5>
                  <h1>TA32</h1>
                </div>
              </div>
              <div class="card-footer text-muted text-center">
                <a href="#turma" class="btn btn-azul">Entrar na turma</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 my-2">
            <div class="card">
              <div class="card-header">
                Turma TA33
              </div>
              <div class="card-body d-flex justify-content-around aligen-items-center">
                <div class="">
                  <img src="img/a6.png" alt="" width="35" height="35" class="rodonded">
                </div>
                <div class="conteudo text-center">
                  <h5>ciências Físicas e biológicas</h5>
                  <h1>TA33</h1>
                </div>
              </div>
              <div class="card-footer text-muted text-center">
                <a href="#" class="btn btn-azul">Entrar na turma</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 my-2">
            <div class="card">
              <div class="card-header">
                Turma TA35
              </div>
              <div class="card-body d-flex justify-content-around aligen-items-center">
                <div class="">
                  <img src="img/a6.png" alt="" width="35" height="35" class="rodonded">
                </div>
                <div class="conteudo text-center">
                  <h5>Económicas e Jurídicas </h5>
                  <h1>TA35</h1>
                </div>
              </div>
              <div class="card-footer text-muted text-center">
                <a href="#" class="btn btn-azul">Entrar na turma</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 my-2">
            <div class="card">
              <div class="card-header">
                Turma T3A9
              </div>
              <div class="card-body d-flex justify-content-around aligen-items-center">
                <div class="">
                  <img src="img/a6.png" alt="" width="35" height="35" class="rodonded">
                </div>
                <div class="conteudo text-center">
                  <h5>ciências Físicas e biológicas</h5>
                  <h1>TA35</h1>
                </div>
              </div>
              <div class="card-footer text-muted text-center">
                <a href="#" class="btn btn-azul">Entrar na turma</a>
              </div>
            </div>
          </div>
        </div>

        <div class="card table-responsive recent-sales">
          <div class="">
            <h1 class="h2">Mini Pauta</h1>
            <div class="row">
              <div class="col-10 text-start py-3 px-4">
                <button type="button" id="verNota" class="btn btn-sm btn-outline-secondary " style="width: 100px;"> salvar </button>
                
              </div>
              <div class="col-2 text-start position-relative" style="">
               
                <label for="country" class="form-label">Disciplina</label>
                <select class="form-select my-2" id="country" required style="">
                  <option value="">Seleciona uma Disciplina</option>
                  <option>Fisica</option>
                  <option>Matematica</option>
                  <option>Quimica</option>
                  <option>Biologia</option>
                </select>
                <div class="invalid-feedback">
                  Por favor escreva a disciplina.
                </div>
              </div>
            </div>
          </div>

        <table id="addPont" class="table table-borderless table-hover table-striped table-bordered">

          <thead>
          <tr class="text-center">
            <th rowspan="2" scope="col" style="min-width: 150px;" class="text-center py-4">Nome</th>
            <th colspan="3" scope="col">
              <div class="">
                <label for="firstName" class="form-label">Data Aula</label>
                <input type="datetime-local" class="form-control" id="firstName" placeholder="Data Aula" value="" required>
              
              </div>
            </th>
        
          </tr>
          <tr class="text-center">

            <td class="nota">MAC</td>
            <td class="nota">NPP</td>
            <td class="nota">NPT</td>
    

          </tr>
          </thead>
          <tbody>
            <tr>
              <td class="displina"><b>1</b> Aldimiro Santos</td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              
          </tr>
          <tr>
            <td class="displina"><b>2</b> Adalgisa</td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
           
           </tr>
           <tr>
            <td class="displina"><b>3</b> Celestino Fragoso</td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
       

           </tr>
          </tbody>
        </table>
      </div>
    </main>
    <!--FIM PAINEL INICIAL-->

    <!--PLANO DE AULA-->
  <main id="guard" class="main col-md-9 ms-sm-auto col-lg-10 px-md-4 d-none">

    <div class="pagetitle" >
      <h1 class="text-white">Plano De Aula</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
          <li class="breadcrumb-item">Plano</li>
          <li class="breadcrumb-item active">Diario</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section" >
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="max-height: 80vh; overflow-y: auto; overflow-x: hidden;">
            <div class="card-body">
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
          </div>

        </div>

        <div class="col-lg-12" hidden>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">TinyMCE Editor</h5>

              <!-- TinyMCE Editor -->
              <textarea class="tinymce-editor" placeholder="o que estas a pensar?">

              </textarea><!-- End TinyMCE Editor -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

    <!--PlANO DE AULA-->
  <main id="plano" class="main col-md-9 ms-sm-auto col-lg-10 px-md-4 d-none">

    <div class="pagetitle" >
      <h1 class="text-white">Plano De Aula</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Início</a></li>
          <li class="breadcrumb-item">Plano</li>
          <li class="breadcrumb-item active">Diario</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section" >
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="max-height: 80vh; overflow-y: auto; overflow-x: hidden;">
            <div class="card-body">
              <h5 class="card-title">Plano de Aula</h5>
              <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                <div class='btn-group mb-2'>
                <button type="button" id="verNota1" class="btn btn-sm btn-outline-secondary"> apagar tudo</button>
                <button type="button" id="inserNota1" class="btn btn-sm btn-outline-secondary">imprimir</button>
                </div>
               
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Plano de Aula</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Lista de presença</button>
              </div>
              <div class="tab-content" id="nav-tabContent">
                  <!-- <form class="needs-validation" id="planoAula" novalidate> -->
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form action="../conexao/pdo_cadastro.php" method="post" enctype="multipart/form-data" class="needs-validation"  novalidate>
                        <div class="row g-3">
                          <div class="col-sm-6">
                            <label for="firstName" class="form-label">Tema da Aula </label>
                            <input type="text" class="form-control" id="TemaAula" name="TemaAula" placeholder="nome da turma" value="" required>
                            <div class="invalid-feedback">
                              não insiriu o seu nome.
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label for="firstName" class="form-label">Sub-tema da Aula </label>
                            <input type="text" class="form-control" id="SubTemaAula" name="SubTemaAula" placeholder="nome da turma" value="" required>
                            <div class="invalid-feedback">
                              não insiriu o seu nome.
                            </div>
                          </div>

                          <div class="col-sm-12">
                            <label for="lastName" class="form-label">motivação</label>

                            <textarea class="form-control" id="MotivaAula" name="MotivaAula" cols="30" rows="5" style="width: 100%;" placeholder="Ola mundo"></textarea>
                          </div>

                          <div class="col-sm-12">
                            <label for="lastName" class="form-label">materia</label>

                            <textarea class="form-control" id="MateraAula" name="MateraAula" cols="30" rows="10" style="width: 100%;" placeholder="Ola mundo"></textarea>
                          </div>

                          <div class="col-sm-6">
                            <label for="username" class="form-label">objectivo geral</span></label>
                            <input type="text" class="form-control" id="objectGeAula" name="objectGeAula" placeholder="Disciplina"required>
                            <div class="invalid-feedback">
                              não insiriu a senha.
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label for="username" class="form-label">objetivo especifico</span></label>
                            <input type="text" class="form-control" id="objectEspAula" name="objectEspAula" placeholder="Classe/Ano"required>
                            <div class="invalid-feedback">
                              não insiriu a senha.
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <label for="username" class="form-label">Turma</span></label>
                            <input type="text" class="form-control" id="turmadapAula" name="turmadapAula" placeholder="Classe/Ano"required>
                            <div class="invalid-feedback">
                              não insiriu a senha.
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <label for="address2" class="form-label">data da aula </label>
                            <input type="date" class="form-control" id="dataAula" name="dataAula" placeholder="Ano Lectivo"required>
                          </div>

                          <div class="col-sm-6">
                              <h4 class="mb-3">Turno da aula</h4>
                            <div class="my-3 d-flex justify-content-around aling-items-center">
                              <div class="form-check">
                                <input id="turnoManhaAuluna" name="turnoAuluno" type="radio" class="form-check-input" value="Manha" checked required>
                                <label class="form-check-label" for="credit">Manha</label>
                              </div>
                              <div class="form-check">
                                <input id="turnoTardAuluna" name="turnoAuluno" type="radio" class="form-check-input" value="Tarde" checked required>
                                <label class="form-check-label" for="debit">Tarde</label>
                              </div>
                              <div class="form-check">
                                <input id="turnoNoitAuluna" name="turnoAuluno" type="radio" class="form-check-input" value="Noite" checked required>
                                <label class="form-check-label" for="paypal">Noite</label>
                              </div>
                            </div>
                          </div>


                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-azul btn-lg" type="submit" name="guardAula" id="guardAula" href="index.html">Guardar</button>
                      </form>
                  </div>
                  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                  <div class="bd-example">
        <table class="table table-striped">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome Aluno</th>
            <th scope="col">Ponto</th>
            <th scope="col">Presença</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Paulo Pinto Bunga</td>
            <td>
            <input type="number" class="form-control form-control-sm" id="avaliacao" aria-describedby="avalicao" style='max-width: 100px'>
            </td>
            <td>
            <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Presença</label>
          </div>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Adalgisa António</td>
            <td>
            <input type="number" class="form-control form-control-sm" id="avaliacao" aria-describedby="avalicao" style='max-width: 100px'>
            </td>
            <td>
            <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Presença</label>
          </div>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Marcos Barriga</td>
            <td>
            <input type="number" class="form-control form-control-sm" id="avaliacao" aria-describedby="avalicao" style='max-width: 100px'>
            </td>
            <td>
            <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Presença</label>
          </div>
            </td>
          </tr>
          </tbody>
        </table>
        </div>
          </div>

                </div>
            </div>
          </div>

        </div>

        <div class="col-lg-12" hidden>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">TinyMCE Editor</h5>

              <!-- TinyMCE Editor -->
              <textarea class="tinymce-editor" placeholder="o que estas a pensar?">

              </textarea><!-- End TinyMCE Editor -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
<!-- MINI PAUTA  -->
  <main id="turma" class="main col-md-9 ms-sm-auto col-lg-10 px-md-4 d-none">
        <div class="card table-responsive recent-sales">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Mini Pauta</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
                <button type="button" id="verNota" class="btn btn-sm btn-outline-secondary">salvar</button>
                <button type="button" id="inserNota" class="btn btn-sm btn-outline-secondary">Inserir Notas</button>
              </div>
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle mx-2">
                <span data-feather="calendar"></span>
                imprimir 
              </button>
            </div>
          </div>

        <table id="vernota" class="table table-borderless table-hover table-striped table-bordered ">
          <!--  MINI PAUTA-->

          <thead class="" style="">
          <tr class="text-center">
            <th rowspan="2" scope="col" style="min-width: 150px;" class="text-center py-4">Nome</th>
            <th colspan="6" scope="col" class="primeiro">Iº Trimestre</th>
            <th colspan="6" scope="col" class="segundo">IIº Trimestre</th>
            <th colspan="6" scope="col" class="terceiro">IIIº Trimestre</th>
            <th rowspan="2" scope="col" class="final" class="py-4">MFD</th>
          </tr>
          <tr class="text-center">

            <td class="nota primeiro">MAC</td>
            <td class="nota primeiro">NPP</td>
            <td class="nota primeiro">NPT</td>
            <td class="nota tab primeiro">MT</td>
            <td class="nota primeiro">PRE</td>
            <td class="nota primeiro">PON</td>

            <td class="nota">MAC</td>
            <td class="nota">NPP</td>
            <td class="nota">NPT</td>
            <td class="nota tab">MT</td>
            <td class="nota">PRE</td>
            <td class="nota">PON</td>

            <td class="nota">MAC</td>
            <td class="nota">NPP</td>
            <td class="nota">NPT</td>
            <td class="nota tab">MT</td>
            <td class="nota">PRE</td>
            <td class="nota">PON</td>



        </tr>
          </thead>
          <tbody class="">
            <tr>
              <td class="displina"><b>1</b> Aldimiro Santos</td>
              <td class="primeiro"></td>
              <td class="primeiro"></td>
              <td class="primeiro"></td>
              <td class="tab primeiro">Media</td>
              <td class="primeiro"></td>
              <td class="primeiro"></td>


              <td></td>
              <td></td>
              <td></td>
              <td class="tab">Media</td>
              <td></td>
              <td></td>

              <td></td>
              <td></td>
              <td></td>
              <td class="tab">Media</td>
              <td></td>
              <td></td>

              <td>Final</td>
          </tr>
          <tr>
            <td class="displina"><b>2</b> Adalgisa</td>
            <td class="primeiro"></td>
            <td class="primeiro"></td>
            <td class="primeiro"></td>
            <td class="tab primeiro">Media</td>
            <td class="primeiro"></td>
            <td class="primeiro"></td>


            <td></td>
            <td></td>
            <td></td>
            <td class="tab">Media</td>
            <td></td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>
            <td class="tab">Media</td>
            <td></td>
            <td></td>

            <td>Final</td>
           </tr>
           <tr>
            <td class="displina"><b>3</b> Celestino Fragoso</td>
            <td class="primeiro"></td>
            <td class="primeiro"></td>
            <td class="primeiro"></td>
            <td class="tab primeiro">Media</td>
            <td class="primeiro"></td>
            <td class="primeiro"></td>


            <td></td>
            <td></td>
            <td></td>
            <td class="tab">Media</td>
            <td></td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>
            <td class="tab">Media</td>
            <td></td>
            <td></td>

            <td>Final</td>

           </tr>
          </tbody>
        </table>
        <table id="addnota" class="table table-borderless table-hover table-striped table-bordered d-none">

          <thead>
          <tr class="text-center">
            <th rowspan="2" scope="col" style="min-width: 150px;" class="text-center py-4">Nome</th>
            <th colspan="6" scope="col">Iº Trimestre</th>
            <th colspan="6" scope="col">IIº Trimestre</th>
            <th colspan="6" scope="col">IIIº Trimestre</th>
            <th rowspan="2" scope="col" class="py-4">MFD</th>
          </tr>
          <tr class="text-center">

            <td class="nota">MAC</td>
            <td class="nota">NPP</td>
            <td class="nota">NPT</td>
            <td class="nota tab">MT</td>
            <td class="nota">PRE</td>
            <td class="nota">PON</td>

            <td class="nota">MAC</td>
            <td class="nota">NPP</td>
            <td class="nota">NPT</td>
            <td class="nota tab">MT</td>
            <td class="nota">PRE</td>
            <td class="nota">PON</td>

            <td class="nota">MAC</td>
            <td class="nota">NPP</td>
            <td class="nota">NPT</td>
            <td class="nota tab">MT</td>
            <td class="nota">PRE</td>
            <td class="nota">PON</td>



        </tr>
          </thead>
          <tbody>
            <tr>
              <td class="displina"><b>1</b> Aldimiro Santos</td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td class="tab">Media</td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>


              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td class="tab">Media</td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>

              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td class="tab">Media</td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>
              <td><input type="number" name="" id="" style="max-width: 50px;"></td>

              <td>Final</td>
          </tr>
          <tr>
            <td class="displina"><b>2</b> Adalgisa</td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td class="tab">Media</td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>


            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td class="tab">Media</td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>

            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td class="tab">Media</td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>

            <td>Final</td>
           </tr>
           <tr>
            <td class="displina"><b>3</b> Celestino Fragoso</td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td class="tab">Media</td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>


            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td class="tab">Media</td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>

            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td class="tab">Media</td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>
            <td><input type="number" name="" id="" style="max-width: 50px;"></td>

            <td>Final</td>

           </tr>
          </tbody>
        </table>

  </main><!-- End #main -->


  </div>
</div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>

  <!--MODAL CADASTRO CURSOS-->
  <div class="modal fade" id="modaCurso" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Cadastrar Curso</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Nome Do Conso</label>
                <input type="text" class="form-control" id="firstName" placeholder="nome da turma" value="" required>
                <div class="invalid-feedback">
                  não insiriu o seu nome.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Disciplina</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  não insiriu o seu contato.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="username" class="form-label">Disciplina 1</span> <span class="text-muted">(Opcional)</span></label>
                <input type="text" class="form-control" id="username" placeholder="Disciplina"required>
                <div class="invalid-feedback">
                  não insiriu a senha.
                </div>
              </div>
              <div class="col-sm-6">
                <label for="username" class="form-label">Disciplina 2</span> <span class="text-muted">(Opcional)</span></label>
                <input type="text" class="form-control" id="username" placeholder="Classe/Ano"required>
                <div class="invalid-feedback">
                  não insiriu a senha.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="username" class="form-label">Disciplina 3</span> <span class="text-muted">(Opcional)</span></label>
                <input type="text" class="form-control" id="address" placeholder="Curso" required>
                <div class="invalid-feedback">
                  não confirmou a senha.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="username" class="form-label">Disciplina 4</span> <span class="text-muted">(Opcional)</span></label>
                <input type="text" class="form-control" id="address2" placeholder="Ano Lectivo"required>
              </div>

              <div class="col-sm-6">
                <label for="username" class="form-label">Disciplina 5</span> <span class="text-muted">(Opcional)</span></label>
                <input type="text" class="form-control" id="address2" placeholder="Ano Lectivo"required>
              </div>

            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit" href="index.html">cadastra</button>
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
                  não insiriu a senha.
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

            <button class="w-100 btn btn-azul btn-lg" type="submit" href="#">salvar</button>
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
          <form class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Nome completo</label>
                <input type="text" class="form-control" id="firstName" placeholder="nome" value="" required>
                <div class="invalid-feedback">
                  não insiriu o seu nome.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">numero do BI</label>
                <input type="text" class="form-control" id="lastName" placeholder="contato" value="" required>
                <div class="invalid-feedback">
                  não insiriu o numero do BI.
                </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Cursos</label>
                <input type="text" class="form-control" id="lastName" placeholder="contato" value="" required>
                <div class="invalid-feedback">
                  não insiriu o seu contato.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="email" class="form-label">Turma</label>

                  <input type="email" class="form-control" id="email" placeholder="email" required>
                <div class="invalid-feedback">
                  não insiriu o seu email.
                  </div>

              </div>

              <div class="col-sm-6">
                <label for="username" class="form-label">Classe</span></label>
                <input type="text" class="form-control" id="username" placeholder="senha"required>
                <div class="invalid-feedback">
                  não insiriu a senha.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="zip" class="form-label">foto de perfil<span class="text-muted">(Optional)</span></label>
                <input type="file" class="form-control" id="zip" placeholder="foto" required>
                <div class="invalid-feedback">
                  Zip code required.
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

            <button class="w-100 btn btn-primary btn-lg" type="submit" href="#">cadastrar</button>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!--MODAL CADASTRO TURMAS-->
  <div class="modal fade" id="modalturma" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Cadastrar Turmas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="firstName" placeholder="nome da turma" value="" required>
                <div class="invalid-feedback">
                  não insiriu o seu nome.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Sala</label>
                <input type="text" class="form-control" id="lastName" placeholder="nº da sala" value="" required>
                <div class="invalid-feedback">
                  não insiriu o seu contato.
                </div>
              </div>

              <div class="col-sm-6 d-none">
                <label for="username" class="form-label">Disciplina</span></label>
                <input type="text" class="form-control" id="username" placeholder="Disciplina"required>
                <div class="invalid-feedback">
                  não insiriu a senha.
                </div>
              </div>
              <div class="col-sm-6">
                <label for="username" class="form-label">Classe/Ano</span></label>
                <input type="text" class="form-control" id="username" placeholder="Classe/Ano"required>
                <div class="invalid-feedback">
                  não insiriu a senha.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="address" class="form-label">Curso</label>
                <input type="text" class="form-control" id="address" placeholder="Curso" required>
                <div class="invalid-feedback">
                  não confirmou a senha.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="address2" class="form-label">Ano Lectivo </label>
                <input type="text" class="form-control" id="address2" placeholder="Ano Lectivo"required>
              </div>

              <div class="col-sm-6">
                <label for="country" class="form-label">Disciplina</label>
                <select class="form-select" id="country" required>
                  <option value="">Seleciona uma Disciplina</option>
                  <option>Fisica</option>
                  <option>Matematica</option>
                  <option>Quimica</option>
                  <option>Biologia</option>
                </select>
                <div class="invalid-feedback">
                  Por favor escreva a disciplina.
                </div>
              </div>

              <div class="col-sm-6">
                  <h4 class="mb-3">Turno</h4>
                <div class="my-3 d-flex justify-content-around aling-items-center">
                  <div class="form-check">
                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                    <label class="form-check-label" for="credit">Manha</label>
                  </div>
                  <div class="form-check">
                    <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                    <label class="form-check-label" for="debit">Tarde</label>
                  </div>
                  <div class="form-check">
                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                    <label class="form-check-label" for="paypal">Noite</label>
                  </div>
                </div>
              </div>


            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit" href="index.html">cadastrar</button>
          </form>

        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script type="text/javascript" src="js/indexApp.js"></script>

  <script>
      
    $("a[href='#detroturma']").click(()=>{
      //alert("Ola")
      $("main").addClass('d-none');
      $("#detroturma").removeClass('d-none');

    })

    $("a[href='#inicio']").click(()=>{
  $("main").addClass('d-none');
  $("#inicio").removeClass('d-none');
})


  </script>

</html>
