<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $stmt = $connect->prepare("INSERT INTO usuarios (login, senha) VALUES (?, ?)");
    $stmt->bind_param("ss", $login, $senha);

    if ($stmt->execute()) {
        header("Location: ../CLIENT/cadastrado.html");
        exit();
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }

    $stmt->close();
}

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sidebar e Botões</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<body class="bg-secondary">
  <header data-bs-theme="dark">
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex align-items-center">         
          <a href="../index.php" class="navbar-brand d-flex align-items-center ">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
            </svg>
          <span class="fs-4 px-3">Voltar</span>
        </a>
        </div>
    </div>
</header>
<div class="my-4"></div>
<div class="container-md d-flex justify-content-center align-items-center bg-light rounded mb-5 pb-5" style="min-height: 80vh; max-width: 960px;">
  <main>
    <div class="py-5 text-center"> 
      <!-- py- define o espaçamento vertical em 5 -->
      <img class="d-block mx-auto mb-4" src="../IMG/logo.png" alt="" width="180" height="150">
      <h2>Inscreva-se</h2>
      <p class="lead">Preencha o cadastro com as informações para realizar seu cadastro.</p>
    </div>

    <div class="row g-5 row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Informações Pessoais</h4>
        <form id="cadastroForm" class="needs-validation" novalidate="">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Primeiro nome</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Preencha com o primeiro nome.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Preencha um sobrenome válido.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Nome de usuário</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" placeholder="Username" required="">
              <div class="invalid-feedback">
                  Preencha com seu nome de usuário.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-body-secondary"></span></label>
              <input type="email" class="form-control" id="email" placeholder="seuemail@exemplo.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            <div class="col-12">
              <label for="senha" class="form-label">Senha <span class="text-body-secondary"></span></label>
              <input type="password" class="form-control" id="senha" placeholder="Digite uma senha">
              <div class="invalid-feedback">
                Please enter a valid password address for shipping updates.
              </div>
            </div>

           
          <button class="w-100 btn btn-primary btn-lg mb-0" type="submit">Cadastrar</button>
        </form>
      </div>
    </div>
  </main>
</div>

<?php include_once"../templates/footer.php"?>