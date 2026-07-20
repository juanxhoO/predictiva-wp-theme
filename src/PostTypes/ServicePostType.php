<?php

namespace TailPress\PostTypes;

class ServicePostType
{
    public function register()
    {
        register_post_type('service', [
            'labels' => [
                'name' => 'Servicios',
                'singular_name' => 'Servicio',
                'add_new' => 'Añadir servicio',
                'add_new_item' => 'Añadir nuevo servicio',
                'edit_item' => 'Editar servicio',
                'new_item' => 'Nuevo servicio',
                'view_item' => 'Ver servicio',
                'search_items' => 'Buscar servicios',
            ],
            'public' => true,
            'menu_icon' => 'dashicons-admin-tools',
            'has_archive' => true,
            'rewrite' => [
                'slug' => 'servicios'
            ],
            'supports' => [
                'title',
                'editor',
                'thumbnail',
                'excerpt'
            ],
            'show_in_rest' => true
        ]);
    }
}