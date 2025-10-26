<!-- COMPONENT: hero-01 -->
<?php
$swirl = hchild_field('hero_swirl_image', false, array('url' => 'https://placehold.co/350x350?text=Swirl'));
$heading = hchild_field('hero_heading', false, 'Design, build, <br />publish. Repeat.');
$sub = hchild_field('hero_subheading', false, "Extensive documentation, user-friendly guides, and client stories available in popular programming languages such as Node.js, Python, and Ruby. Our focus on creating a seamless user experience is aimed at streamlining the process for you to achieve similar results effortlessly.");
$cta_label = hchild_field('hero_cta_label', false, 'Explore our documentation');
$cta_url = hchild_field('hero_cta_url', false, '#');
?>
<main class="flex-1 flex flex-col lg:flex-row items-center justify-center relative z-10">
    <div class="w-full lg:w-1/2 mb-12 lg:mb-0">
        <div aria-hidden="true" class="absolute left-[-75px] top-24 z-0">
            <img src="<?php echo esc_url(is_array($swirl) && isset($swirl['url']) ? $swirl['url'] : $swirl); ?>" alt="" class="opacity-40 pointer-events-none select-none" loading="lazy" />
        </div>
        <h1 class="relative z-10 text-white text-3xl md:text-4xl lg:text-5xl font-bold mb-4"><?php echo wp_kses_post($heading); ?></h1>
        <p class="relative z-10 text-[#c9cbd0] text-base md:text-lg leading-relaxed mb-7 max-w-lg"><?php echo esc_html($sub); ?></p>
        <a href="<?php echo esc_url($cta_url); ?>" class="relative z-10 inline-block bg-lime-400 hover:bg-lime-300 focus:ring-2 focus:ring-lime-400 focus:outline-none text-black font-semibold py-2 px-6 rounded-lg shadow-lg transition"><?php echo esc_html($cta_label); ?></a>
    </div>
</main>