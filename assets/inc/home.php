<?php
// Dynamic variable for phone/WhatsApp (if needed)
$whatsappNumber = isset($site['tel']) ? preg_replace('/\D+/', '', $site['tel']) : '';
?>

<main>

  <!-- ===================== HERO SLIDER ===================== -->
  <section class="hero" id="hero" aria-label="Featured fire safety solutions">
    <div class="swiper hero-swiper" id="heroSwiper">
      <div class="swiper-wrapper">

        <!-- Slide 1 -->
        <div class="swiper-slide hero-slide">
          <img class="hero-bg" src="assets/images/Firefighter%20Facing%20Sunset%20Refinery.png" alt="" fetchpriority="high">
          <div class="hero-overlay"></div>
          <div class="container hero-inner">
            <div class="hero-content">
              <span class="ab-eyebrow eyebrow-light hero-anim anim-delay-10">Fire Safety Solutions for a Safer Tomorrow</span>
              <h1 class="hero-title hero-anim anim-delay-25">Protecting Lives, <span>Industries &amp; Assets</span></h1>
              <p class="hero-text hero-anim anim-delay-40">A1 Industry Finish Fire — leading manufacturer, exporter &amp; service provider of fire fighting equipment with trusted quality, advanced technology and complete safety solutions.</p>
              <div class="hero-actions hero-anim anim-delay-55">
                <a href="products.php" class="ab-btn">Explore Products <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                <a href="#enquiryModal" class="btn-light-x" data-bs-toggle="modal" data-bs-target="#enquiryModal">Get a Quote <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide hero-slide">
          <img class="hero-bg" src="assets/images/Firefighters%20Battling%20an%20Industrial%20Blaze.png" alt="" loading="lazy">
          <div class="hero-overlay"></div>
          <div class="container hero-inner">
            <div class="hero-content">
              <span class="ab-eyebrow eyebrow-light hero-anim anim-delay-10">Certified Quality, Proven Performance</span>
              <h2 class="hero-title hero-anim anim-delay-25">Heavy-Duty Protection Built For <span>Every Industry</span></h2>
              <p class="hero-text hero-anim anim-delay-40">From refineries to warehouses, our extinguishers, hose reels and hydrant systems are engineered to act fast when every second counts.</p>
              <div class="hero-actions hero-anim anim-delay-55">
                <a href="products.php" class="ab-btn">Explore Products <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                <a href="#enquiryModal" class="btn-light-x" data-bs-toggle="modal" data-bs-target="#enquiryModal">Get a Quote <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide hero-slide">
          <img class="hero-bg" src="assets/images/Industrial%20Fire%20Safety%20at%20Sunset.png" alt="" loading="lazy">
          <div class="hero-overlay"></div>
          <div class="container hero-inner">
            <div class="hero-content">
              <span class="ab-eyebrow eyebrow-light hero-anim anim-delay-10">Pan India &amp; Global Delivery</span>
              <h2 class="hero-title hero-anim anim-delay-25">Fast Response. <span>Trusted Service.</span> Zero Compromise.</h2>
              <p class="hero-text hero-anim anim-delay-40">Site survey, supply, installation and annual maintenance — one partner for your complete fire protection lifecycle.</p>
              <div class="hero-actions hero-anim anim-delay-55">
                <a href="products.php" class="ab-btn">Explore Products <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                <a href="#enquiryModal" class="btn-light-x" data-bs-toggle="modal" data-bs-target="#enquiryModal">Get a Quote <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="hero-progress" aria-hidden="true"><span id="heroProgress"></span></div>
    </div>

    <!-- Trust badges row -->
    <div class="hero-trust">
      <div class="container">
        <ul>
          <li><i class="bi bi-patch-check" aria-hidden="true"></i><span>Certified Quality Products</span></li>
          <li><i class="bi bi-gear-wide-connected" aria-hidden="true"></i><span>Industry Grade Performance</span></li>
          <li><i class="bi bi-headset" aria-hidden="true"></i><span>Expert Technical Support</span></li>
          <li><i class="bi bi-truck" aria-hidden="true"></i><span>Pan India &amp; Global Delivery</span></li>
          <li><i class="bi bi-sliders" aria-hidden="true"></i><span>Customized Solutions</span></li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ===================== FEATURE STRIP ===================== -->
  <section class="ab-fact" aria-label="Key strengths">
    <div class="container">
      <div class="ab-feats">
        <div class="ab-feat">
          <span class="ab-feat-ico"><i class="bi bi-shield-check" aria-hidden="true"></i></span>
          <h3>IS &amp; CE Certified</h3>
          <p>Manufactured under international quality standards.</p>
        </div>
        <div class="ab-feat">
          <span class="ab-feat-ico"><i class="bi bi-building-gear" aria-hidden="true"></i></span>
          <h3>Heavy-Duty Design</h3>
          <p>Built for industrial and commercial use.</p>
        </div>
        <div class="ab-feat">
          <span class="ab-feat-ico"><i class="bi bi-lightning-charge-fill" aria-hidden="true"></i></span>
          <h3>Fast Action Performance</h3>
          <p>Quick fire suppression for maximum safety.</p>
        </div>
        <div class="ab-feat">
          <span class="ab-feat-ico"><i class="bi bi-globe-central-south-asia" aria-hidden="true"></i></span>
          <h3>Global Expertise</h3>
          <p>Trusted by clients in India &amp; multiple countries.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== ABOUT ===================== -->
  <section class="ab-story" id="about">
    <div class="container">
      <div class="ab-story-grid">
        <div class="ab-story-text" data-animate="left">
          <span class="ab-eyebrow">About A1 Industry</span>
          <h2>Leading Manufacturer, Exporter &amp; Service Provider of Fire Fighting Equipment</h2>
          <p>We are manufacturing, exporting and servicing a high-quality range of Fire Extinguishers, Hose Reels, Fire Hydrant Systems, Fire Alarm Systems and allied safety products. Our focus is on quality, innovation and complete customer satisfaction.</p>

          <div class="stat-row">
            <div class="stat"><strong data-count="10" data-suffix="+">0</strong><span>Years of Experience</span></div>
            <div class="stat"><strong data-count="500" data-suffix="+">0</strong><span>Happy Clients</span></div>
            <div class="stat"><strong data-count="25" data-suffix="+">0</strong><span>Countries Export</span></div>
            <div class="stat"><strong data-count="1000" data-suffix="+">0</strong><span>Products Delivered</span></div>
          </div>

          <a href="about.php" class="ab-btn">Know More About Us <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </div>

        <div class="ab-story-media" data-animate="right">
          <div class="ab-story-img">
            <img src="assets/images/Modern%20Office%20Sprinkler%20Safety%20Display.png" alt="Fire protection equipment installed in a modern commercial building" loading="lazy">
          </div>
          <div class="ab-exp-badge">
            <span class="ab-exp-ico"><i class="bi bi-shield-fill-check" aria-hidden="true"></i></span>
            <div><strong>Your Safety</strong><span>Our Priority</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== PRODUCTS ===================== -->
  <section class="ab-prod" id="products">
    <div class="container">
      <div class="section-head">
        <div class="ab-sec-head" data-animate="up">
          <span class="ab-eyebrow">Our Products</span>
          <h2>Complete Range of Fire Fighting Equipment</h2>
          <p>Premium quality products designed for maximum safety and performance in industrial, commercial and residential applications.</p>
        </div>
        <div class="head-actions">
          <a href="products.php" class="link-arrow">View All Products <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
          <div class="slider-nav">
            <button type="button" class="nav-circle products-prev" aria-label="Previous products"><i class="bi bi-chevron-left" aria-hidden="true"></i></button>
            <button type="button" class="nav-circle products-next" aria-label="Next products"><i class="bi bi-chevron-right" aria-hidden="true"></i></button>
          </div>
        </div>
      </div>

      <div class="swiper products-swiper" id="productsSwiper" data-animate="up">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <article class="product-card">
              <div class="product-thumb"><img src="assets/images/Industrial%20Fire%20Safety%20Inspection.png" alt="Fire Extinguishers" loading="lazy"></div>
              <div class="product-body">
                <h3>Fire Extinguishers</h3>
                <p>Wide range for all fire classes</p>
                <a href="products.php" class="link-arrow sm">View Details <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="product-card">
              <div class="product-thumb"><img src="assets/images/Sunset%20Industrial%20Fire%20Safety%20Plant.png" alt="Hose Reel Systems" loading="lazy"></div>
              <div class="product-body">
                <h3>Hose Reel Systems</h3>
                <p>Reliable &amp; durable performance</p>
                <a href="products.php" class="link-arrow sm">View Details <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="product-card">
              <div class="product-thumb"><img src="assets/images/Industrial%20Fire%20Safety%20at%20Sunset.png" alt="Hydrant Systems" loading="lazy"></div>
              <div class="product-body">
                <h3>Hydrant Systems</h3>
                <p>Complete fire protection solutions</p>
                <a href="products.php" class="link-arrow sm">View Details <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="product-card">
              <div class="product-thumb"><img src="assets/images/Modern%20Office%20Sprinkler%20Safety%20Display.png" alt="Fire Alarm Systems" loading="lazy"></div>
              <div class="product-body">
                <h3>Fire Alarm Systems</h3>
                <p>Advanced detection &amp; alert systems</p>
                <a href="products.php" class="link-arrow sm">View Details <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="product-card">
              <div class="product-thumb"><img src="assets/images/Firefighter%20Facing%20Sunset%20Refinery.png" alt="Safety Accessories" loading="lazy"></div>
              <div class="product-body">
                <h3>Safety Accessories</h3>
                <p>Essential safety equipment</p>
                <a href="products.php" class="link-arrow sm">View Details <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="product-card">
              <div class="product-thumb"><img src="assets/images/Modern%20Office%20Sprinkler%20Safety%20Display.png" alt="Sprinkler Systems" loading="lazy"></div>
              <div class="product-body">
                <h3>Sprinkler Systems</h3>
                <p>Automatic suppression for large spaces</p>
                <a href="products.php" class="link-arrow sm">View Details <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
              </div>
            </article>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- ===================== INDUSTRIES ===================== -->
  <section class="ab-ind industries-bg" id="industries">
    <div class="container">
      <div class="ab-sec-head ab-sec-head--light" data-animate="up">
        <span class="ab-eyebrow accent">Industries We Serve</span>
        <h2>Reliable Fire Safety Solutions for Every Industry</h2>
        <p>Our products and systems are trusted across a wide range of industries, ensuring safety, compliance and peace of mind.</p>
      </div>

      <div class="row g-3">
        <div class="col-6 col-md-4 col-xl-2 anim-delay-00" data-animate="up">
          <a href="industries.php" class="industry-card">
            <img src="assets/images/Industrial%20Fire%20Safety%20Inspection.png" alt="" loading="lazy">
            <span class="industry-overlay"></span>
            <span class="industry-label"><i class="bi bi-gear-wide-connected" aria-hidden="true"></i> Manufacturing Industries</span>
          </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2 anim-delay-08" data-animate="up">
          <a href="industries.php" class="industry-card">
            <img src="assets/images/Firefighter%20Facing%20Sunset%20Refinery.png" alt="" loading="lazy">
            <span class="industry-overlay"></span>
            <span class="industry-label"><i class="bi bi-fuel-pump" aria-hidden="true"></i> Oil &amp; Gas Industries</span>
          </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2 anim-delay-16" data-animate="up">
          <a href="industries.php" class="industry-card">
            <img src="assets/images/Sunset%20Industrial%20Fire%20Safety%20Plant.png" alt="" loading="lazy">
            <span class="industry-overlay"></span>
            <span class="industry-label"><i class="bi bi-droplet-half" aria-hidden="true"></i> Chemical Industries</span>
          </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2 anim-delay-24" data-animate="up">
          <a href="industries.php" class="industry-card">
            <img src="assets/images/Modern%20Office%20Sprinkler%20Safety%20Display.png" alt="" loading="lazy">
            <span class="industry-overlay"></span>
            <span class="industry-label"><i class="bi bi-capsule" aria-hidden="true"></i> Pharmaceutical Industries</span>
          </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2 anim-delay-32" data-animate="up">
          <a href="industries.php" class="industry-card">
            <img src="assets/images/Industrial%20Fire%20Safety%20at%20Sunset.png" alt="" loading="lazy">
            <span class="industry-overlay"></span>
            <span class="industry-label"><i class="bi bi-buildings" aria-hidden="true"></i> Commercial Buildings</span>
          </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2 anim-delay-40" data-animate="up">
          <a href="industries.php" class="industry-card">
            <img src="assets/images/Firefighters%20Battling%20an%20Industrial%20Blaze.png" alt="" loading="lazy">
            <span class="industry-overlay"></span>
            <span class="industry-label"><i class="bi bi-house-heart" aria-hidden="true"></i> Residential Complexes</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== WHY CHOOSE US ===================== -->
  <section class="ab-why" id="why-us">
    <div class="container">
      <div class="ab-why-head" data-animate="up">
        <span class="ab-eyebrow">Why Choose A1 Industry (Finish Fire)</span>
        <h2>Your Trusted Partner in Fire Safety</h2>
        <p>We deliver end-to-end fire safety solutions with guaranteed build quality, technical precision and dedicated customer service. Our commitment to innovation and safety makes us a preferred choice across industries.</p>
      </div>

      <div class="ab-why-grid" data-animate="up">
        <article class="ab-why-card">
          <span class="ab-why-ico"><i class="bi bi-gem" aria-hidden="true"></i></span>
          <h3>Premium Quality</h3>
          <p>Standard materials &amp; strict quality control.</p>
        </article>
        <article class="ab-why-card">
          <span class="ab-why-ico"><i class="bi bi-people" aria-hidden="true"></i></span>
          <h3>Expert Supervision</h3>
          <p>Professional installation and support.</p>
        </article>
        <article class="ab-why-card">
          <span class="ab-why-ico"><i class="bi bi-currency-rupee" aria-hidden="true"></i></span>
          <h3>Cost-Effective Pricing</h3>
          <p>Best value with customized solutions.</p>
        </article>
        <article class="ab-why-card">
          <span class="ab-why-ico"><i class="bi bi-headset" aria-hidden="true"></i></span>
          <h3>Prompt Support</h3>
          <p>Quick response and dedicated service team.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ===================== CTA BANNER ===================== -->
  <section class="ix-cta-section cta-blaze-bg" id="cta">
    <div class="ix-cta-box">
      <div class="ix-cta-visual" aria-hidden="true"></div>
      <div class="container">
        <div class="ix-cta-content" data-animate="up">
          <span class="ix-cta-subtitle">Get a Custom Solution</span>
          <h2>Need a Fire Safety <span>Solution for Your Industry?</span></h2>
          <p>Our experts are ready to help you with the best fire protection system.</p>
          <a href="#enquiryModal" class="ix-cta-btn" data-bs-toggle="modal" data-bs-target="#enquiryModal">Request a Quote <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== CERTIFICATIONS ===================== -->
  <section class="ab-process certs" id="certifications">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-6" data-animate="left">
          <span class="ab-eyebrow">Our Certifications</span>
          <h2>Quality You Can Trust</h2>
          <p>Our products are manufactured under international quality standards and comply with all relevant safety regulations.</p>
        </div>
        <div class="col-lg-6" data-animate="right">
          <div class="cert-row">
            <div class="cert-badge"><i class="bi bi-patch-check-fill" aria-hidden="true"></i><strong>ISI</strong><small>Bureau of Indian Standards</small></div>
            <div class="cert-badge"><i class="bi bi-check2-circle" aria-hidden="true"></i><strong>CE</strong><small>European Conformity</small></div>
            <div class="cert-badge"><i class="bi bi-globe2" aria-hidden="true"></i><strong>ISO</strong><small>Quality Management</small></div>
            <div class="cert-badge"><i class="bi bi-leaf-fill" aria-hidden="true"></i><strong>RoHS</strong><small>Compliant</small></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== BLOGS ===================== -->
  <section class="ab-faq blogs" id="blogs">
    <div class="container">
      <div class="section-head">
        <div class="ab-sec-head" data-animate="up">
          <span class="ab-eyebrow">Latest Insights</span>
          <h2>News, Blogs &amp; Updates</h2>
          <p>Stay updated with the latest news, safety tips and industry insights.</p>
        </div>
        <div class="head-actions">
          <a href="blogs.php" class="link-arrow">View All Articles <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
          <div class="slider-nav">
            <button type="button" class="nav-circle blogs-prev" aria-label="Previous articles"><i class="bi bi-chevron-left" aria-hidden="true"></i></button>
            <button type="button" class="nav-circle blogs-next" aria-label="Next articles"><i class="bi bi-chevron-right" aria-hidden="true"></i></button>
          </div>
        </div>
      </div>

      <div class="swiper blogs-swiper" id="blogsSwiper" data-animate="up">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <article class="blog-card">
              <div class="blog-thumb">
                <img src="assets/images/Industrial%20Fire%20Safety%20Inspection.png" alt="" loading="lazy">
                <span class="blog-tag">Safety Tips</span>
                <span class="blog-date">15 Oct 2026</span>
              </div>
              <div class="blog-body">
                <h3><a href="blogs.php">5 Essential Fire Safety Tips for Industrial Facilities</a></h3>
                <a href="blogs.php" class="link-arrow sm">Read More <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="blog-card">
              <div class="blog-thumb">
                <img src="assets/images/Sunset%20Industrial%20Fire%20Safety%20Plant.png" alt="" loading="lazy">
                <span class="blog-tag">Industry News</span>
                <span class="blog-date">10 Oct 2026</span>
              </div>
              <div class="blog-body">
                <h3><a href="blogs.php">Importance of Fire Hydrant Systems in Large Industrial Plants</a></h3>
                <a href="blogs.php" class="link-arrow sm">Read More <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="blog-card">
              <div class="blog-thumb">
                <img src="assets/images/Modern%20Office%20Sprinkler%20Safety%20Display.png" alt="" loading="lazy">
                <span class="blog-tag">Product Guide</span>
                <span class="blog-date">05 Oct 2026</span>
              </div>
              <div class="blog-body">
                <h3><a href="blogs.php">How to Choose the Right Fire Alarm System for Your Business</a></h3>
                <a href="blogs.php" class="link-arrow sm">Read More <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
              </div>
            </article>
          </div>

          <div class="swiper-slide">
            <article class="blog-card">
              <div class="blog-thumb">
                <img src="assets/images/Industrial%20Fire%20Safety%20at%20Sunset.png" alt="" loading="lazy">
                <span class="blog-tag">Compliance</span>
                <span class="blog-date">28 Sep 2026</span>
              </div>
              <div class="blog-body">
                <h3><a href="blogs.php">Fire Extinguisher Inspection: A Practical Checklist</a></h3>
                <a href="blogs.php" class="link-arrow sm">Read More <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
              </div>
            </article>
          </div>

        </div>
      </div>
    </div>
  </section>

</main>