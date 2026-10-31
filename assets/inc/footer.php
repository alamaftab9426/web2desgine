<footer class="site-footer" id="siteFooter">
  <div class="container">
    <div class="row g-4 g-xl-5 footer-main">

      <div class="col-lg-4">
        <a href="index.php" class="footer-logo" aria-label="A1 Industry Finish Fire - Home">
          <img src="<?php echo $site['logo']; ?>" alt="A1 Industry Finish Fire" width="190" height="62" loading="lazy">
        </a>
        <p class="footer-about">Leading manufacturer, exporter &amp; service provider of fire fighting equipment. Your safety is our priority.</p>
        <div class="footer-social">
          <a href="#" aria-label="Facebook"><i class="bi bi-facebook" aria-hidden="true"></i></a>
          <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin" aria-hidden="true"></i></a>
          <a href="#" aria-label="YouTube"><i class="bi bi-youtube" aria-hidden="true"></i></a>
          <a href="#" aria-label="Instagram"><i class="bi bi-instagram" aria-hidden="true"></i></a>
        </div>
      </div>

      <div class="col-6 col-lg-2">
        <h4>Quick Links</h4>
        <ul class="footer-links">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="industries.php">Industries</a></li>
          <li><a href="solutions.php">Solutions</a></li>
          <li><a href="blogs.php">Blog</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </div>

      <div class="col-6 col-lg-3">
        <h4>Our Products</h4>
        <ul class="footer-links">
          <li><a href="products.php">Fire Extinguishers</a></li>
          <li><a href="products.php">Hose Reel Systems</a></li>
          <li><a href="products.php">Hydrant Systems</a></li>
          <li><a href="products.php">Fire Alarm Systems</a></li>
          <li><a href="products.php">Sprinkler Systems</a></li>
          <li><a href="products.php">Safety Accessories</a></li>
          <li><a href="products.php">View All Products</a></li>
        </ul>
      </div>

      <div class="col-lg-3">
        <h4>Contact Us</h4>
        <ul class="footer-contact">
          <li><i class="bi bi-geo-alt-fill" aria-hidden="true"></i><span><?php echo htmlspecialchars($site['address']); ?></span></li>
          <li><i class="bi bi-telephone-fill" aria-hidden="true"></i><a href="tel:<?php echo $site['tel']; ?>"><?php echo htmlspecialchars($site['phone']); ?></a></li>
          <li><i class="bi bi-envelope-fill" aria-hidden="true"></i><a href="mailto:<?php echo $site['email']; ?>"><?php echo htmlspecialchars($site['email']); ?></a></li>
        </ul>
      </div>

    </div>
  </div>

  <div class="footer-bottom">
    <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
      <p class="mb-0">&copy; <span id="year">2026</span> A1 Industry Finish Fire. All Rights Reserved.</p>
      <div class="footer-legal">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms &amp; Conditions</a>
        <a href="#">Sitemap</a>
      </div>
    </div>
  </div>
</footer>

<?php include_once __DIR__ . '/modal.php'; ?>

<button class="to-top" id="toTop" type="button" aria-label="Back to top"><i class="bi bi-arrow-up" aria-hidden="true"></i></button>

<aside class="floating-contact-actions" aria-label="Quick contact actions">
  <a class="floating-contact floating-contact-whatsapp" href="https://wa.me/<?php echo htmlspecialchars($whatsappNumber, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Chat with us on WhatsApp">
    <i class="bi bi-whatsapp" aria-hidden="true"></i><span>WhatsApp</span>
  </a>
  <a class="floating-contact floating-contact-enquiry" href="#enquiryModal" data-bs-toggle="modal" data-bs-target="#enquiryModal" aria-label="Open the enquiry form">
    <i class="bi bi-chat-dots-fill" aria-hidden="true"></i><span>Enquiry</span>
  </a>
  <a class="floating-contact floating-contact-call" href="tel:<?php echo isset($site['tel']) ? htmlspecialchars($site['tel'], ENT_QUOTES, 'UTF-8') : ''; ?>" aria-label="Call A1 Industry Finish Fire">
    <i class="bi bi-telephone-fill" aria-hidden="true"></i><span>Call Us</span>
  </a>

</aside>