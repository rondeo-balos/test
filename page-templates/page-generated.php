<?php
/**
 * Template Name: Generated Page (Snippethub)
 * Description: Page assembled from detected components (auto-generated).
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>
<body <?php body_class('bg-black'); ?> >

<?php
// Component order discovered from source
$ORDER = array(
    'nav-01',
    'hero-01',
    'code-preview-01',
    'features-01',
    'footer-01',
);

// Iterate with ability to group related components (hero + preview)
for ($i = 0; $i < count($ORDER); $i++) {
    $slug = $ORDER[$i];

    // If hero is immediately followed by code-preview, render them inside a shared two-column wrapper
    if ($slug === 'hero-01' && isset($ORDER[$i + 1]) && $ORDER[$i + 1] === 'code-preview-01') {
        echo '<section class="w-full max-w-7xl mx-auto px-6 md:px-16 lg:px-32 flex flex-col lg:flex-row items-center justify-center relative z-10">';
        get_template_part("template-parts/hero-01/hero-01");
        get_template_part("template-parts/code-preview-01/code-preview-01");
        echo '</section>';
        $i++; // skip the next since it's already rendered
        continue;
    }

    // Default rendering
    get_template_part("template-parts/{$slug}/{$slug}");
}
?>

<?php wp_footer(); ?>
</body>
</html>