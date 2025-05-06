document.addEventListener("DOMContentLoaded", function () {

    const isLoggedIn = localStorage.getItem("isLoggedIn") === "true"; // Verifica o estado de login
    const headerContainer = document.querySelector("#mainHeader .container");
    // Simula o estado de login (true para logado, false para deslogado)
    if (isLoggedIn) {
        // Usuário está logado: exibe carrinho e perfil
        headerContainer.innerHTML = `
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">

    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-center">
    <a class="navbar-brand" href="#" style="font-family: 'Audiowide', sans-serif; font-size: 24px;">Riders'Club</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="" href="#" style="margin: 0 10px;"></a>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <!-- Navegação à esquerda -->
      <ul class="navbar-nav mb-2 mb-lg-0"  style="gap:25px; font-family: 'Exo 2', sans-serif;">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Conheça nossa oficina</a></li>
        <li class="nav-item"><a class="nav-link" href="MotosDisponíveis.html">Motos disponíveis</a></li>
        <li class="nav-item"><a class="nav-link" href="Produto.html">Produtos</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Serviços de manutenção</a></li>

        <!-- Dropdown de opções -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Opções
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Deslogar</a></li>
          </ul>
        </li>
      </ul>
    
      <a class="" href="#" style="margin: 0 10px;"></a>

      <!-- Botões alinhados à direita -->
      <div class="d-flex" style="gap:10px; font-family: 'Audiowide', sans-serif; font-size: 15px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart4 me-4" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-bounding-box me-4" viewBox="0 0 16 16">
                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
        </svg>
      </div>
    </div>
  </div>
</nav>`;
    } else {
        // Usuário está deslogado: exibe login e cadastro
        headerContainer.innerHTML = `
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">

    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-center">
    <a class="navbar-brand" href="#" style="font-family: 'Audiowide', sans-serif; font-size: 24px;">Riders'Club</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="" href="#" style="margin: 0 10px;"></a>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <!-- Navegação à esquerda -->
      <ul class="navbar-nav mb-2 mb-lg-0"  style="gap:25px; font-family: 'Exo 2', sans-serif;">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Conheça nossa oficina</a></li>
        <li class="nav-item"><a class="nav-link" href="MotosDisponíveis.html">Motos disponíveis</a></li>
        <li class="nav-item"><a class="nav-link" href="Produto.html">Produtos</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Serviços de manutenção</a></li>

        <!-- Dropdown de opções -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Opções
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Deslogar</a></li>
          </ul>
        </li>
      </ul>
    
      <a class="" href="#" style="margin: 0 10px;"></a>

      <!-- Botões alinhados à direita -->
      <div class="d-flex" style="gap:10px; font-family: 'Audiowide', sans-serif; font-size: 15px;">
        <button class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
        <button class="btn btn-primary">Sign Up</button>
      </div>
    </div>
  </div>
</nav>`;
    }
});