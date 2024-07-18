<footer class="shadow-footer" style="margin-top: 100px;"> 
    <nav class="navbar navbar-expand-lg pt-4"> 
      <div class="container d-flex justify-content-center justify-content-sm-start"> 
        <a href="/" class="navbar-brand"> 
          <img src="../svg/logo.svg" class="brand w-nav-brand"> 
        </a>
        <div class="col text-center">
          <ul class="navbar-nav ms-0 ms-sm-4"> 
            <li class="nav-item"> 
              <a href="/routes" class="nav-link color-blue <?php echo ($activePage == 'routes') ? 'active' : ''; ?>">Маршруты</a> 
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
    <div class="container text-center mt-4"> 
      <p class="pb-4 m-0">copyright 2024 kp - design: 351015</p> 
    </div> 
</footer>