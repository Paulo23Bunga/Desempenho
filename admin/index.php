
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
    <title>Signin Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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

    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/form-validation.css">
  </head>
  <body class="text-center" style="">
   <!-- LOGIN DO ADMINISTRADOR -->  
   <main class="form-signin" id="form-signin">
  <form>
    <img class="mb-4" src="../img/a7.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">faça login</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email ou número</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">insira a senha</label>
    </div>

    <div class="checkbox mb-3">
      <label hidden>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <a class="w-100 btn btn-lg btn-primary" href="app.php">logar</a>
    <p class="mt-5 mb-3 text-muted"><a href="#novocadastro" id="chamaCad">cadastra-se</a></p>
  </form>


  
  </body>
  
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../js/form-validation.js"></script>

  <script>
    $("#chamaCad").click(()=>{
       // alert("Ola")
       $("#form-signin").addClass("d-none")
       $("#novocadastro").removeClass("d-none")
    })
    $("#voltalogin").click(()=>{
       // alert("Ola")
       $("#form-signin").removeClass("d-none")
       $("#novocadastro").addClass("d-none")
    })
  </script>

</html>
