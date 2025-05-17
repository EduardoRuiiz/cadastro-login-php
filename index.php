
<?php include_once "templates/header.php" ?>

  <section class="hero-bg">

    <div class=" container text-center">
      <h1 class="hero-title">Vem de moto, Vem de Rider's Club!</h1>
      <p class="hero-subtitle">Atendimento rápido e responsável! O melhor lugar para você adquirir, customizar e
        aprimorar
        sua moto.</p>
    </div>
  </section>

  <?php if (isset($login_cookie)): ?>
    <a href="#" class="btn btn-primary btn-lg me-2">Área do Cliente</a>
    <button type="button" class="btn btn-dark button-services">Dark</button>
  <?php else: ?>
    <div class="services-banner1">
      Serviços Disponíveis
    </div>
  <?php endif; ?>
  </section>


  <section class="hero-bg2">
    <div class="row justify-content-center text-center w-100">
      <div class="col-md-3 mb-4">
        <button class="btn btn-outline-dark w-100 py-3 shadow-sm mb-3 services-banner2 grid-item">Troca de óleo
          +</button><br>
        <button class="btn btn-outline-dark w-100 py-3 shadow-sm mb-3 services-banner2 grid-item">Revisão
          +</button><br>
        <button class="btn btn-outline-dark w-100 py-3 shadow-sm services-banner2 grid-item">Pneus +</button>
      </div>
      <div class="col-md-4 mb-4 d-flex justify-content-center align-items-center">
      </div>
      <div class="col-md-3 mb-4">
        <button class="btn btn-outline-dark w-100 py-3 shadow-sm mb-3 services-banner2 grid-item">Alinhamento
          +</button><br>
        <button class="btn btn-outline-dark w-100 py-3 shadow-sm mb-3 services-banner2 grid-item">Lavagem
          Completa
          +</button><br>
        <button class="btn btn-outline-dark w-100 py-3 shadow-sm services-banner2 grid-item">Pintura +</button>
      </div>
  </section>

  <div class="services-banner2">
    Clientes
  </div>
  
  
<?php include_once"templates/footer.php"?>