<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_60b8bf5bbc4d7',
        'title' => 'Table - Block settings',
        'fields' => array(
            array(
                'key' => 'field_60b8c0d61b71e',
                'label' => 'Datatyp',
                'name' => 'mod_table_data_type',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'manual' => 'Manual input',
                    'csv' => 'CSV Import',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 'manual',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_60b9dd6efc445',
                'label' => 'CSV-fil',
                'name' => 'mod_table_block_csv_file',
                'type' => 'file',
                'instructions' => 'CSV-formatterad fil',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_60b8c0d61b71e',
                            'operator' => '==',
                            'value' => 'csv',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => '.csv',
            ),
            array(
                'key' => 'field_60b9dc81fc444',
                'label' => 'CSV-avgränsare',
                'name' => 'mod_table_csv_delimiter',
                'type' => 'text',
                'instructions' => 'Tecken som används i CSV-filen som avgränsare. Brukar vara kommatecken eller semikolon.',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_60b8c0d61b71e',
                            'operator' => '==',
                            'value' => 'csv',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => ';',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_60b8c09f1b71d',
                'label' => 'Table',
                'name' => 'mod_table',
                'type' => 'table',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_60b8c0d61b71e',
                            'operator' => '==',
                            'value' => 'manual',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'use_header' => 0,
                'use_caption' => 2,
            ),
            array(
                'key' => 'field_60b9def7b1bf4',
                'label' => 'Sidbläddring',
                'name' => 'mod_table_pagination',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Yes, use pagination on this table',
                'default_value' => 1,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_60b9df3d7f217',
                'label' => 'Antal inlägg/sidor',
                'name' => 'mod_table_pagination_count',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_60b9def7b1bf4',
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
                'default_value' => 10,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => 1,
                'max' => 500,
                'step' => '',
            ),
            array(
                'key' => 'field_60b9df727f218',
                'label' => 'Aktivera sök',
                'name' => 'mod_table_search',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 1,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_60b9df987f219',
                'label' => 'Sökfras',
                'name' => 'mod_table_search_query',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_60b9df727f218',
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
                'default_value' => 'Search in list',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_60b9dfdf490d9',
                'label' => 'Aktivera kolumnsortering',
                'name' => 'mod_table_ordering',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Yes, enable column sorting',
                'default_value' => 1,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/table',
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
    
    endif;