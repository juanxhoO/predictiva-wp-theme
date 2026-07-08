<?php

namespace TailPress\Walkers;

class MegaMenuWalker extends \Walker_Nav_Menu
{
    /**
     * Start Level
     */
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);

        if ($depth === 0) {
            $output .= "\n{$indent}<div class=\"mega-menu-wrapper\">";
            $output .= "\n{$indent}<ul class=\"mega-menu\">";
        } else {
            $output .= "\n{$indent}<ul class=\"submenu\">";
        }
    }

    /**
     * End Level
     */
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);

        if ($depth === 0) {
            $output .= "</ul></div>";
        } else {
            $output .= "</ul>";
        }
    }

    /**
     * Start Element
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes = empty($item->classes) ? [] : (array) $item->classes;

        $has_children = in_array('menu-item-has-children', $classes);

        if ($depth === 0) {

            $output .= '<li class="relative group">';

            $output .= sprintf(
                '<a href="%s" class="flex items-center gap-2 py-6 font-medium text-gray-700 hover:text-black transition">',
                esc_url($item->url)
            );

            $output .= esc_html($item->title);

            if ($has_children) {

                $output .= '
                <svg class="h-4 w-4 transition-transform duration-300 group-hover:rotate-180"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M19 9l-7 7-7-7"/>

                </svg>';
            }

            $output .= '</a>';
        } else {

            $output .= '<li>';

            $output .= sprintf(
                '<a href="%s" class="block rounded-xl p-4 hover:bg-gray-50 transition">',
                esc_url($item->url)
            );

            $output .= '<div class="font-medium">';
            $output .= esc_html($item->title);
            $output .= '</div>';

            if (!empty($item->description)) {

                $output .= sprintf(
                    '<div class="mt-1 text-sm text-gray-500">%s</div>',
                    esc_html($item->description)
                );
            }

            $output .= '</a>';
        }
    }

    /**
     * End Element
     */
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= '</li>';
    }
}