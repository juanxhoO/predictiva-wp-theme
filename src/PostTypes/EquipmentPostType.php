<?php

namespace TailPress\PostTypes;

class EquipmentPostType
{
    public function register()
    {
        register_post_type('equipment', [
            'labels' => [
                'name' => 'Equipos',
                'singular_name' => 'Equipo',
                'add_new' => 'Añadir equipo',
                'add_new_item' => 'Añadir nuevo equipo',
                'edit_item' => 'Editar equipo',
                'new_item' => 'Nuevo equipo',
                'view_item' => 'Ver equipo',
                'search_items' => 'Buscar equipos',
            ],
            'public' => true,
            'menu_icon' => 'dashicons-admin-tools',
            'has_archive' => false,
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