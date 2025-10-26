<!-- COMPONENT: features-01 -->
<?php
$features = hchild_field('features_items', false, array(
    array('icon' => 'https://placehold.co/28x28?text=🔔', 'title' => 'Notifications', 'description' => 'Never miss out. Get notified when your snippets change or get used.'),
    array('icon' => 'https://placehold.co/28x28?text=📚', 'title' => 'Documentation', 'description' => 'Comprehensive docs & guides across languages and frameworks.'),
    array('icon' => 'https://placehold.co/28x28?text=📊', 'title' => 'Analytics', 'description' => 'Gain deep insights into how and when your snippets are used.'),
    array('icon' => 'https://placehold.co/28x28?text=🔒', 'title' => 'Security', 'description' => 'Your code and data are encrypted at rest and in transit.'),
    array('icon' => 'https://placehold.co/28x28?text=🔗', 'title' => 'Integration', 'description' => 'Integrate with your favorite tools in a few clicks.'),
    array('icon' => 'https://placehold.co/28x28?text=💬', 'title' => 'Support', 'description' => 'Get 24/7 support from real developers & cloud engineers.'),
));
?>
<section class="w-full max-w-6xl mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-3 gap-8">
<?php
if (function_exists('snippethub_render_feature_items')) {
    snippethub_render_feature_items($features);
} else {
    // Simple fallback render with Font Awesome icons replacing decorative images
    foreach ($features as $f) {
        // determine icon class
        $icon_input = isset($f['icon']) ? $f['icon'] : '';
        $title = isset($f['title']) ? $f['title'] : '';
        $mapping = array(
            'Notifications' => 'fa-bell',
            'Documentation' => 'fa-book',
            'Analytics' => 'fa-chart-line',
            'Security' => 'fa-lock',
            'Integration' => 'fa-plug',
            'Support' => 'fa-headset',
        );
        $fa_class = 'fa-circle-info';
        if (is_string($icon_input) && strpos($icon_input, 'fa-') !== false) {
            // already an icon class
            $fa_class = $icon_input;
        } elseif (is_string($icon_input) && (strpos($icon_input, 'placehold.co') !== false || preg_match('#^https?://#', $icon_input))) {
            if (isset($mapping[$title])) {
                $fa_class = $mapping[$title];
            } else {
                $fa_class = 'fa-circle-info';
            }
        }

        echo '  <div class="flex flex-col items-center md:items-start text-center md:text-left">' . "\n";
        echo '    <div class="bg-[#18181e] rounded-lg p-4 mb-2 flex items-center">' . "\n";
        echo '      <span class="text-white w-7 h-7 flex items-center justify-center text-lg"><i class="fa-solid ' . esc_attr($fa_class) . '" aria-hidden="true"></i></span>' . "\n";
        echo '    </div>' . "\n";
        echo '    <h3 class="text-white font-semibold text-lg mb-1">' . esc_html($f['title']) . '</h3>' . "\n";
        echo '    <p class="text-[#c9cbd0] text-sm">' . esc_html($f['description']) . '</p>' . "\n";
        echo '  </div>' . "\n";
    }
}
?>
</section>