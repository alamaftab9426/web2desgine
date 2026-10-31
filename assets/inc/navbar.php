<!-- TOP BAR -->
<div class="topbar">
  <div class="container d-flex justify-content-between align-items-center">

    <div class="topbar-left d-flex align-items-center">
      <span><i class="bi bi-geo-alt-fill" aria-hidden="true"></i> <?php echo htmlspecialchars($site['address']); ?></span>
      <a href="tel:<?php echo $site['tel']; ?>"><i class="bi bi-telephone-fill" aria-hidden="true"></i> <?php echo htmlspecialchars($site['phone']); ?></a>
      <a href="mailto:<?php echo $site['email']; ?>"><i class="bi bi-envelope-fill" aria-hidden="true"></i> <?php echo htmlspecialchars($site['email']); ?></a>
    </div>

    <div class="topbar-right d-flex align-items-center">
      <span class="follow-label">Follow Us:</span>
      <div class="topbar-social">
        <a href="#" aria-label="Facebook"><i class="bi bi-facebook" aria-hidden="true"></i></a>
        <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin" aria-hidden="true"></i></a>
        <a href="#" aria-label="Instagram"><i class="bi bi-instagram" aria-hidden="true"></i></a>
      </div>
      <button type="button" class="topbar-cta" data-bs-toggle="modal" data-bs-target="#enquiryModal">
        Enquiry Now <i class="bi bi-arrow-right" aria-hidden="true"></i>
      </button>
    </div>

  </div>
</div>

<!-- MAIN HEADER -->
<header class="site-header" id="siteHeader">
  <nav class="navbar navbar-expand-lg">
    <div class="container">

      <!-- BRAND LOGO -->
      <a class="navbar-brand" href="index.php" aria-label="A1 Industry Finish Fire - Home">
        <img src="<?php echo $site['logo']; ?>" alt="A1 Industry Finish Fire" width="190" height="62">
      </a>

      <!-- MOBILE MENU TOGGLE -->
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
              aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span></span><span></span><span></span>
      </button>

      <!-- NAVIGATION -->
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav mx-lg-auto align-items-lg-center">

          <li class="nav-item">
            <a class="nav-link<?php echo $isHome ? ' active' : ''; ?>" href="index.php"
               <?php echo $isHome ? 'aria-current="page"' : ''; ?>>Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link<?php echo $aboutActive ? ' active' : ''; ?>" href="about.php"
               <?php echo $aboutActive ? 'aria-current="page"' : ''; ?>>About Us</a>
          </li>

          <!-- PRODUCTS DROPDOWN -->
          <li class="nav-item nav-dropdown">
            <div class="nav-dropdown-heading">
              <a class="nav-link<?php echo $productsActive ? ' active' : ''; ?>" href="products.php"
                 <?php echo $productsActive ? 'aria-current="page"' : ''; ?>>Products</a>
              <button class="nav-dropdown-toggle" data-nav-toggle type="button"
                      aria-label="Open Products menu" aria-controls="productsMenu" aria-expanded="false">
                <i class="bi bi-chevron-down" aria-hidden="true"></i>
              </button>
            </div>
            <ul class="dropdown-menu" id="productsMenu">
              <li><a class="dropdown-item" href="products.php">All Products</a></li>
              <li class="submenu-item">
                <button class="dropdown-item submenu-toggle" type="button" aria-expanded="false" aria-haspopup="true">
                  Fire Extinguishers <i class="bi bi-chevron-right" aria-hidden="true"></i>
                </button>
                <ul class="submenu" aria-label="Fire extinguisher products">
                  <li><a class="dropdown-item" href="product-details.php?slug=abc-fire-extinguisher">ABC Fire Extinguishers</a></li>
                  <li><a class="dropdown-item" href="product-details.php?slug=co2-fire-extinguisher">CO₂ Fire Extinguishers</a></li>
                </ul>
              </li>
              <li><a class="dropdown-item" href="product-details.php?slug=hose-reel-systems">Fire Hose Reels</a></li>
              <li><a class="dropdown-item" href="product-details.php?slug=hydrant-systems">Fire Hydrant Systems</a></li>
              <li><a class="dropdown-item" href="product-details.php?slug=fire-sprinkler-systems">Sprinkler Systems</a></li>
              <li><a class="dropdown-item" href="product-details.php?slug=safety-accessories">Fire Safety Accessories</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link<?php echo $industriesActive ? ' active' : ''; ?>" href="industries.php"
               <?php echo $industriesActive ? 'aria-current="page"' : ''; ?>>Industries</a>
          </li>

          <li class="nav-item">
            <a class="nav-link<?php echo $solutionsActive ? ' active' : ''; ?>" href="solutions.php"
               <?php echo $solutionsActive ? 'aria-current="page"' : ''; ?>>Solutions</a>
          </li>

          <li class="nav-item">
            <a class="nav-link<?php echo $blogsActive ? ' active' : ''; ?>" href="blogs.php"
               <?php echo $blogsActive ? 'aria-current="page"' : ''; ?>>Blog</a>
          </li>

          <li class="nav-item">
            <a class="nav-link<?php echo $contactActive ? ' active' : ''; ?>" href="contact.php"
               <?php echo $contactActive ? 'aria-current="page"' : ''; ?>>Contact Us</a>
          </li>

        </ul>

        <!-- HEADER ACTIONS -->
        <div class="header-cta d-flex align-items-center gap-3 mt-3 mt-lg-0">
          <button class="search-btn" type="button" aria-label="Open website search"
                  aria-controls="siteSearchPanel" aria-expanded="false">
            <i class="bi bi-search" aria-hidden="true"></i>
          </button>
                          <a href="products.php" class="ab-btn">Get A Quote <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </div>

        <form class="site-search-panel" id="siteSearchPanel" role="search" hidden>
          <label for="siteSearchInput">Search products, industries, solutions and insights</label>
          <div class="site-search-control">
            <input id="siteSearchInput" type="search" autocomplete="off" placeholder="Try Fire Extinguishers">
            <button type="submit" class="btn-brand">Search</button>
          </div>
          <p class="site-search-message" id="siteSearchMessage" role="status" aria-live="polite">Search A1 Industry Finish Fire.</p>
          <ul class="site-search-results" id="siteSearchResults" aria-label="Search results"></ul>
        </form>
      </div>

    </div>
  </nav>
</header>