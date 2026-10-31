<?php $formId = 'inlineEnquiry'; ?>

<!-- ENQUIRY MODAL (opened by "Enquiry Now" in the top bar) -->
<div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content enquiry-modal">
      <div class="row g-0">
        <div class="col-lg-5 enquiry-modal-side">
          <div class="enquiry-modal-image">
            <img src="assets/images/Fire%20Safety%20Equipment%20Industrial%20Banner.png" alt="Industrial fire safety equipment">
          </div>
          <div>
            <span class="eyebrow eyebrow-light">Quick Enquiry</span>
            <h3 class="h4">Let&rsquo;s make your site fire-safe.</h3>
            <p>Share your requirement and our technical team will help you plan reliable industrial fire protection.</p>
            <ul class="modal-points">
              <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i> IS &amp; CE certified range</li>
              <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i> Site survey &amp; installation</li>
              <li><i class="bi bi-check-circle-fill" aria-hidden="true"></i> Pan India delivery</li>
            </ul>
            <a class="modal-phone" href="tel:<?php echo $site['tel']; ?>"><i class="bi bi-telephone-fill" aria-hidden="true"></i> <?php echo htmlspecialchars($site['phone']); ?></a>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="enquiry-modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <h4 id="enquiryModalLabel">Request a Free Quote</h4>
            <?php $formId = 'modalForm'; include __DIR__ . '/enquiry-form.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>