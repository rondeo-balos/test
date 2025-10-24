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
<body <?php body_class('bg-black'); ?>>

<?php
// Component order discovered from source
$ORDER = array(
    'nav-01',
    'hero-01',
    'code-preview-01',
    'features-01',
    'footer-01',
);

foreach ($ORDER as $slug) {
    get_template_part("template-parts/{$slug}/{$slug}");
}
?>

<?php wp_footer(); ?>
</body>
</html>