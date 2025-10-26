<!-- COMPONENT: footer-01 -->
<?php
$footer_logo = hchild_field('footer_logo', false, array('url' => 'https://placehold.co/32x32?text=Logo'));
$footer_site_title = hchild_field('footer_site_title', false, 'SnippetHub');
$footer_links = hchild_field('footer_links', false, array(
    array('label' => 'Documentation', 'url' => '#'),
    array('label' => 'Status', 'url' => '#'),
    array('label' => 'Privacy', 'url' => '#'),
    array('label' => 'Contact', 'url' => '#'),
));
$copyright = hchild_field('footer_copyright', false, '&copy; 2025 SnippetHub. All rights reserved.');
?>
<footer class="w-full py-10 px-6 md:px-16 lg:px-32 bg-[#13141a] flex flex-col md:flex-row items-center justify-between">
  <div class="flex items-center space-x-3 mb-4 md:mb-0">
    <?php
    $footer_logo_url = is_array($footer_logo) && isset($footer_logo['url']) ? $footer_logo['url'] : $footer_logo;
    if (!empty($footer_logo_url) && strpos($footer_logo_url, 'placehold.co') === false) {
        echo '<img src="' . esc_url($footer_logo_url) . '" alt="' . esc_attr($footer_site_title) . ' Logo" class="w-8 h-8 rounded-full" loading="lazy" />';
    } else {
        echo '<span class="text-white text-lg"><i class="fa-solid fa-code" aria-hidden="true"></i><span class="sr-only">' . esc_html($footer_site_title) . '</span></span>';
    }
    ?>
    <span class="text-gray-300 text-lg font-semibold"><?php echo esc_html($footer_site_title); ?></span>
  </div>
  <div class="flex flex-wrap gap-6 text-sm text-gray-400">
<?php
if (!empty($footer_links) && is_array($footer_links)) {
    foreach ($footer_links as $link) {
        $label = isset($link['label']) ? $link['label'] : '';
        $url = isset($link['url']) ? $link['url'] : '#';
        echo '    <a href="' . esc_attr($url) . '" class="hover:text-lime-400 focus:underline focus:outline-none">' . esc_html($label) . '</a>' . "\n";
    }
}
?>
  </div>
  <div class="mt-4 md:mt-0 text-xs text-gray-600 text-center md:text-right">
    <?php echo wp_kses_post($copyright); ?>
  </div>
</footer>