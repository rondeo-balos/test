<?php
/**
 * Small rendering helpers for template parts
 */

if (!function_exists('snippethub_render_nav_items')) {
    function snippethub_render_nav_items($items = array()) {
        if (empty($items) || !is_array($items)) {
            return;
        }
        foreach ($items as $item) {
            $label = isset($item['label']) ? $item['label'] : '';
            $url   = isset($item['url']) ? $item['url'] : '#';
            echo '    <li>' . "
";
            echo '      <a href="' . esc_attr($url) . '" class="text-gray-300 hover:text-white text-base focus:outline-none focus:underline">' . esc_html($label) . '</a>' . "
";
            echo '    </li>' . "
";
        }
    }
}

if (!function_exists('snippethub_render_feature_items')) {
    function snippethub_render_feature_items($items = array()) {
        if (empty($items) || !is_array($items)) {
            return;
        }
        foreach ($items as $item) {
            $icon = isset($item['icon']) && is_array($item['icon']) ? $item['icon']['url'] : (isset($item['icon']) ? $item['icon'] : '');
            $title = isset($item['title']) ? $item['title'] : '';
            $desc  = isset($item['description']) ? $item['description'] : '';
            echo '  <div class="flex flex-col items-center md:items-start text-center md:text-left">' . "
";
            echo '    <div class="bg-[#18181e] rounded-lg p-4 mb-2 flex items-center">' . "
";
            if ($icon) {
                echo '      <img src="' . esc_url($icon) . '" alt="' . esc_attr($title) . ' icon" class="w-7 h-7" loading="lazy" />' . "
";
            }
            echo '    </div>' . "
";
            echo '    <h3 class="text-white font-semibold text-lg mb-1">' . esc_html($title) . '</h3>' . "
";
            echo '    <p class="text-[#c9cbd0] text-sm">' . esc_html($desc) . '</p>' . "
";
            echo '  </div>' . "
";
        }
    }
}
?>
