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
?>

<div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full border border-gray-100">
    <?php if ($image): ?>
        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-48 object-cover">
    <?php else: ?>
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
            <span class="text-gray-400">Sin imagen</span>
        </div>
    <?php endif; ?>
    
    <div class="p-6 flex-grow flex flex-col">
        <h3 class="text-xl font-bold mb-3 text-slate-800"><?php echo esc_html($title); ?></h3>
        
        <?php if ($description): ?>
            <p class="text-gray-600 mb-6 flex-grow"><?php echo esc_html($description); ?></p>
        <?php endif; ?>
        
        <?php if ($link): ?>
            <a href="<?php echo esc_url($link); ?>" class="inline-block mt-auto text-center bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                Saber más
            </a>
        <?php endif; ?>
    </div>
</div>
