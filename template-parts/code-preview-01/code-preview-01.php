<!-- COMPONENT: code-preview-01 -->
<?php
$code_blocks = hchild_field('code_blocks', false, array(
    array('label' => 'Output', 'content' => "@font-face {
  font-family: 'Swatch';
  src: url('swatch.woff2');
}
body {
  font-family: 'Swatch', sans-serif;
  background: #000D00;
  color: #f0f0f0;
}
a {
  color: #a8ff60;
  text-decoration: none;
}"),
));
$footer_label = hchild_field('code_footer_label', false, 'Explore documentation →');
$footer_url = hchild_field('code_footer_url', false, '#');
?>
<div class="w-full lg:w-1/2 flex justify-center lg:justify-end relative z-10">
  <div class="bg-gradient-to-br from-[#1e1a26] to-[#2a2f21] rounded-xl shadow-2xl p-0 border border-[#25292d] max-w-lg w-full relative">
    <div class="flex border-b border-[#232627] bg-[#16171b] rounded-t-xl overflow-hidden">
<?php
// Render tabs
if (!empty($code_blocks) && is_array($code_blocks)) {
    $first = true;
    foreach ($code_blocks as $block) {
        $label = isset($block['label']) ? $block['label'] : 'Tab';
        $classes = $first ? 'px-5 py-2 text-sm font-medium text-black bg-lime-400 rounded-tl-xl focus:outline-none' : 'px-5 py-2 text-sm font-medium text-gray-400 hover:text-white focus:outline-none';
        echo '      <button class="' . esc_attr($classes) . '">' . esc_html($label) . '</button>' . "
";
        $first = false;
    }
} else {
    echo '      <button class="px-5 py-2 text-sm font-medium text-black bg-lime-400 rounded-tl-xl">Output</button>';
}
?>
    </div>
    <pre class="bg-[#18181e] px-6 py-5 text-[#d8e2ea] text-xs md:text-sm font-mono rounded-b-xl rounded-tr-xl overflow-x-auto whitespace-pre h-64"><code>
<?php
// Show first code block content or fallback
$active_content = '';
if (!empty($code_blocks) && is_array($code_blocks) && isset($code_blocks[0]['content'])) {
    $active_content = $code_blocks[0]['content'];
}
echo esc_html($active_content);
?>
    </code></pre>
    <div class="px-6 py-2 border-t border-[#232627] bg-[#16171b] text-right rounded-b-xl">
      <a href="<?php echo esc_url($footer_url); ?>" class="text-[#a8ff60] text-xs font-medium hover:underline focus:underline focus:outline-none"><?php echo esc_html($footer_label); ?></a>
    </div>
  </div>
  <div aria-hidden="true" class="hidden lg:block absolute -top-20 -right-32 w-96 h-96 z-0 pointer-events-none">
    <div class="w-full h-full rounded-full bg-gradient-to-tr from-lime-400/60 via-transparent to-transparent blur-2xl opacity-70"></div>
  </div>
</div>
