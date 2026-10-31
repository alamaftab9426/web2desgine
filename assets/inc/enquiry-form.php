<?php
$formId = $formId ?? 'enquiryForm';
$whatsappNumber = preg_replace('/\D+/', '', $site['tel']);
?>
<form class="enquiry-form js-enquiry-form" id="<?php echo htmlspecialchars($formId, ENT_QUOTES, 'UTF-8'); ?>"
      data-whatsapp-number="<?php echo htmlspecialchars($whatsappNumber, ENT_QUOTES, 'UTF-8'); ?>"
      data-company-email="<?php echo htmlspecialchars($site['email'], ENT_QUOTES, 'UTF-8'); ?>" novalidate>
  <div class="row g-3">
    <div class="col-sm-6">
      <label class="form-label" for="<?php echo $formId; ?>Name">Full Name *</label>
      <input class="form-control" type="text" id="<?php echo $formId; ?>Name" name="name" required minlength="2" autocomplete="name" placeholder="Your name">
      <div class="invalid-feedback">Please enter your name.</div>
    </div>
    <div class="col-sm-6">
      <label class="form-label" for="<?php echo $formId; ?>Company">Company Name</label>
      <input class="form-control" type="text" id="<?php echo $formId; ?>Company" name="company" minlength="2" autocomplete="organization" placeholder="Your company">
      <div class="invalid-feedback">Please enter your company name.</div>
    </div>
    <div class="col-sm-6">
      <label class="form-label" for="<?php echo $formId; ?>Phone">Mobile Number *</label>
      <input class="form-control" type="tel" id="<?php echo $formId; ?>Phone" name="phone" required maxlength="24" inputmode="tel" autocomplete="tel" placeholder="Your mobile number">
      <div class="invalid-feedback">Enter a valid mobile number.</div>
    </div>
    <div class="col-sm-6">
      <label class="form-label" for="<?php echo $formId; ?>Email">Email Address *</label>
      <input class="form-control" type="email" id="<?php echo $formId; ?>Email" name="email" required autocomplete="email" placeholder="you@company.com">
      <div class="invalid-feedback">Enter a valid email address.</div>
    </div>
    <div class="col-12">
      <label class="form-label" for="<?php echo $formId; ?>Product">Product / Service Interest</label>
      <select class="form-select" id="<?php echo $formId; ?>Product" name="product">
        <option value="">Select a product or service</option>
        <option>Fire Extinguishers</option>
        <option>Hose Reel Systems</option>
        <option>Hydrant Systems</option>
        <option>Fire Alarm Systems</option>
        <option>Sprinkler Systems</option>
        <option>Safety Accessories</option>
        <option>Annual Maintenance / Service</option>
      </select>
    </div>
    <div class="col-12">
      <label class="form-label" for="<?php echo $formId; ?>Message">Requirement Details *</label>
      <textarea class="form-control" id="<?php echo $formId; ?>Message" name="message" rows="3" required placeholder="Tell us about your site, quantity or timeline"></textarea>
    </div>
    <div class="col-12">
      <div class="enquiry-form-actions">
        <button type="submit" class="btn-brand" name="action" value="whatsapp">
          Continue on WhatsApp <i class="bi bi-whatsapp" aria-hidden="true"></i>
        </button>
        <button type="submit" class="btn-email-draft" name="action" value="email">
          Prepare Email Draft <i class="bi bi-envelope" aria-hidden="true"></i>
        </button>
      </div>
      <p class="form-status" role="status" aria-live="polite"></p>
    </div>
  </div>
</form>
