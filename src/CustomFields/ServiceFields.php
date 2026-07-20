<?php

namespace TailPress\CustomFields;

class ServiceFields
{
    public function register(): void
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        acf_add_local_field_group([
            'key' => 'group_service_fields',
            'title' => 'Información del Servicio',
            'fields' => [

                [
                    'key' => 'field_service_icon',
                    'label' => 'Icono',
                    'name' => 'icon',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ],

                [
                    'key' => 'field_service_short_description',
                    'label' => 'Descripción corta',
                    'name' => 'short_description',
                    'type' => 'textarea',
                    'rows' => 3,
                ],

                [
                    'key' => 'field_service_banner',
                    'label' => 'Banner',
                    'name' => 'banner',
                    'type' => 'image',
                    'return_format' => 'array',
                ],

                [
                    'key' => 'field_service_show_home',
                    'label' => 'Mostrar en Inicio',
                    'name' => 'show_home',
                    'type' => 'true_false',
                    'ui' => 1,
                    'default_value' => 1,
                ],

                [
                    'key' => 'field_service_order',
                    'label' => 'Orden',
                    'name' => 'order',
                    'type' => 'number',
                    'default_value' => 0,
                ],

            ],

            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'service',
                    ],
                ],
            ],
        ]);
    }
}