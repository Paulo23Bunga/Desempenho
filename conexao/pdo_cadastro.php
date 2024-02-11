<?php
include_once "pdo_conexao.php";

//	CONEXÃO CURSO";
if (isset($_POST['btnCusro'])) {
    $nomeCurso = $_POST['nomeCurso'];
    $nomeClasse = $_POST['classeCurso'];

    $linhasAfetadas	=	$pdo->exec(
        "INSERT	INTO	tb_curso	(nome_curso, Classe_Curso)	
            VALUES	('$nomeCurso',	'$nomeClasse');"
        );

        if($linhasAfetadas){
            $_SESSION['mensagem'] = "Cadastrado com sucesso";
         //   header('Location: ../admin/index.php?sucesso');
            echo "<script>alert('Cadastrado com sucesso')
								window.location = '../admin/app.php?sucesso'
					</script>";
        }
        //	echo "Cadastro com Sucesso";
        else{
            $_SESSION['mensagem'] = "Erro de cadastro";
          //  header('Location: ../admin/index.php?Error');
            echo "<script>alert('Erro ao cadastrar')
            window.location = '../admin/app.php?erro'
                </script>";
        }
    //print $linhasAfetadas	.	'	linha	inserida';
        

  // echo "Ola Mundo" ;
}

//	CONEXÃO PROFESSOR";
  if(isset($_POST['cadProfe']) OR isset($_POST['ProfCad'])){
   // echo "tem Dados";
    $adminCad = $_POST['cadProfe'];
    $ProfCadast = $_POST['ProfCad'];

 
  

    if (isset($_POST['cadProfe'])) {
      
      $img = $_FILES["fotoProf"];

    move_uploaded_file($img["tmp_name"], "../img/".$img["name"]);
		$novoNome = $img["name"];

    }
if (isset($_POST['ProfCad'])) {

  $pic = $_FILES["fotoProf"];

    move_uploaded_file($pic["tmp_name"], "../img/".$pic["name"]);
		$novoPic = $pic["name"];

}

   $nomeProf = $_POST['nomeProf'];
   $num_BIprof = $_POST['num_BIProfe'];
   $telefoneProfe = $_POST['telefoneProfe'];
   $emailProf = $_POST['emailProf'];
   $senhaProf = $_POST['senhaProf'];
   $nivelprof = $_POST['nivelprof'];
   $moradaprof = $_POST['moradaprof'];
   $sexoProf = $_POST['sexoProf'];

  
if (isset($_POST['cadProfe'])) {
  $linhaencontradas = $pdo->exec (
    "INSERT INTO tb_professor (nome_prof, email, telefone, senha, foto_prof, num_BI, nivel_academico, morada, sexo, pendente)
    VALUES ('$nomeProf', '$emailProf', '$telefoneProfe', '$senhaProf', '$novoNome', '$num_BIprof', '$nivelprof', '$moradaprof', '$sexoProf', 1)"
   );
/*
   if($linhaencontradas){
    $_SESSION['mensagem'] = "Cadastrado com sucesso";
   header('Location: ../admin/index.php?sucesso');
   echo "<script>alert('Cadastrado com sucesso')
        window.location = '../admin/app.php?sucesso'
  </script>";  
}
//	echo "Cadastro com Sucesso";
else{
    $_SESSION['mensagem'] = "Erro de cadastro";
    header('Location: ../admin/index.php?Error');
    echo "<script>alert('Erro ao cadastrar')
    window.location = '../admin/app.php?erro'
        </script>"; 
} */

}

if (isset($_POST['ProfCad'])) {
  $linhaencontradas = $pdo->exec (
    "INSERT INTO tb_professor (nome_prof, email, telefone, senha, foto_prof, num_BI, nivel_academico, morada, sexo, pendente)
    VALUES ('$nomeProf', '$emailProf', '$telefoneProfe', '$senhaProf', '$novoPic', '$num_BIprof', '$nivelprof', '$moradaprof', '$sexoProf', 0)"
   );

   if($linhaencontradas){
    $_SESSION['mensagem'] = "Cadastrado com sucesso";
   header('Location: ../index.php?sucesso');
   echo "<script>alert('Cadastrado com sucesso')
        window.location = '../index.php?sucesso'
  </script>";  
}
//	echo "Cadastro com Sucesso";
else{
    $_SESSION['mensagem'] = "Erro de cadastro";
    header('Location: ../index.php?Error');
    echo "<script>alert('Erro ao cadastrar')
    window.location = '../index.php?erro'
        </script>"; 
}

}
/*
   $linhaencontradas = $pdo->exec (
    "INSERT INTO tb_professor (nome_prof, email, telefone, senha, foto_prof, num_BI, nivel_academico, morada, sexo)
    VALUES ('$nomeProf', '$emailProf', '$telefoneProfe', '$senhaProf', '$novoPic', '$num_BIprof', '$nivelprof', '$moradaprof', '$sexoProf')"
   ); */




  }

  /*/	CONEXÃO adminstrador";
  if(isset($_POST['cadProfe'])){
    // echo "tem Dados";
     $img = $_FILES["foto_prof"];
 
     move_uploaded_file($img["tmp_name"], "../img/".$img["name"]);
     $novoNome = $img["name"];
 
    $nomeProf = $_POST['nomeProf'];
    $num_BIprof = $_POST['num_BIProfe'];
    $telefoneProfe = $_POST['telefoneProfe'];
    $emailProf = $_POST['emailProf'];
    $senhaProf = $_POST['senhaProf'];
  
    $moradaprof = $_POST['moradaprof'];
    $sexoProf = $_POST['sexoProf'];
 
   
 
 
    $linhaencontradas = $pdo->exec (
     "INSERT INTO tb_professor (nome_prof, email, telefone, senha, foto_prof, num_BI, morada, sexo)
     VALUES ('$nomeProf', '$emailProf', '$telefoneProfe', '$senhaProf', '$novoNome', '$num_BIprof', '$moradaprof', '$sexoProf')"
    );
 
    if($linhaencontradas){
     $_SESSION['mensagem'] = "Cadastrado com sucesso";
    header('Location: ../admin/index.php?sucesso');
    echo "<script>alert('Cadastrado com sucesso')
         window.location = '../admin/app.php?sucesso'
   </script>";  
 }
 //	echo "Cadastro com Sucesso";
 else{
     $_SESSION['mensagem'] = "Erro de cadastro";
     header('Location: ../admin/index.php?Error');
     echo "<script>alert('Erro ao cadastrar')
     window.location = '../admin/app.php?erro'
         </script>"; 
 }
 
   }*/
 

 //	CONEXÃO TURMA";
  if (isset($_POST['btnTurma'])) {
    $nomedaTurma = $_POST['nomedaTurma']; 
    $saladaTurma = $_POST['saladaTurma']; 
    $classdaTurma = $_POST['classdaTurma']; 
    $anoletdaTurma = $_POST['anoletdaTurma']; 
    $cursodaTurma = $_POST['cursodaTurma'];
    $turnoTurma = $_POST['turnoTurma'];
    //$discipldaTurma = $_POST['discipldaTurma'];
   
   
    $linhasAfetadas	=	$pdo->exec(
        "INSERT	INTO	tb_turma	(titulo,	sala,	classe,	ano_letivo,	id_curso, turno)	
            VALUES	('$nomedaTurma',	'$saladaTurma', '$classdaTurma', '$anoletdaTurma', '$cursodaTurma', '$turnoTurma')"
        );

        if($linhasAfetadas){
            $_SESSION['mensagem'] = "Cadastrado com sucesso";
         //   header('Location: ../admin/index.php?sucesso');
            echo "<script>alert('Cadastrado com sucesso')
								window.location = '../admin/app.php?sucesso'
					</script>";
        }
        //	echo "Cadastro com Sucesso";
        else{
            $_SESSION['mensagem'] = "Erro de cadastro";
          //  header('Location: ../admin/index.php?Error');
            echo "<script>alert('Erro ao cadastrar')
            window.location = '../admin/app.php?erro'
                </script>";
        }
    //print $linhasAfetadas	.	'	linha	inserida';
        

  // echo "Ola Mundo" ;
  
}



 //	CONEXÃO classe";
 if (isset($_POST['btnClasses'])) {
  
  $cursoclasse = $_POST['cursoclasse'];
  $disciplinaclasse = $_POST['disciplinaclasse'];
  $classe = $_POST['classe'];
 

 
  $linhasAfetadas	=	$pdo->exec(
      "INSERT	INTO	tb_classe (id_curso, id_displina,	classe)	
          VALUES	('$cursoclasse', '$disciplinaclasse', '$classe')"
      );

      if($linhasAfetadas){
          $_SESSION['mensagem'] = "Cadastrado com sucesso";
       //   header('Location: ../admin/index.php?sucesso');
          echo "<script>alert('Cadastrado com sucesso')
              window.location = '../admin/app.php?sucesso'
        </script>";
      }
      //	echo "Cadastro com Sucesso";
      else{
          $_SESSION['mensagem'] = "Erro de cadastro";
        //  header('Location: ../admin/index.php?Error');
          echo "<script>alert('Erro ao cadastrar')
          window.location = '../admin/app.php?erro'
              </script>";
      }
  //print $linhasAfetadas	.	'	linha	inserida';
      

// echo "Ola Mundo" ;
}

 //	CONEXÃO disciplina";
 if (isset($_POST['btndisciplina'])) {
  $nomedisciplina = $_POST['nomedisciplina'];
  $classedisciplina = $_POST['classedisciplina'];
  $cargaHdisciplina = $_POST['cargaHdisciplina'];
  $trimestredisciplina = $_POST['trimestredisciplina'];
  $cursodisciplina = $_POST['cursodisciplina'];

 
  $linhasAfetadas	=	$pdo->exec(
      "INSERT	INTO	tb_disciplina	(nome_disciplina, classe_disciplina,	carga_horaria,	trimestre,	id_curso)	
          VALUES	('$nomedisciplina',	'$classedisciplina', '$cargaHdisciplina', '$trimestredisciplina', '$cursodisciplina');"
      );

      if($linhasAfetadas){
          $_SESSION['mensagem'] = "Cadastrado com sucesso";
       //   header('Location: ../admin/index.php?sucesso');
          echo "<script>alert('Cadastrado com sucesso')
              window.location = '../admin/app.php?sucesso'
        </script>";
      }
      //	echo "Cadastro com Sucesso";
      else{
          $_SESSION['mensagem'] = "Erro de cadastro";
        //  header('Location: ../admin/index.php?Error');
          echo "<script>alert('Erro ao cadastrar')
          window.location = '../admin/app.php?erro'
              </script>";
      }
  //print $linhasAfetadas	.	'	linha	inserida';
      

// echo "Ola Mundo" ;
}
//	CONEXÃO ALUNO";
if(isset($_POST['cadAluno'])){
  // echo "tem Dados";
   $img = $_FILES["fotoluno"];

   move_uploaded_file($img["tmp_name"], "../img/".$img["name"]);
   $novoNome = $img["name"];

  $nomeAluno = $_POST['nomeAluno'];
  $numBiAluno = $_POST['numBiAluno'];
  $moradaAluno = $_POST['moradaAluno'];
  $telefluno = $_POST['telefluno'];
  $emailluno = $_POST['emailluno'];
  $cursoluno = $_POST['cursoluno'];
  $sexoluno = $_POST['sexoluno'];
  $Turmaluno = $_POST['Turmaluno'];
  $classeluno = $_POST['classeluno'];
  
 // echo $classeluno." : ".$nomeAluno;
 


  $linhaencontradas1 = $pdo->exec (
   "INSERT INTO tb_aluno (nome_aluno,	curso, num_Bi,	morada_aluno,	email_aluno,	telefone_aluno,	classe,	foto_perfil,	sexo)
   VALUES ('$nomeAluno', '$cursoluno', '$numBiAluno', '$moradaAluno', '$emailluno', '$telefluno', '$classeluno','$novoNome', '$sexoluno')"
  ); 

  if($linhaencontradas1){
  /// $_SESSION['mensagem'] = "Cadastrado com sucesso";
  //header('Location: ../admin/index.php?sucesso');
  echo "<script>alert('Cadastrado com sucesso')
       window.location = '../admin/app.php?sucesso'
 </script>"; 
 //echo "Cadastro com Sucesso"; 
}
	
else{
   $_SESSION['mensagem'] = "Erro de cadastro";
   header('Location: ../admin/app.php?erro');
   //echo "<script>alert('Erro ao cadastrar')
   //window.location = '../admin/app.php?erro'
       //</script>"
    //   echo "Cadastro com Erro";
}

 }

 //	CONEXÃO AULA";
 if (isset($_POST['guardAula'])) {
  $TemaAula = $_POST['TemaAula'];
  $SubTemaAula = $_POST['SubTemaAula'];
  $MotivaAula = $_POST['MotivaAula'];
  $MateraAula = $_POST['MateraAula'];
  $objectGeAula = $_POST['objectGeAula'];
  $objectEspAula = $_POST['objectEspAula'];
  $dataAula = $_POST['dataAula'];
  $turnoAuluno = $_POST['turnoAuluno'];
  $turmadapAula = $_POST['turmadapAula'];
 
 
  $linhasAfetadas	=	$pdo->exec(
      "INSERT	INTO	tb_aula	(tema_aula,	subtema_aula,	motivacao, materia, id_turma,	objetivo_geral,	objetivo_especifico,	data_aula,	turno	)	
          VALUES	(' $TemaAula',	' $SubTemaAula', '$MotivaAula', '$MateraAula','$turmadapAula','$objectGeAula', '$objectEspAula ', ' $dataAula', '$turnoAuluno');"
      );

      if($linhasAfetadas){
          $_SESSION['mensagem'] = "Cadastrado com sucesso"; 
       //   header('Location: ../admin/index.php?sucesso');
          echo "<script>alert('Cadastrado com sucesso')
              window.location = '../admin/app.php?sucesso'
        </script>";
      }
      //	echo "Cadastro com Sucesso";
      else{
          $_SESSION['mensagem'] = "Erro de cadastro";
        //  header('Location: ../admin/index.php?Error');
          echo "<script>alert('Erro ao cadastrar')
          window.location = '../admin/app.php?erro'
              </script>";
      }
  //print $linhasAfetadas	.	'	linha	inserida';
      

// echo "Ola Mundo" ;
}

  


?>