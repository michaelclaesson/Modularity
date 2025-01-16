<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_64ff22b117e2c',
    'title' => __('Manual Input Data', 'modularity'),
    'fields' => array(
        0 => array(
            'key' => 'field_64ff23d0d91bf',
            'label' => __('Display as', 'modularity'),
            'name' => 'display_as',
            'aria-label' => '',
            'type' => 'image_select',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'row-row-row-row-row-row-row-row-row-row-651d5ccf5ac81' => array(
                    'image-select-repeater-label' => 'Accordion',
                    'image-select-repeater-value' => 'accordion',
                ),
                'row-row-row-row-row-row-row-row-row-row-651d5cdb5ac82' => array(
                    'image-select-repeater-label' => 'Block',
                    'image-select-repeater-value' => 'block',
                ),
                'row-row-row-row-row-row-row-row-row-row-651d5cdf5ac83' => array(
                    'image-select-repeater-label' => 'Box',
                    'image-select-repeater-value' => 'box',
                ),
                'row-row-row-row-row-row-row-row-row-row-651d5ce55ac84' => array(
                    'image-select-repeater-label' => 'Card',
                    'image-select-repeater-value' => 'card',
                ),
                'row-row-row-row-row-row-row-row-row-row-651d5ceb5ac85' => array(
                    'image-select-repeater-label' => 'Collection',
                    'image-select-repeater-value' => 'collection',
                ),
                'row-row-row-row-row-row-row-row-row-row-651d5cf65ac86' => array(
                    'image-select-repeater-label' => 'List',
                    'image-select-repeater-value' => 'list',
                ),
                'row-row-row-row-row-row-651ffdc788395' => array(
                    'image-select-repeater-label' => 'Segment',
                    'image-select-repeater-value' => 'segment',
                ),
                '6757ee687d940' => array(
                    'image-select-repeater-label' => 'News',
                    'image-select-repeater-value' => 'news',
                ),
            ),
        ),
        1 => array(
            'key' => 'field_6752f959acfda',
            'label' => __('display_as_conditional', 'modularity'),
            'name' => 'display_as_conditional',
            'aria-label' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => 'acf-hidden',
                'id' => '',
            ),
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
        ),
        2 => array(
            'key' => 'field_67126c170c176',
            'label' => __('Allow logged in users to modify their list', 'modularity'),
            'name' => 'allow_user_modification',
            'aria-label' => '',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '30',
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
            'ui' => 1,
        ),
        3 => array(
            'key' => 'field_678784f60a1a6',
            'label' => __('Save as custom meta key', 'modularity'),
            'name' => 'save_as_custom_meta_key',
            'aria-label' => '',
            'type' => 'text',
            'instructions' => __('Will default to the module ID but can be set to save as a custom meta key.', 'modularity'),
            'required' => 0,
            'conditional_logic' => array(
                0 => array(
                    0 => array(
                        'field' => 'field_67126c170c176',
                        'operator' => '==',
                        'value' => '1',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '70',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => __('unique-key', 'modularity'),
            'prepend' => '',
            'append' => '',
        ),
        4 => array(
            'key' => 'field_67289fa6dfea3',
            'label' => __('Free text filtering', 'modularity'),
            'name' => 'free_text_filtering',
            'aria-label' => '',
            'type' => 'true_false',
            'instructions' => __('Enables filtering using a input field.', 'modularity'),
            'required' => 0,
            'conditional_logic' => array(
                0 => array(
                    0 => array(
                        'field' => 'field_6752f959acfda',
                        'operator' => '==',
                        'value' => 'accordion',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
            'ui' => 1,
        ),
        5 => array(
            'key' => 'field_650067ed6cc3c',
            'label' => __('Column marking', 'modularity'),
            'name' => 'accordion_column_marking',
            'aria-label' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array(
                0 => array(
                    0 => array(
                        'field' => 'field_6752f959acfda',
                        'operator' => '==',
                        'value' => 'accordion',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
        ),
        6 => array(
            'key' => 'field_65005968bbc75',
            'label' => __('Column titles', 'modularity'),
            'name' => 'accordion_column_titles',
            'aria-label' => '',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array(
                0 => array(
                    0 => array(
                        'field' => 'field_6752f959acfda',
                        'operator' => '==',
                        'value' => 'accordion',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'acfe_repeater_stylised_button' => 0,
            'layout' => 'table',
            'pagination' => 0,
            'min' => 0,
            'max' => 4,
            'collapsed' => '',
            'button_label' => __('Lägg till rad', 'modularity'),
            'rows_per_page' => 20,
            'sub_fields' => array(
                0 => array(
                    'key' => 'field_65005a33bbc77',
                    'label' => __('Column title', 'modularity'),
                    'name' => 'accordion_column_title',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'parent_repeater' => 'field_65005968bbc75',
                ),
            ),
        ),
        7 => array(
            'key' => 'field_65001d039d4c4',
            'label' => __('Columns', 'modularity'),
            'name' => 'columns',
            'aria-label' => '',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array(
                0 => array(
                    0 => array(
                        'field' => 'field_6752f959acfda',
                        'operator' => '!=',
                        'value' => 'accordion',
                    ),
                    1 => array(
                        'field' => 'field_6752f959acfda',
                        'operator' => '!=',
                        'value' => 'list',
                    ),
                    2 => array(
                        'field' => 'field_6752f959acfda',
                        'operator' => '!=',
                        'value' => 'listing',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'o-grid-12' => __('1', 'modularity'),
                'o-grid-6' => __('2', 'modularity'),
                'o-grid-4' => __('3', 'modularity'),
                'o-grid-3' => __('4', 'modularity'),
            ),
            'default_value' => 'o-grid-4',
            'return_format' => 'value',
            'multiple' => 0,
            'allow_null' => 0,
            'ui' => 0,
            'ajax' => 0,
            'placeholder' => '',
            'allow_custom' => 0,
            'search_placeholder' => '',
        ),
        8 => array(
            'key' => 'field_663372f4922a5',
            'label' => __('Highlight first input', 'modularity'),
            'name' => 'highlight_first_input',
            'aria-label' => '',
            'type' => 'true_false',
            'instructions' => __('Makes the first input bigger', 'modularity'),
            'required' => 0,
            'conditional_logic' => array(
                0 => array(
                    0 => array(
                        'field' => 'field_6752f959acfda',
                        'operator' => '==',
                        'value' => 'card',
                    ),
                ),
                1 => array(
                    0 => array(
                        'field' => 'field_6752f959acfda',
                        'operator' => '==',
                        'value' => 'segment',
                    ),
                ),
                2 => array(
                    0 => array(
                        'field' => 'field_6752f959acfda',
                        'operator' => '==',
                        'value' => 'block',
                    ),
                ),
                3 => array(
                    0 => array(
                        'field' => 'field_6752f959acfda',
                        'operator' => '==',
                        'value' => 'news',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
        9 => array(
            'key' => 'field_6641de045ab9d',
            'label' => __('Image position', 'modularity'),
            'name' => 'image_position',
            'aria-label' => '',
            'type' => 'radio',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array(
                0 => array(
                    0 => array(
                        'field' => 'field_6752f959acfda',
                        'operator' => '==',
                        'value' => 'segment',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                1 => __('left', 'modularity'),
                0 => __('right', 'modularity'),
            ),
            'default_value' => 1,
            'return_format' => 'value',
            'allow_null' => 0,
            'other_choice' => 0,
            'layout' => 'horizontal',
            'save_other_choice' => 0,
        ),
        10 => array(
            'key' => 'field_65016a6f0a085',
            'label' => __('Ratio', 'modularity'),
            'name' => 'ratio',
            'aria-label' => '',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array(
                0 => array(
                    0 => array(
                        'field' => 'field_6752f959acfda',
                        'operator' => '==',
                        'value' => 'block',
                    ),
                ),
                1 => array(
                    0 => array(
                        'field' => 'field_6752f959acfda',
                        'operator' => '==',
                        'value' => 'box',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                '1:1' => __('1:1', 'modularity'),
                '4:3' => __('4:3', 'modularity'),
                '12:16' => __('12:16', 'modularity'),
            ),
            'default_value' => '4:3',
            'return_format' => 'value',
            'multiple' => 0,
            'allow_null' => 0,
            'ui' => 0,
            'ajax' => 0,
            'placeholder' => '',
            'allow_custom' => 0,
            'search_placeholder' => '',
        ),
        11 => array(
            'key' => 'field_64ff22b2d91b7',
            'label' => __('Manual inputs', 'modularity'),
            'name' => 'manual_inputs',
            'aria-label' => '',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'acfe_repeater_stylised_button' => 0,
            'layout' => 'block',
            'pagination' => 0,
            'min' => 0,
            'max' => 0,
            'collapsed' => '',
            'button_label' => __('Lägg till rad', 'modularity'),
            'rows_per_page' => 20,
            'sub_fields' => array(
                0 => array(
                    'key' => 'field_64ff22fdd91b8',
                    'label' => __('Title', 'modularity'),
                    'name' => 'title',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'parent_repeater' => 'field_64ff22b2d91b7',
                ),
                1 => array(
                    'key' => 'field_64ff2372d91bc',
                    'label' => __('Column values', 'modularity'),
                    'name' => 'accordion_column_values',
                    'aria-label' => '',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        0 => array(
                            0 => array(
                                'field' => 'field_6752f959acfda',
                                'operator' => '==',
                                'value' => 'accordion',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'acfe_repeater_stylised_button' => 0,
                    'layout' => 'table',
                    'min' => 0,
                    'max' => 4,
                    'collapsed' => '',
                    'button_label' => __('Lägg till rad', 'modularity'),
                    'rows_per_page' => 20,
                    'sub_fields' => array(
                        0 => array(
                            'key' => 'field_64ff23afd91bd',
                            'label' => __('Column value', 'modularity'),
                            'name' => 'value',
                            'aria-label' => '',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'maxlength' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'parent_repeater' => 'field_64ff2372d91bc',
                        ),
                    ),
                    'parent_repeater' => 'field_64ff22b2d91b7',
                ),
                2 => array(
                    'key' => 'field_64ff231ed91b9',
                    'label' => __('Content', 'modularity'),
                    'name' => 'content',
                    'aria-label' => '',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        0 => array(
                            0 => array(
                                'field' => 'field_6752f959acfda',
                                'operator' => '!=',
                                'value' => 'list',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                    'delay' => 0,
                    'parent_repeater' => 'field_64ff22b2d91b7',
                ),
                3 => array(
                    'key' => 'field_64ff232ad91ba',
                    'label' => __('Link', 'modularity'),
                    'name' => 'link',
                    'aria-label' => '',
                    'type' => 'url',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        0 => array(
                            0 => array(
                                'field' => 'field_6752f959acfda',
                                'operator' => '!=',
                                'value' => 'accordion',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'parent_repeater' => 'field_64ff22b2d91b7',
                ),
                4 => array(
                    'key' => 'field_6715fa26bb1ef',
                    'label' => __('Obligatory', 'modularity'),
                    'name' => 'obligatory',
                    'aria-label' => '',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        0 => array(
                            0 => array(
                                'field' => 'field_67126c170c176',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => '',
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                    'parent_repeater' => 'field_64ff22b2d91b7',
                ),
                5 => array(
                    'key' => 'field_6718c31e2862b',
                    'label' => __('UniqueId', 'modularity'),
                    'name' => 'unique_id',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        0 => array(
                            0 => array(
                                'field' => 'field_67126c170c176',
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
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'parent_repeater' => 'field_64ff22b2d91b7',
                ),
                6 => array(
                    'key' => 'field_6717a0079988c',
                    'label' => __('Link description', 'modularity'),
                    'name' => 'link_description',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        0 => array(
                            0 => array(
                                'field' => 'field_67126c170c176',
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
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'parent_repeater' => 'field_64ff22b2d91b7',
                ),
                7 => array(
                    'key' => 'field_65002bce6d459',
                    'label' => __('Link text', 'modularity'),
                    'name' => 'link_text',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        0 => array(
                            0 => array(
                                'field' => 'field_6752f959acfda',
                                'operator' => '==',
                                'value' => 'segment',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'parent_repeater' => 'field_64ff22b2d91b7',
                ),
                8 => array(
                    'key' => 'field_64ff2355d91bb',
                    'label' => __('Image', 'modularity'),
                    'name' => 'image',
                    'aria-label' => '',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        0 => array(
                            0 => array(
                                'field' => 'field_6752f959acfda',
                                'operator' => '!=',
                                'value' => 'list',
                            ),
                            1 => array(
                                'field' => 'field_6752f959acfda',
                                'operator' => '!=',
                                'value' => 'accordion',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'uploader' => '',
                    'return_format' => 'id',
                    'acfe_thumbnail' => 0,
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'parent_repeater' => 'field_64ff22b2d91b7',
                ),
                9 => array(
                    'key' => 'field_65293de2a26c7',
                    'label' => __('Icon', 'modularity'),
                    'name' => 'box_icon',
                    'aria-label' => '',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        0 => array(
                            0 => array(
                                'field' => 'field_6752f959acfda',
                                'operator' => '==',
                                'value' => 'box',
                            ),
                        ),
                        1 => array(
                            0 => array(
                                'field' => 'field_6752f959acfda',
                                'operator' => '==',
                                'value' => 'list',
                            ),
                        ),
                        2 => array(
                            0 => array(
                                'field' => 'field_6752f959acfda',
                                'operator' => '==',
                                'value' => 'card',
                            ),
                        ),
                        3 => array(
                            0 => array(
                                'field' => 'field_6752f959acfda',
                                'operator' => '==',
                                'value' => 'block',
                            ),
                        ),
                        4 => array(
                            0 => array(
                                'field' => 'field_6752f959acfda',
                                'operator' => '==',
                                'value' => 'segment',
                            ),
                        ),
                        5 => array(
                            0 => array(
                                'field' => 'field_6752f959acfda',
                                'operator' => '==',
                                'value' => 'collection',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                    ),
                    'default_value' => false,
                    'return_format' => 'value',
                    'multiple' => 0,
                    'allow_custom' => 0,
                    'search_placeholder' => '',
                    'allow_null' => 0,
                    'ui' => 1,
                    'ajax' => 0,
                    'placeholder' => '',
                    'parent_repeater' => 'field_64ff22b2d91b7',
                ),
            ),
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'mod-manualinput',
            ),
        ),
        1 => array(
            0 => array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/manualinput',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'left',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
    'acfe_display_title' => '',
    'acfe_autosync' => array(
        0 => 'json',
    ),
    'acfe_form' => 0,
    'acfe_meta' => '',
    'acfe_note' => '',
));
}