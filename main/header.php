<header class="main-view py-3 bg-white shadow-sm" id="main">
  <nav class="navbar navbar-expand-md">
    <div class="container p-0">
      <a href="/" class="navbar-brand ms-3 ms-lg-0">
          <img src="../svg/logo.svg" class="brand w-nav-brand">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> 
        <img src="../svg/bur.svg" alt="Burger Icon">
      </button> 
      <div class="collapse navbar-collapse ms-3 ms-lg-4" id="navbarCollapse"> 
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> 
            <a href="../routes" class="nav-link color-blue <?php echo ($activePage == 'routes') ? 'active' : ''; ?>">Маршруты</a> 
          </li> 
          <li class="nav-item"> 
            <a href="/places" class="nav-link color-blue <?php echo ($activePage == 'places') ? 'active' : ''; ?>">Места</a>
          </li> 
          <li class="nav-item"> 
            <a href="/create_route" class="nav-link color-blue <?php echo ($activePage == 'c_route') ? 'active' : ''; ?>">Создание маршрута</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>