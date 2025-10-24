<!-- COMPONENT: nav-01 -->
<?php
$logo = hchild_field('nav_logo', false, array('url' => 'https://placehold.co/40x40?text=Logo'));
$site_title = hchild_field('nav_site_title', false, 'SnippetHub');
$nav_items = hchild_field('nav_items', false, array(
    array('label' => 'Documentation', 'url' => '#'),
    array('label' => 'Features', 'url' => '#'),
    array('label' => 'Pricing', 'url' => '#'),
    array('label' => 'Contact', 'url' => '#'),
));
?>
<header class="w-full flex items-center justify-between py-8 px-6 md:px-16 lg:px-32">
    <div class="flex items-center space-x-3">
        <img src="<?php echo esc_url(is_array($logo) && isset($logo['url']) ? $logo['url'] : $logo); ?>" alt="<?php echo esc_attr($site_title); ?> Logo" class="w-10 h-10 rounded-full" loading="lazy" />
        <span class="text-white text-xl font-semibold tracking-tight"><?php echo esc_html($site_title); ?></span>
    </div>
    <nav aria-label="Main navigation">
        <ul class="flex space-x-8 items-center">
<?php
if (function_exists('snippethub_render_nav_items')) {
    snippethub_render_nav_items($nav_items);
} else {
    // Fallback single link
    echo '  <li><a href="#" class="text-gray-300 hover:text-white text-base">Documentation</a></li>';
}
?>
        </ul>
    </nav>
</header>
