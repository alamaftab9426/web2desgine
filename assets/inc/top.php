<?php
$site = [
    'name'    => 'A1 Industry Finish Fire',
    'phone'   => '+91 99765 43210',
    'tel'     => '+919976543210',
    'email'   => 'info@a1industry.com',
    'address' => 'Industrial Area, Maharashtra, India',
    'logo'    => 'assets/images/a1industry-logo.jpg',
];
$whatsappNumber = preg_replace('/\D+/', '', $site['tel']);
$currentPage = basename($_SERVER['PHP_SELF'] ?? 'index.php');
$isHome      = ($currentPage === 'index.php');
$homePrefix = $isHome ? '' : 'index.php';
$footerHome = $homePrefix;

$aboutActive      = ($currentPage === 'about.php');
$productsActive   = in_array($currentPage, ['products.php', 'product-details.php'], true);
$solutionsActive  = ($currentPage === 'solutions.php');
$industriesActive = ($currentPage === 'industries.php');
$blogsActive      = in_array($currentPage, ['blogs.php', 'blog-details.php'], true);
$contactActive    = ($currentPage === 'contact.php');
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">