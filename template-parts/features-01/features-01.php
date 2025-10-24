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
    // Simple fallback render
    foreach ($features as $f) {
        echo '  <div class="flex flex-col items-center md:items-start text-center md:text-left">' . "
";
        echo '    <div class="bg-[#18181e] rounded-lg p-4 mb-2 flex items-center">' . "
";
        if (!empty($f['icon'])) {
            echo '      <img src="' . esc_url($f['icon']) . '" alt="' . esc_attr($f['title']) . ' icon" class="w-7 h-7" loading="lazy" />' . "
";
        }
        echo '    </div>' . "
";
        echo '    <h3 class="text-white font-semibold text-lg mb-1">' . esc_html($f['title']) . '</h3>' . "
";
        echo '    <p class="text-[#c9cbd0] text-sm">' . esc_html($f['description']) . '</p>' . "
";
        echo '  </div>' . "
";
    }
}
?>
</section>
