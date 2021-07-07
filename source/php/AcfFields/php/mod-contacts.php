<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5805e5dc0a3be',
    'title' => __('Contacts', 'modularity'),
    'fields' => array(
        0 => array(
            'key' => 'field_5805e5dc1da44',
            'label' => __('Visningsläge', 'modularity'),
            'name' => 'display_mode',
            'type' => 'select',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'cards' => __('Kort', 'modularity'),
                'vertical' => __('Horisontella kort', 'modularity'),
                'list' => __('Lista', 'modularity'),
            ),
            'default_value' => array(
                0 => __('cards', 'modularity'),
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
        ),
        1 => array(
            'key' => 'field_5805e5dc1dc55',
            'label' => __('Kontakter', 'modularity'),
            'name' => 'contacts',
            'type' => 'flexible_content',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'layouts' => array(
                '5757b95767730' => array(
                    'key' => '5757b95767730',
                    'name' => 'custom',
                    'label' => __('Custom', 'modularity'),
                    'display' => 'block',
                    'sub_fields' => array(
                        0 => array(
                            'key' => 'field_5805e5dc26dde',
                            'label' => 'Bild',
                            'name' => 'image',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                        1 => array(
                            'key' => 'field_5805e5dc27255',
                            'label' => 'First name or location',
                            'name' => 'first_name',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '50',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        2 => array(
                            'key' => 'field_5805e5dc276e1',
                            'label' => 'Efternamn',
                            'name' => 'last_name',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '50',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        3 => array(
                            'key' => 'field_5805e5dc2771c',
                            'label' => 'Jobbtitel',
                            'name' => 'work_title',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '50',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        4 => array(
                            'key' => 'field_5805e5dc277e3',
                            'label' => 'Förvaltning',
                            'name' => 'administration_unit',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '50',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        5 => array(
                            'key' => 'field_5805e5dc27b58',
                            'label' => 'E-mail',
                            'name' => 'email',
                            'type' => 'email',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '100',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                        ),
                        6 => array(
                            'key' => 'field_5805e62f94d0f',
                            'label' => 'Telefon',
                            'name' => 'phone_numbers',
                            'type' => 'repeater',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'collapsed' => '',
                            'min' => 0,
                            'max' => 0,
                            'layout' => 'table',
                            'button_label' => 'Lägg till nummer',
                            'sub_fields' => array(
                                0 => array(
                                    'key' => 'field_5bf6aa828136b',
                                    'label' => 'Typ',
                                    'name' => 'type',
                                    'type' => 'select',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '20',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'choices' => array(
                                        'phone' => 'Fasttelefon',
                                        'smartphone' => 'Mobil',
                                    ),
                                    'default_value' => array(
                                        0 => 'phone',
                                    ),
                                    'allow_null' => 0,
                                    'multiple' => 0,
                                    'ui' => 0,
                                    'return_format' => 'value',
                                    'ajax' => 0,
                                    'placeholder' => '',
                                ),
                                1 => array(
                                    'key' => 'field_5805e64a94d10',
                                    'label' => 'Telefonnummer',
                                    'name' => 'number',
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
                                    'placeholder' => '',
                                    'prepend' => '',
                                    'append' => '',
                                    'maxlength' => '',
                                ),
                            ),
                        ),
                        7 => array(
                            'key' => 'field_5bf6a5fbc1b6b',
                            'label' => 'Social Media',
                            'name' => 'social_media',
                            'type' => 'repeater',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'collapsed' => '',
                            'min' => 0,
                            'max' => 0,
                            'layout' => 'table',
                            'button_label' => '',
                            'sub_fields' => array(
                                0 => array(
                                    'key' => 'field_5bf6a737c1b6c',
                                    'label' => 'Media',
                                    'name' => 'media',
                                    'type' => 'select',
                                    'instructions' => '',
                                    'required' => 1,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'choices' => array(
                                        'facebook' => 'Facebook',
                                        'linkedin' => 'LinkedIn',
                                        'twitter' => 'Twitter',
                                        'instagram' => 'Instagram',
                                    ),
                                    'default_value' => array(
                                        0 => 'facebook',
                                    ),
                                    'allow_null' => 0,
                                    'multiple' => 0,
                                    'ui' => 0,
                                    'return_format' => 'value',
                                    'ajax' => 0,
                                    'placeholder' => '',
                                ),
                                1 => array(
                                    'key' => 'field_5bf6a991c1b6d',
                                    'label' => 'URL',
                                    'name' => 'url',
                                    'type' => 'url',
                                    'instructions' => '',
                                    'required' => 1,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                    'placeholder' => '',
                                ),
                            ),
                        ),
                        8 => array(
                            'key' => 'field_5805e5dc28d3a',
                            'label' => 'Address',
                            'name' => 'address',
                            'type' => 'textarea',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '50',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'maxlength' => '',
                            'rows' => '',
                            'new_lines' => 'wpautop',
                        ),
                        9 => array(
                            'key' => 'field_5805e5dc28e30',
                            'label' => 'Besöksadress',
                            'name' => 'visiting_address',
                            'type' => 'textarea',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '50',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'maxlength' => '',
                            'rows' => '',
                            'new_lines' => 'wpautop',
                        ),
                        10 => array(
                            'key' => 'field_5805e5dc29114',
                            'label' => 'Öppettider',
                            'name' => 'opening_hours',
                            'type' => 'textarea',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'maxlength' => '',
                            'rows' => '',
                            'new_lines' => 'wpautop',
                        ),
                        11 => array(
                            'key' => 'field_5805e5dc29182',
                            'label' => 'Annat',
                            'name' => 'other',
                            'type' => 'wysiwyg',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
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
                        ),
                    ),
                    'min' => '',
                    'max' => '',
                ),
                '5757b97ffecc6' => array(
                    'key' => '5757b97ffecc6',
                    'name' => 'user',
                    'label' => __('Användare', 'modularity'),
                    'display' => 'block',
                    'sub_fields' => array(
                        0 => array(
                            'key' => 'field_5805e5dc291c4',
                            'label' => 'Välj användare',
                            'name' => 'user',
                            'type' => 'user',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'role' => '',
                            'allow_null' => 0,
                            'multiple' => 0,
                            'return_format' => 'array',
                        ),
                    ),
                    'min' => '',
                    'max' => '',
                ),
            ),
            'button_label' => __('Add contact', 'modularity'),
            'min' => 1,
            'max' => '',
        ),
        2 => array(
            'key' => 'field_5805e5dc1ddcd',
            'label' => __('Kolumner', 'modularity'),
            'name' => 'columns',
            'type' => 'select',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => array(
                0 => array(
                    0 => array(
                        'field' => 'field_5805e5dc1da44',
                        'operator' => '==',
                        'value' => 'cards',
                    ),
                ),
                1 => array(
                    0 => array(
                        'field' => 'field_5805e5dc1da44',
                        'operator' => '==',
                        'value' => 'cards',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'grid-md-12' => __('1', 'modularity'),
                'grid-md-6' => __('2', 'modularity'),
                'grid-md-4' => __('3', 'modularity'),
                'grid-md-3' => __('4', 'modularity'),
            ),
            'default_value' => array(
                0 => __('grid-md-12', 'modularity'),
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
        ),
        3 => array(
            'key' => 'field_5bffd2f45667f',
            'label' => __('Compact mode', 'modularity'),
            'name' => 'compact_mode',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array(
                0 => array(
                    0 => array(
                        'field' => 'field_5805e5dc1da44',
                        'operator' => '==',
                        'value' => 'cards',
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
            'ui' => 1,
            'ui_on_text' => __('Aktiverad', 'modularity'),
            'ui_off_text' => __('Disabled', 'modularity'),
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'mod-contacts',
            ),
        ),
        1 => array(
            0 => array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/contacts',
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
));
}