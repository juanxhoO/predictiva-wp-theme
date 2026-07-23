<?php
/**
 * Template part for displaying a service card
 *
 * @var array $args
 */

$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$image = $args['image'] ?? '';
$link = $args['link'] ?? '';
$target = $args['target'] ?? '';

// WhatsApp configuration
$whatsapp_number = get_theme_mod('whatsapp_number', '1111111111');
$whatsapp_message = 'Hola, estoy interesado en el producto:"' . $title . '"';
$whatsapp_url = 'https://api.whatsapp.com/send?phone=' . $whatsapp_number . '&text=' . urlencode($whatsapp_message); ?>
<div
    class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col h-full border border-gray-100">
    <?php if ($image): ?>
        <a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>"
            class="block overflow-hidden relative">
            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>"
                class="w-full h-48 object-contain transition-transform duration-500 hover:scale-105">
        </a>
    <?php endif; ?>

    <div class="p-6 flex-grow flex flex-col">
        <h3 class="text-xl font-bold mb-4 text-slate-800">
            <a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>"
                class="hover:text-blue-600 transition-colors duration-300 flex flex-col items-start">
                <span><?php echo esc_html($title); ?></span>
                <span class="mt-3 w-12 h-1 bg-blue-600 transition-all duration-300 hover:w-full"></span>
            </a>
        </h3>

        <?php if ($description): ?>
            <p class="text-gray-600 mb-6 flex-grow leading-relaxed"><?php echo esc_html($description); ?></p>
        <?php endif; ?>

        <?php if ($link): ?>
            <div class="mt-auto flex flex-col gap-2">
                <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank"
                    class="flex w-full items-center justify-center rounded-lg bg-brand-red px-6 py-3 font-semibold text-white shadow-md transition-all duration-300 hover:-translate-y-1 hover:bg-red-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                    <span>Adquirir</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="ml-2 h-5 w-5 transition-transform duration-300 hover:translate-x-1" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 12h15" />
                    </svg>
                </a>
                <a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>"
                    class="flex w-full items-center justify-center rounded-lg border-2 border-blue-600 px-6 py-3 font-semibold text-blue-600 transition-all duration-300 hover:bg-blue-50 hover:border-blue-700 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                    <span>Saber más</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="ml-2 h-5 w-5 transition-transform duration-300 hover:translate-x-1" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 12h15" />
                    </svg>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>