<?php
$catalog = [
    'fire-extinguishers' => ['title' => 'Fire Extinguishers', 'summary' => 'Fire extinguishers for industrial, commercial and residential fire protection.'],
    'abc-fire-extinguisher' => ['title' => 'ABC Type Fire Extinguisher', 'summary' => 'ABC fire extinguisher for common industrial and commercial fire risks.'],
    'co2-fire-extinguisher' => ['title' => 'CO₂ Fire Extinguisher', 'summary' => 'CO₂ fire extinguisher for electrical and equipment fire risks.'],
    'hose-reel-systems' => ['title' => 'Hose Reel Systems', 'summary' => 'Fire hose reel systems for reliable first-response fire protection.'],
    'fire-hose-reel' => ['title' => 'Fire Hose Reel', 'summary' => 'Fire hose reel equipment for industrial and commercial applications.'],
    'hydrant-systems' => ['title' => 'Hydrant Systems', 'summary' => 'Hydrant systems and valves for fire protection installations.'],
    'double-outlet-hydrant-valve' => ['title' => 'Double Outlet Hydrant Valve', 'summary' => 'Double outlet hydrant valve for fire fighting systems.'],
    'fire-alarm-systems' => ['title' => 'Fire Alarm Systems', 'summary' => 'Fire alarm solutions for detection and warning applications.'],
    'fire-sprinkler-systems' => ['title' => 'Fire Sprinkler Systems', 'summary' => 'Automatic fire sprinkler systems for fire suppression.'],
    'fire-hoses' => ['title' => 'Fire Hoses', 'summary' => 'Durable fire hoses for fire fighting applications.'],
    'valves-accessories' => ['title' => 'Valves & Accessories', 'summary' => 'Control valves, landing valves and fire safety accessories.'],
    'safety-accessories' => ['title' => 'Safety Accessories', 'summary' => 'Safety signs, cabinets and supporting fire safety equipment.'],
];

$reqSlug   = (isset($_GET['slug']) && is_string($_GET['slug'])) ? $_GET['slug'] : '';
$a1Product = ($reqSlug !== '' && isset($catalog[$reqSlug])) ? $catalog[$reqSlug] : null;
if (!$a1Product && !headers_sent()) {
    http_response_code(404);
}

include_once("assets/inc/top.php");
$selectedProduct = $a1Product;
$pageTitle = $a1Product
    ? $a1Product['title'] . ' | A1 Industry Finish Fire'
    : 'Product Not Found | A1 Industry Finish Fire';
$pageDescription = $a1Product
    ? $a1Product['summary'] . ' Enquire with A1 Industry Finish Fire — manufacturer, exporter and service provider of fire fighting equipment.'
    : 'The product you are looking for could not be found. Browse the A1 Industry Finish Fire product range.';
?>
  <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>">
<?php if (!$a1Product): ?>
  <meta name="robots" content="noindex">
<?php endif; ?>
  <meta name="theme-color" content="#0b1730">
  <link rel="icon" href="assets/images/a1industry-logo.jpg">
<?php include_once("assets/inc/top-link.php"); ?>
</head>
<body class="site-page inner-page product-detail-body">

<?php include_once("assets/inc/navbar.php"); ?>

<!-- PRODUCT DETAIL CONTENT START -->
<?php include_once("assets/inc/product-details.php"); ?>
<!-- PRODUCT DETAIL CONTENT END -->
<?php include_once("assets/inc/footer.php"); ?>
<?php include_once("assets/inc/footer-link.php"); ?>

</body>
</html>