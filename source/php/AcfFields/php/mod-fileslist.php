<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5756ce3e48783',
    'title' => __('Files', 'modularity'),
    'fields' => array(
        0 => array(
            'key' => 'field_57fb41f2cb40e',
            'label' => __('Filer', 'modularity'),
            'name' => 'file_list',
            'aria-label' => '',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'min' => 1,
            'max' => 0,
            'layout' => 'block',
            'button_label' => __('Lägg till fil', 'modularity'),
            'collapsed' => '',
            'rows_per_page' => 20,
            'acfe_repeater_stylised_button' => 0,
            'sub_fields' => array(
                0 => array(
                    'key' => 'field_57fb4218cb40f',
                    'label' => __('Fil', 'modularity'),
                    'name' => 'file',
                    'aria-label' => '',
                    'type' => 'file',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'library' => 'all',
                    'min_size' => '',
                    'max_size' => '',
                    'mime_types' => '',
                    'uploader' => '',
                    'parent_repeater' => 'field_57fb41f2cb40e',
                ),
            ),
        ),
        1 => array(
            'key' => 'field_587600817ff7f',
            'label' => __('Filter', 'modularity'),
            'name' => 'show_filter',
            'aria-label' => '',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => 1,
            'message' => __('Tillåt filtrering', 'modularity'),
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
        2 => array(
            'key' => 'field_67507dc1a8793',
            'label' => __('Filter above card', 'modularity'),
            'name' => 'filter_above_card',
            'aria-label' => '',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array(
                0 => array(
                    0 => array(
                        'field' => 'field_587600817ff7f',
                        'operator' => '==',
                        'value' => '1',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => __('Yes', 'modularity'),
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'mod-fileslist',
            ),
        ),
        1 => array(
            0 => array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/fileslist',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
    'acfe_display_title' => '',
    'acfe_autosync' => '',
    'acfe_form' => 0,
    'acfe_meta' => '',
    'acfe_note' => '',
));
}