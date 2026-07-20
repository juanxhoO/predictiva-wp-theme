<?php

namespace TailPress\CustomFields;

class EquipmentFields
{
    public function register(): void
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        acf_add_local_field_group([
            'key' => 'group_equipment_fields',
            'title' => 'Información del Equipo',
            'fields' => [

                [
                    'key' => 'field_equipment_short_description',
                    'label' => 'Descripción corta',
                    'name' => 'short_description',
                    'type' => 'textarea',
                    'rows' => 3,
                ],
                [
                    'key' => 'field_equipment_link',
                    'label' => 'Link del Producto',
                    'name' => 'link',
                    'type' => 'url',
                ],

                [
                    'key' => 'field_equipment_banner',
                    'label' => 'Banner',
                    'name' => 'banner',
                    'type' => 'image',
                    'return_format' => 'array',
                ],

                [
                    'key' => 'field_equipment_show_home',
                    'label' => 'Mostrar en Inicio',
                    'name' => 'show_home',
                    'type' => 'true_false',
                    'ui' => 1,
                    'default_value' => 1,
                ],

                [
                    'key' => 'field_equipment_order',
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
                        'value' => 'equipment',
                    ],
                ],
            ],
        ]);
    }
}