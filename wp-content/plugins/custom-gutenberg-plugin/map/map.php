<?php
/* Demo Block */
gutenberg_block(
    array(
        'name'  => 'demo',
        'title' => 'Demo',
    ),
    array(
        array(
            'key'               => 'field_demo',
            'label'             => 'Demo field',
            'name'              => 'field_demo',
            'type'              => 'image',
            'instructions'      => 'demo instructions',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
            ),
            'return_format'     => 'id',
            'preview_size'      => 'medium',
            'library'           => 'all',
            'min_width'         => '',
            'min_height'        => '',
            'min_size'          => '',
            'max_width'         => '',
            'max_height'        => '',
            'max_size'          => '',
            'mime_types'        => '',
        ),
    )
);
/* Diagram Block */
gutenberg_block(
    array(
        'name'  => 'diagram',
        'title' => 'Diagram',
    ),
    array(
        array(
            'key' => 'field_6492b8a10f5de',
            'label' => 'Title',
            'name' => 'title',
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
        array(
            'key' => 'field_6492b8a70f5df',
            'label' => 'List Items',
            'name' => 'list_items',
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
            'layout' => 'block',
            'button_label' => '',
            'sub_fields' => array(
                array(
                    'key' => 'field_6492c76a2b58e',
                    'label' => 'Number 1',
                    'name' => 'number_1',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '33',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_6492e2ecf45b9',
                    'label' => 'Number 2',
                    'name' => 'number_2',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '33',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_6492b8b10f5e0',
                    'label' => 'Color',
                    'name' => 'color',
                    'type' => 'color_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '33',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'enable_opacity' => 0,
                    'return_format' => 'string',
                ),
                array(
                    'key' => 'field_6492b8be0f5e1',
                    'label' => 'Title 1',
                    'name' => 'title_1',
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
                array(
                    'key' => 'field_6492c74c2b58d',
                    'label' => 'Title 2',
                    'name' => 'title_2',
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
                array(
                    'key' => 'field_6492b8f80f5e3',
                    'label' => 'Text',
                    'name' => 'text',
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
                    'rows' => 4,
                    'new_lines' => '',
                ),
                array(
                    'key' => 'field_6492b8cf0f5e2',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '33',
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
                array(
                    'key' => 'field_6492b9290f5e4',
                    'label' => 'Button',
                    'name' => 'button',
                    'type' => 'link',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '33',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_6492b9370f5e5',
                    'label' => 'Picture above?',
                    'name' => 'picture_above',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '33',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => '',
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                ),
            ),
        ),
    )
);
/* Map Section */
gutenberg_block(
    array(
        'name'  => 'od-map-section',
        'title' => 'Map Section',
    ),
    array(
        array(
            'key' => 'field_63e2763aa8629',
            'label' => 'Left',
            'name' => '',
            'aria-label' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'placement' => 'top',
            'endpoint' => 0,
        ),
        array(
            'key' => 'field_63e27611daf63',
            'label' => 'Title',
            'name' => 'title',
            'aria-label' => '',
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
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
        ),
        array(
            'key' => 'field_64807908f84c7',
            'label' => 'Sticker',
            'name' => 'sticker',
            'aria-label' => '',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '50',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'array',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
            'preview_size' => 'thumbnail',
        ),
        array(
            'key' => 'field_63e27633a8628',
            'label' => 'Text',
            'name' => 'text',
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
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        array(
            'key' => 'field_63e2764fa862a',
            'label' => 'Right',
            'name' => '',
            'aria-label' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'placement' => 'top',
            'endpoint' => 0,
        ),
        array(
            'key' => 'field_63e271fa73d96',
            'label' => 'Level of persecution title',
            'name' => 'level_of_persecution_title',
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
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        array(
            'key' => 'field_63e2723173d97',
            'label' => 'Levels',
            'name' => 'levels',
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
            'collapsed' => '',
            'min' => 0,
            'max' => 0,
            'layout' => 'table',
            'button_label' => 'Add Row',
            'sub_fields' => array(
                array(
                    'key' => 'field_63e2724173d98',
                    'label' => 'Title',
                    'name' => 'title',
                    'aria-label' => '',
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
                    'parent_repeater' => 'field_63e2723173d97',
                ),
                array(
                    'key' => 'field_63e2724c73d99',
                    'label' => 'Color',
                    'name' => 'color',
                    'aria-label' => '',
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
                    'parent_repeater' => 'field_63e2723173d97',
                ),
            ),
            'rows_per_page' => 20,
        ),
        array(
            'key' => 'field_63e2727f73d9a',
            'label' => 'Slider',
            'name' => 'slider',
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
            'collapsed' => '',
            'min' => 0,
            'max' => 0,
            'layout' => 'table',
            'button_label' => 'Add Row',
            'sub_fields' => array(
                array(
                    'key' => 'field_63e2729373d9b',
                    'label' => 'Title',
                    'name' => 'title',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '30',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                    'parent_repeater' => 'field_63e2727f73d9a',
                ),
                array(
                    'key' => 'field_63e2729c73d9c',
                    'label' => 'Text',
                    'name' => 'text',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '70',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                    'parent_repeater' => 'field_63e2727f73d9a',
                ),
            ),
            'rows_per_page' => 20,
        ),
        array(
            'key' => 'field_63e272b873d9d',
            'label' => 'Ranking Title',
            'name' => 'ranking_title',
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
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        array(
            'key' => 'field_63e272c973d9e',
            'label' => 'Ranking countries',
            'name' => 'ranking_countries',
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
            'collapsed' => '',
            'min' => 0,
            'max' => 0,
            'layout' => 'table',
            'button_label' => 'Add Row',
            'sub_fields' => array(
                array(
                    'key' => 'field_63e272fb73d9f',
                    'label' => 'Name',
                    'name' => 'name',
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
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                    'parent_repeater' => 'field_63e272c973d9e',
                ),
            ),
            'rows_per_page' => 20,
        ),
        array(
            'key' => 'field_6489dc23a223d',
            'label' => 'Is Pattern',
            'name' => 'is_pattern',
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
            'message' => '',
            'default_value' => 1,
            'ui_on_text' => '',
            'ui_off_text' => '',
            'ui' => 1,
        ),
    )
);

/* Top Slider */
gutenberg_block(
    array(
        'name'  => 'top-slider',
        'title' => 'Top slider',
    ),
    array(
        array(
            'key'        => 'field_6294bfc6916ad',
            'label'      => 'Slides',
            'name'       => 'slides',
            'type'       => 'repeater',
            'layout'     => 'block',
            'sub_fields' => array(
                array(
                    'key'   => 'field_6294be1937996',
                    'label' => 'Content',
                    'type'  => 'tab',
                ),
                array(
                    'key'     => 'slides_text_position',
                    'label'   => 'Text position',
                    'name'    => 'text_position',
                    'type'    => 'select',
                    'choices' => array(
                        'left'  => 'Left',
                        'right' => 'Right',
                    ),
                ),
                array(
                    'key'   => 'field_6294bd9e37991',
                    'label' => 'Title',
                    'name'  => 'title',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_6294bdab37992',
                    'label' => 'Subtitle',
                    'name'  => 'subtitle',
                    'type'  => 'text',
                ),
                array(
                    'key'     => 'field_6294bdbc37994',
                    'label'   => 'Button text',
                    'name'    => 'button_text',
                    'type'    => 'text',
                    'wrapper' => array(
                        'width' => 40
                    )
                ),
                array(
                    'key'     => 'field_6294bdb737993',
                    'label'   => 'Button link',
                    'name'    => 'button_link',
                    'type'    => 'text',
                    'wrapper' => array(
                        'width' => 60
                    )
                ),
                array(
                    'key' => 'field_658e834ac4bd2',
                    'label' => 'Button Text Color',
                    'name' => 'button_text_color',
                    'aria-label' => '',
                    'type' => 'color_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '#F3E3CC',
                    'enable_opacity' => 0,
                    'return_format' => 'string',
                    'parent_repeater' => 'field_63ff6ef5112e9',
                ),
                array(
                    'key' => 'field_658e834ac4bd0',
                    'label' => 'Text Color',
                    'name' => 'text_color',
                    'aria-label' => '',
                    'type' => 'color_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '#F3E3CC',
                    'enable_opacity' => 0,
                    'return_format' => 'string',
                    'parent_repeater' => 'field_63ff6ef5112e9',
                ),
                array(
                    'key'   => 'field_6294bddc37995',
                    'label' => 'Images/Video',
                    'type'  => 'tab',
                ),
                array(
                    'key'           => 'top_slider_video',
                    'label'         => 'Video',
                    'name'          => 'video',
                    'type'          => 'file',
                    'return_format' => 'url',
                ),
                array(
                    'key'           => 'field_6294be2837997',
                    'label'         => 'Desktop image',
                    'name'          => 'large_image',
                    'type'          => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key'           => 'field_6294be3837998',
                    'label'         => 'Laptop image',
                    'name'          => 'medium_image',
                    'type'          => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key'           => 'field_6294be4d37999',
                    'label'         => 'Mobile image',
                    'name'          => 'small_image',
                    'type'          => 'image',
                    'return_format' => 'url',
                ),

            ),
        ),
        array(
            'key'           => 'enable_overlay_image',
            'label'         => 'Enable overlay on slides?',
            'name'          => 'enable_overlay_image',
            'type'          => 'true_false',
            'default_value' => 0,
        ),
    )
);

/* Tagline */
gutenberg_block(
    array(
        'name'  => 'tagline',
        'title' => 'Tagline',
    ),
    array(
        array(
            'key'   => 'field_6294bd9e37991tagline',
            'label' => 'Tagline',
            'name'  => 'tagline',
            'type'  => 'textarea',
        ),
    )
);



/* World Watch Block */
gutenberg_block(
    array(
        'name'  => 'world-watch-block',
        'title' => 'World watch block',
    ),
    array(
        array(
            'key'   => 'field_6295b9536daa2',
            'label' => 'Title',
            'name'  => 'title',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_6295b95b6daa3',
            'label' => 'Content',
            'name'  => 'content',
            'type'  => 'textarea',
            'rows'  => 5,
        ),
        array(
            'key'   => 'field_62c28aadbc53c',
            'label' => 'Make map interactive on hover',
            'name'  => 'interactive_map',
            'type'  => 'true_false',
        ),
        array(
            'key'               => 'field_6294bedesktopmap',
            'label'             => 'Desktop map',
            'name'              => 'desktop_map',
            'type'              => 'image',
            'return_format'     => 'url',
            'conditional_logic' => array(
                array(
                    array(
                        'field'    => 'field_62c28aadbc53c',
                        'operator' => '!=',
                        'value'    => '1',
                    ),
                ),
            ),
        ),
        array(
            'key'               => 'field_6294mobilemap',
            'label'             => 'Mobile map',
            'name'              => 'mobile_map',
            'type'              => 'image',
            'return_format'     => 'url',
        ),
        array(
            'key'        => 'field_6295b9686daa4',
            'label'      => 'Items',
            'name'       => 'items',
            'type'       => 'repeater',
            'sub_fields' => array(
                array(
                    'key'   => 'field_6295b9826daa5',
                    'label' => 'Red text',
                    'name'  => 'red_text',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_6295b9926daa6',
                    'label' => 'Black text',
                    'name'  => 'black_text',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ),
            ),
        ),
        array(
            'key'     => 'field_6295b9a06daa7',
            'label'   => 'Button text',
            'name'    => 'button_text',
            'type'    => 'text',
            'wrapper' => array(
                'width' => 40
            )
        ),
        array(
            'key'     => 'field_6295b9a06daa8',
            'label'   => 'Button link',
            'name'    => 'button_link',
            'type'    => 'text',
            'wrapper' => array(
                'width' => 60
            )
        ),
    )
);

/* Courageous christians */
gutenberg_block( array(
    'name'  => 'courageous-christians',
    'title' => 'Courageous christians',
),
    array(
        array(
            'key'   => 'field_6295cbb4f6511',
            'label' => 'Title',
            'name'  => 'title',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_6295cbb8f6512',
            'label' => 'Content',
            'name'  => 'content',
            'type'  => 'textarea',
            'rows'  => 5,
        ),
        array(
            'key'        => 'field_6295cbbbf6513',
            'label'      => 'Items',
            'name'       => 'items',
            'type'       => 'repeater',
            'layout'     => 'block',
            'sub_fields' => array(
                array(
                    'key'   => 'field_6295cbc5f6514',
                    'label' => 'Title',
                    'name'  => 'title',
                    'type'  => 'text',
                    'wrapper' => ['width' => '50%'],
                ),
                array(
                    'key' => 'field_631a24df69c0a',
                    'label' => 'Location',
                    'name' => 'location',
                    'type' => 'post_object',
                    'post_type' => 'countries-watch',
                    'return_format' => 'object',
                    'allow_null' => 1,
                    'wrapper' => ['width' => '50%'],
                ),
                array(
                    'key'   => 'field_6295cbd8f6516',
                    'label' => 'Content',
                    'name'  => 'content',
                    'type'  => 'textarea',
                    'rows'  => 2
                ),
                array(
                    'key'   => 'field_6295cbdcf6517',
                    'label' => 'Link',
                    'name'  => 'link',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_6295cbc5f6514_title',
                    'label' => 'Link Title',
                    'name'  => 'link_title',
                    'type'  => 'text',
                    'default_value' => 'Read more',
                    'wrapper' => ['width' => '33%'],
                ),
                array(
                    'key'           => 'field_6295cbe7f6518',
                    'label'         => 'Image',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'url',
                    'preview_size'  => 'thumbnail',
                    'wrapper' => ['width' => '33%'],
                ),
                array(
                    'key'     => 'field_62c2cf87d3a24b_bg',
                    'label'   => 'Button BG Color',
                    'name'    => 'button_bg_color',
                    'type'    => 'select',
                    'choices' => array(
                        '#e05c16'   => 'Orange',
                        '#c01f1c' => 'Red',
                        '#87bcd2' => 'Blue',
                        '#6b3268' => 'Purple',
                    ),
                    'default_value' => '#e05c16',
                    'wrapper' => ['width' => '33%'],
                ),
                array(
                    'key'           => 'enable_overlay',
                    'label'         => 'Enable overlay on image?',
                    'name'          => 'enable_overlay',
                    'type'          => 'text',
                    'default_value' => 1,
                ),
            ),
        ),
    )
);

/* Stories-Prayer */
gutenberg_block( array(
    'name'  => 'stories-prayer',
    'title' => 'Stories-Prayer',
),
    array(
        array(
            'key'   => 'field_62960f62ab4f8',
            'label' => 'Title left',
            'name'  => 'title1',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_62960f72ab4f9',
            'label' => 'Title right',
            'name'  => 'title2',
            'type'  => 'text',
        ),
        array(
            'key'        => 'field_6295cbbbfitems',
            'label'      => 'Items',
            'name'       => 'items',
            'type'       => 'repeater',
            'layout'     => 'block',
            'sub_fields' => array(
                array(
                    'key'   => 'field_6295cbc5ftitle',
                    'label' => 'Title',
                    'name'  => 'title',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_6295cbd8fcontent',
                    'label' => 'Content',
                    'name'  => 'content',
                    'type'  => 'textarea',
                    'rows'  => 5
                ),
            ),
        ),
    )
);

/* Stories-Prayer */
gutenberg_block(
    array(
        'name'  => 'page-top',
        'title' => 'Page top',
    ),
    array(
        array(
            'key'          => 'field_6296165fe9aa8',
            'label'        => 'Title',
            'name'         => 'title',
            'type'         => 'text',
            'instructions' => 'Enter if you have an alternative title',
        ),
        array(
            'key'   => 'field_62961674e9aa9',
            'label' => 'Content',
            'name'  => 'content',
            'type'  => 'textarea',
            'rows'  => 5,
            'new_lines' => 'wpautop',
        ),
        array(
            'key'           => 'field_62a32e1215592',
            'label'         => 'Video',
            'name'          => 'video',
            'type'          => 'file',
            'return_format' => 'url',
            'mime_types'    => 'mp4',
        ),
        array(
            'key'     => 'field_6296167ee9aaa',
            'label'   => 'Background',
            'name'    => 'bg',
            'type'    => 'focuspoint',
            'wrapper' => array(
                'width' => '100',
            ),
        ),
        array(
            'key'           => 'page_top_enable_overlay',
            'label'         => 'Enable overlay on image?',
            'name'          => 'page_top_enable_overlay',
            'type'          => 'true_false',
            'default_value' => 1,
        ),
        array(
            'key'     => 'field_629616a5e9aac',
            'label'   => 'Button text',
            'name'    => 'button_text',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '40',
            ),
        ),
        array(
            'key'     => 'field_629616a0e9aab',
            'label'   => 'Button link',
            'name'    => 'button_link',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '60',
            ),
        ),
        array(
            'key'     => 'field_629616a5e9aac2',
            'label'   => 'Button text2',
            'name'    => 'button_text2',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '40',
            ),
        ),
        array(
            'key'     => 'field_629616a0e9aab2',
            'label'   => 'Button link2',
            'name'    => 'button_link2',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '60',
            ),
        ),
    )
);

gutenberg_block( array(
    'name'  => 'top-author',
    'title' => 'Top author',
),
);

/* Text and video/image */
gutenberg_block( array(
    'name'  => 'text-video',
    'title' => 'Text and video/image',
),
    array(
        array(
            'key'   => 'field_62cbe452f30c8',
            'label' => 'Reverse',
            'name'  => 'reverse',
            'type'  => 'true_false',
        ),
        array(
            'key'   => 'field_62b1b9df6718e',
            'label' => 'Left side',
            'type'  => 'tab',
        ),
        array(
            'key'   => 'field_629726b574312',
            'label' => 'Top Title',
            'name'  => 'toptitle',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_629726left',
            'label' => 'Left Title',
            'name'  => 'lefttitle',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_629726bb74313',
            'label' => 'Content',
            'name'  => 'content',
            'type'  => 'wysiwyg',
        ),
        array(
            'key'     => 'field_62b1b958a899a',
            'label'   => 'Button text1',
            'name'    => 'button_text1',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '40',
            ),
        ),
        array(
            'key'     => 'field_62b1b931a8998',
            'label'   => 'Button link1',
            'name'    => 'button_link1',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '60',
            ),
        ),
        array(
            'key'     => 'field_62b1b950a8999',
            'label'   => 'Button link2',
            'name'    => 'button_link2',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '40',
            ),
        ),
        array(
            'key'     => 'field_62b1b963a899b',
            'label'   => 'Button text2',
            'name'    => 'button_text2',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '60',
            ),
        ),
        array(
            'key'   => 'field_62b1b9e96718f',
            'label' => 'Right side',
            'type'  => 'tab',
        ),
        array(
            'key'           => 'field_62b1b923a8997',
            'label'         => 'Image',
            'name'          => 'image',
            'type'          => 'image',
            'return_format' => 'url',
        ),
        array(
            'key'   => 'field_629726bbfigcaption',
            'label' => 'Image caption',
            'name'  => 'figcaption',
            'type'  => 'textarea',
            'rows'  => 5
        ),
        array(
            'key'   => 'field_629726c274314',
            'label' => 'Link to youtube',
            'name'  => 'link_to_youtube',
            'type'  => 'url',
        ),
        array(
            'key'   => 'field_629726cvimeo',
            'label' => 'Link to vimeo',
            'name'  => 'link_to_vimeo',
            'type'  => 'url',
        ),
        array(
            'key'   => 'field_62cae116embed',
            'label' => 'Embed frame',
            'name'  => 'embed_frame',
            'type'  => 'textarea',
        ),
        array(
            'key'     => 'field_62b1b958a899ar',
            'label'   => 'Button text1',
            'name'    => 'button_text1r',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '40',
            ),
        ),
        array(
            'key'     => 'field_62b1b931a8998r',
            'label'   => 'Button link1',
            'name'    => 'button_link1r',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '60',
            ),
        ),
    )
);

/* Simple text */
//gutenberg_block( array(
//	'name'  => 'simple-text',
//	'title' => 'Simple text',
//),
//	array(
//		array(
//			'key'   => 'field_62977762499af',
//			'label' => 'Title',
//			'name'  => 'title',
//			'type'  => 'text',
//		),
//		array(
//			'key'   => 'field_62977778499b0',
//			'label' => 'Content',
//			'name'  => 'content',
//			'type'  => 'text',
//		),
//		array(
//			'key'   => 'field_6294bdbbtn_link',
//			'label' => 'Button link',
//			'name'  => 'button_link',
//			'type'  => 'text',
//		),
//		array(
//			'key'   => 'field_6294bdbcbtn_text',
//			'label' => 'Button text',
//			'name'  => 'button_text',
//			'type'  => 'text',
//		),
//	),
//);


gutenberg_block( array(
    'name'  => 'simple-text-block',
    'title' => 'Simple text block',
),
    array(
        array(
            'key' => 'field_65dca7bdf2ba0',
            'label' => 'Content',
            'name' => 'content',
            'aria-label' => '',
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
    )
);

/* Reports columns */
gutenberg_block( array(
    'name'  => 'reports-columns',
    'title' => 'Reports columns',
),
    array(
        array(
            'key'          => 'field_62cbce41cf485',
            'label'        => 'Section',
            'name'         => 'section',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Add section',
            'sub_fields'   => array(
                array(
                    'key'           => 'field_62cbce7ccf486',
                    'label'         => 'Image',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key'   => 'field_62cbce7title',
                    'label' => 'Title',
                    'name'  => 'title',
                    'type'  => 'text',
                ),
                array(
                    'key'        => 'field_62cbce96cf487',
                    'label'      => 'Items',
                    'name'       => 'items',
                    'type'       => 'repeater',
                    'layout'     => 'table',
                    'sub_fields' => array(
                        array(
                            'key'     => 'field_62cbceb4cf488',
                            'label'   => 'Label',
                            'name'    => 'label',
                            'type'    => 'text',
                            'wrapper' => array(
                                'width' => '40',
                            ),
                        ),
                        array(
                            'key'     => 'field_62cbcebdcf489',
                            'label'   => 'Link',
                            'name'    => 'link',
                            'type'    => 'text',
                            'wrapper' => array(
                                'width' => '60',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    )
);

/* Faq wrapper */
gutenberg_block( array(
        'name'     => 'faq-wrapper',
        'title'    => 'Faq wrapper',
        'supports' => array(
            'jsx' => true
        ),
    )
);

/* Handy resources */
gutenberg_block( array(
    'name'  => 'handy-resources',
    'title' => 'Handy resources',
),
    array(
        array(
            'key'        => 'field_62cfe5ca55797',
            'label'      => 'Items',
            'name'       => 'items',
            'type'       => 'repeater',
            'sub_fields' => array(
                array(
                    'key'     => 'field_62cfe5dc55798',
                    'label'   => 'Label',
                    'name'    => 'label',
                    'type'    => 'text',
                    'wrapper' => array(
                        'width' => '70',
                    ),
                ),
                array(
                    'key'           => 'field_62cfe5e355799',
                    'label'         => 'File',
                    'name'          => 'file',
                    'type'          => 'text',
                    'wrapper'       => array(
                        'width' => '30',
                    ),
                    'return_format' => 'url',
                ),
            ),
        ),
    )
);

/* Buttons list */
gutenberg_block( array(
    'name'  => 'btns-list',
    'title' => 'Buttons list',
),
    array(
        array(
            'key'          => 'field_62b97e516c7a0',
            'label'        => 'Buttons',
            'name'         => 'btns',
            'type'         => 'repeater',
            'layout'       => 'row',
            'button_label' => 'Add button',
            'sub_fields'   => array(
                array(
                    'key'     => 'field_62b97e676c7a2',
                    'label'   => 'Button text',
                    'name'    => 'button_text',
                    'type'    => 'text',
                    'wrapper' => [
                        'width' => 40,
                    ]
                ),
                array(
                    'key'     => 'field_62b97e5d6c7a1',
                    'label'   => 'Button link',
                    'name'    => 'button_link',
                    'type'    => 'text',
                    'wrapper' => [
                        'width' => 60,
                    ]
                ),
                array(
                    'key'     => 'field_62c2cf87d3a24b',
                    'label'   => 'Style button',
                    'name'    => 'style_button',
                    'type'    => 'select',
                    'choices' => array(
                        'primary'   => 'Primary',
                        'secondary' => 'Secondary',
                    ),
                ),
            ),
        ),
    )
);

/* Centered text */
gutenberg_block( array(
    'name'  => 'centered-text',
    'title' => 'Centered text',
),
    array(
        array(
            'key'   => 'field_62b997a64f44b',
            'label' => 'Content',
            'name'  => 'content',
            'type'  => 'wysiwyg',
        ),
    )
);

/* FAQ */
gutenberg_block( array(
    'name'  => 'faq',
    'title' => 'FAQ',
),
    array(

        array(
            'key'   => 'field_62cbce7title',
            'label' => 'Title',
            'name'  => 'title',
            'type'  => 'text',
        ),
        array(
            'key'        => 'field_62b979d6a99b4',
            'label'      => 'Question-answer',
            'name'       => 'question-answer',
            'type'       => 'repeater',
            'layout'     => 'block',
            'sub_fields' => array(
                array(
                    'key'   => 'field_62b9797b4b9ab',
                    'label' => 'Question',
                    'name'  => 'question',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_62b979824b9ac',
                    'label' => 'Answer',
                    'name'  => 'answer',
                    'type'  => 'textarea',
                ),
            ),
        ),
    )
);

/* Video List */
gutenberg_block( array(
    'name'  => 'video-list',
    'title' => 'Video List',
),
    array(
        array(
            'key'        => 'field_62b979d6a99b4_dsfsdf',
            'label'      => 'List items',
            'name'       => 'list_items',
            'type'       => 'repeater',
            'layout'     => 'block',
            'sub_fields' => array(
                array(
                    'key'   => 'field_62b9797b4b9ab_title',
                    'label' => 'Title',
                    'name'  => 'title',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_62b979824b9ac_link',
                    'label' => 'Video URL',
                    'name'  => 'video-link',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_62b979824b9ac_iframe',
                    'label' => 'Video iframe',
                    'name'  => 'video-iframe',
                    'type'  => 'textarea',
                    'rows'  => 2
                ),
            ),
        ),
        array(
            'key'   => 'field_62b9797b4b9ab_title_item',
            'label' => 'Last Item Title',
            'name'  => 'last_item_title',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_62b979824b9ac_textarea',
            'label' => 'Last Item Text',
            'name'  => 'last_item_text',
            'type'  => 'textarea',
            'rows'  => 8,
            'new_lines' => 'wpautop',
        ),
        array(
            'key' => 'field_64b7c5eb81cb8_butt',
            'label' => 'Button',
            'name' => 'last_item_button',
            'type' => 'link',
            'return_format' => 'array',
        ),
    )
);

/* Reports columns */
gutenberg_block( array(
    'name'  => 'floated-image',
    'title' => 'Floated image',
),
    array(
        array(
            'key'           => 'field_6298a03a88288',
            'label'         => 'Image',
            'name'          => 'image',
            'type'          => 'image',
            'return_format' => 'url',
        ),
        array(
            'key'           => 'field_6298a04688289',
            'label'         => 'Side',
            'name'          => 'side',
            'type'          => 'select',
            'choices'       => array(
                'left'  => 'Left',
                'right' => 'Right',
            ),
            'default_value' => 'left',
        ),
        array(
            'key'     => 'field_62b97e676c7a21',
            'label'   => 'Button text',
            'name'    => 'button_text',
            'type'    => 'text',
            'wrapper' => [
                'width' => 40,
            ]
        ),
        array(
            'key'     => 'field_62b97e5d6c7a12',
            'label'   => 'Button link',
            'name'    => 'button_link',
            'type'    => 'text',
            'wrapper' => [
                'width' => 60,
            ]
        ),
    )
);

/* Reports columns */
gutenberg_block( array(
    'name'  => 'blockquote',
    'title' => 'Blockquote',
),
    array(
        array(
            'key'   => 'field_62989f6385288',
            'label' => 'Quote',
            'name'  => 'quote',
            'type'  => 'textarea',
            'rows'  => 5,
        ),
        array(
            'key'   => 'field_62989f7a85289',
            'label' => 'Author',
            'name'  => 'author',
            'type'  => 'text',
        ),
        array(
            'key'           => 'field_62989f818528a',
            'label'         => 'Side',
            'name'          => 'side',
            'type'          => 'select',
            'choices'       => array(
                'left'  => 'Left',
                'right' => 'Right',
            ),
            'default_value' => 'left',
        ),
    )
);

/* Map */
gutenberg_block( array(
    'name'  => 'wwl-map',
    'title' => 'Map',
),
    array(
        array(
            'key'   => 'field_62a0b828a3a71',
            'label' => 'Tooltip',
            'name'  => 'tooltip',
            'type'  => 'text',
        ),
        array(
            'key'           => 'field_62a0b831a3a72',
            'label'         => 'Map',
            'name'          => 'map',
            'type'          => 'image',
            'preview_size'  => 'medium',
            'return_format' => 'url',
        ),
        array(
            'key'           => 'field_62a0b840a3a73',
            'label'         => 'Map placeholder',
            'name'          => 'map_placeholder',
            'type'          => 'image',
            'return_format' => 'url',
        ),
    )
);

/* After map */
gutenberg_block( array(
    'name'  => 'after-map',
    'title' => 'After map',
),
    array(
        array(
            'key'   => 'field_62b03a1cfc5e8',
            'label' => 'Trends number',
            'name'  => 'trends_number',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_62b03a23fc5e9',
            'label' => 'Trends text',
            'name'  => 'trends_text',
            'type'  => 'textarea',
            'rows'  => 3,
        ),
        array(
            'key'   => 'field_62b03a2efc5eb',
            'label' => 'Trends button text',
            'name'  => 'trends_button_text',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_62b03a41fc5ec',
            'label' => 'Trends button link',
            'name'  => 'trends_button_link',
            'type'  => 'text',
        ),
        array(
            'key'          => 'field_62b03b24fc5ed',
            'label'        => 'Products',
            'name'         => 'products',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => '',
            'sub_fields'   => array(
                array(
                    'key'           => 'field_62b03b48fc5f0',
                    'label'         => 'Image',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key'     => 'field_62b03b39fc5ef',
                    'label'   => 'Title',
                    'name'    => 'title',
                    'type'    => 'text',
                    'wrapper' => array(
                        'width' => '50',
                    ),
                ),
                array(
                    'key'     => 'field_62b03btntext',
                    'label'   => 'Button text',
                    'name'    => 'btn_text',
                    'type'    => 'text',
                    'wrapper' => array(
                        'width' => '40',
                    ),
                ),
                array(
                    'key'     => 'field_62b03b53fc5f1',
                    'label'   => 'Link',
                    'name'    => 'link',
                    'type'    => 'text',
                    'wrapper' => array(
                        'width' => '60',
                    ),
                ),
                array(
                    'key'     => 'field_62b03b58fc5f2',
                    'label'   => 'Link text',
                    'name'    => 'link_text',
                    'type'    => 'text',
                    'wrapper' => array(
                        'width' => '50',
                    ),
                ),
            ),
        ),
    )
);

/* Features block */
gutenberg_block( array(
    'name'  => 'features-block',
    'title' => 'Features block',
),
    array(
        array(
            'key'   => 'field_62b9a1f1f34d7',
            'label' => 'Title',
            'name'  => 'title',
            'type'  => 'text',
        ),
        array(
            'key'           => 'field_62c4150e35b23',
            'label'         => 'Category to display',
            'name'          => 'category_to_display',
            'type'          => 'taxonomy',
            'taxonomy'      => 'resources-cat',
            'field_type'    => 'select',
            'return_format' => 'id',
            'allow_null'    => 1
        ),
        array(
            'key'               => 'field_62a32f6cf76d4',
            'label'             => 'Items',
            'name'              => 'items',
            'type'              => 'repeater',
            'layout'            => 'block',
            'conditional_logic' => array(
                array(
                    array(
                        'field'    => 'field_62c4150e35b23',
                        'operator' => '==empty',
                    ),
                ),
            ),
            'sub_fields'        => array(
                array(
                    'key'   => 'field_62a32f73f76d5',
                    'label' => 'Title',
                    'name'  => 'title',
                    'type'  => 'text',
                ),
                array(
                    'key'           => 'field_62a32f78f76d6',
                    'label'         => 'Image',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key'   => 'field_62a32f88f76d7',
                    'label' => 'Excerpt',
                    'name'  => 'excerpt',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ),
                array(
                    'key'   => 'field_62a3304b4077a',
                    'label' => 'Link on image and title',
                    'name'  => 'link',
                    'type'  => 'text',
                ),
                array(
                    'key'     => 'field_62a32f95f76d8',
                    'label'   => 'Button 1 text',
                    'name'    => 'btn_text1',
                    'type'    => 'text',
                    'wrapper' => array(
                        'width' => '40',
                    ),
                ),
                array(
                    'key'     => 'field_62a32fb6f76da',
                    'label'   => 'Button 1 link',
                    'name'    => 'btn_link1',
                    'type'    => 'text',
                    'wrapper' => array(
                        'width' => '60',
                    ),
                ),
                array(
                    'key'     => 'field_62a32fa9f76d9',
                    'label'   => 'Button 2 text',
                    'name'    => 'btn_text2',
                    'type'    => 'text',
                    'wrapper' => array(
                        'width' => '40',
                    ),
                ),
                array(
                    'key'     => 'field_62a32fc3f76db',
                    'label'   => 'Button 2 link',
                    'name'    => 'btn_link2',
                    'type'    => 'text',
                    'wrapper' => array(
                        'width' => '60',
                    ),
                ),
            ),
        ),
    )
);

/* Page wrapper */
gutenberg_block( array(
        'name'     => 'standard-page',
        'title'    => 'Page wrapper',
        'supports' => array(
            'jsx' => true
        ),
    )
);

/* Page wrapper no container */
gutenberg_block( array(
        'name'     => 'standard-page-nocontainer',
        'title'    => 'Page wrapper no container',
        'supports' => array(
            'jsx' => true
        )
    )
);

/* Page wrapper */
gutenberg_block( array(
        'name'     => 'narrow-wrapper',
        'title'    => 'Narrow page wrapper',
        'supports' => array(
            'jsx' => true
        )
    )
);

/* Advocacy header */
gutenberg_block( array(
        'name'     => 'advocacy-header',
        'title'    => 'Advocacy header',
        'supports' => array(
            'jsx' => true
        )
    )
);

/* Advocacy buttons */
gutenberg_block( array(
    'name'  => 'advocacy-buttons',
    'title' => 'Advocacy buttons',
),
    array(
        array(
            'key'        => 'field_62baca9683d11',
            'label'      => 'Buttons',
            'name'       => 'btns',
            'type'       => 'repeater',
            'layout'     => 'table',
            'sub_fields' => array(
                array(
                    'key'     => 'field_62bacaaf83d13',
                    'label'   => 'Button text',
                    'name'    => 'text',
                    'type'    => 'text',
                    'wrapper' => array(
                        'width' => 40
                    )
                ),
                array(
                    'key'     => 'field_62bacaa883d12',
                    'label'   => 'Button link',
                    'name'    => 'link',
                    'type'    => 'text',
                    'wrapper' => array(
                        'width' => 60
                    )
                ),
            ),
        )
    )
);

/* Sign in */
gutenberg_block( array(
    'name'  => 'sign-up',
    'title' => 'Sign up',
),
    array(
        array(
            'key'   => 'field_62c8627080b8c',
            'label' => 'Title',
            'name'  => 'title',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_62c8627d80b8d',
            'label' => 'Content',
            'name'  => 'content',
            'type'  => 'wysiwyg',
        ),
        array(
            'key'     => 'field_62c8629f80b8f',
            'label'   => 'Button text',
            'name'    => 'btn_text',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '40',
            ),
        ),
        array(
            'key'     => 'field_62c8629180b8e',
            'label'   => 'Button link',
            'name'    => 'btn_link',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '60',
            ),
        ),
    )
);

/* Features block */
gutenberg_block( array(
    'name'  => 'cta-box',
    'title' => 'Cta box',
),
    array(
        array(
            'key'           => 'field_6298ctaside',
            'label'         => 'Side',
            'name'          => 'side',
            'type'          => 'select',
            'choices'       => array(
                'left'  => 'Left',
                'right' => 'Right',
            ),
            'default_value' => 'left',
        ),
        array(
            'key'   => 'field_62ac9c5abe2e4',
            'label' => 'Title',
            'name'  => 'title',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_62ac9c5fbe2e5',
            'label' => 'Description',
            'name'  => 'description',
            'type'  => 'textarea',
            'rows'  => 5,
        ),
        array(
            'key'     => 'field_62ac9c73be2e6',
            'label'   => 'Button text',
            'name'    => 'btn_text',
            'type'    => 'text',
            'wrapper' => array(
                'width' => 40
            )
        ),
        array(
            'key'     => 'field_62ac9c73link',
            'label'   => 'Button link',
            'name'    => 'btn_link',
            'type'    => 'text',
            'wrapper' => array(
                'width' => 60
            )
        ),
    )
);

/* Prayer block */
gutenberg_block( array(
    'name'  => 'prayer-section',
    'title' => 'Prayer section',
),
    array(
        array(
            'key'               => 'field_62b0309ec36d6',
            'label'             => 'Prayer',
            'name'              => 'content',
            'type'              => 'wysiwyg',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
            ),
            'default_value'     => '',
            'tabs'              => 'all',
            'toolbar'           => 'full',
            'media_upload'      => 1,
            'delay'             => 0,
        ),
    )
);

/* Trends top */
gutenberg_block( array(
    'name'  => 'trends-top',
    'title' => 'Trends top',
),
    array(
        array(
            'key'          => 'field_62b0456d1a06f',
            'label'        => 'Title',
            'name'         => 'title',
            'type'         => 'text',
            'instructions' => 'Enter if you have an alternative title',
        ),
    )
);

/* Trends brief */
gutenberg_block( array(
    'name'  => 'trends-brief',
    'title' => 'Trends brief',
),
    array(
        array(
            'key'   => 'field_62b082b1bfbf1',
            'label' => 'Title',
            'name'  => 'title',
            'type'  => 'text',
        ),
        array(
            'key'        => 'field_62b082b6bfbf2',
            'label'      => 'Items',
            'name'       => 'items',
            'type'       => 'repeater',
            'layout'     => 'block',
            'sub_fields' => array(
                array(
                    'key'   => 'field_62b082bebfbf3',
                    'label' => 'Title',
                    'name'  => 'title',
                    'type'  => 'text',
                ),
                array(
                    'key'   => 'field_62b082cbbfbf5',
                    'label' => 'Number',
                    'name'  => 'number',
                    'type'  => 'text',
                ),
                array(
                    'key' => 'field_632d99f3420bd',
                    'label' => 'Color',
                    'name' => 'color',
                    'type' => 'color_picker',
                ),
                array(
                    'key'   => 'field_62b082c6bfbf4',
                    'label' => 'Content',
                    'name'  => 'content',
                    'type'  => 'wysiwyg',
                ),
            ),
        ),
    )
);

/* Trends section */
gutenberg_block( array(
    'name'  => 'trends-section',
    'title' => 'Trends section',
),
    array(
        array(
            'key'   => 'field_62b089799b9a2',
            'label' => 'Title',
            'name'  => 'title',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_62b0897e9b9a3',
            'label' => 'Content',
            'name'  => 'content',
            'type'  => 'wysiwyg',
        ),
    )
);

/* Simple button */
gutenberg_block( array(
    'name'  => 'simple-button',
    'title' => 'Simple button',
),
    array(
        array(
            'key'     => 'field_62b1c323342c9',
            'label'   => 'Button text',
            'name'    => 'btn_text',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '40',
            ),
        ),
        array(
            'key'     => 'field_62b1c317342c8',
            'label'   => 'Button link',
            'name'    => 'btn_link',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '60',
            ),
        ),
        array(
            'key'     => 'field_62c2cf6bd3a23',
            'label'   => 'Center button',
            'name'    => 'center_button',
            'type'    => 'true_false',
            'wrapper' => array(
                'width' => '50'
            )
        ),
        array(
            'key'     => 'field_62c2cf87d3a24',
            'label'   => 'Style button',
            'name'    => 'style_button',
            'type'    => 'select',
            'choices' => array(
                'primary'   => 'Primary',
                'secondary' => 'Secondary',
            ),
        ),
    )
);

/* Video Frame */
gutenberg_block( array(
    'name'  => 'video-frame',
    'title' => 'Video frame',
),
    array(
        array(
            'key'   => 'video_frame_youtube',
            'label' => 'Link to youtube',
            'name'  => 'link_to_youtube',
            'type'  => 'url',
        ),
        array(
            'key'   => 'video_frame_vimeo',
            'label' => 'Link to vimeo',
            'name'  => 'link_to_vimeo',
            'type'  => 'url',
        ),
        array(
            'key'   => 'field_62cae116e11fe',
            'label' => 'Embed frame',
            'name'  => 'embed_frame',
            'type'  => 'textarea',
        ),
    )
);

/* Square chart */
gutenberg_block( array(
    'name'  => 'squarechart',
    'title' => 'Square chart',
), array(
    array(
        'key'               => 'field_62b3141e46f54',
        'label'             => 'Squarechart html',
        'name'              => 'squarechart_html',
        'type'              => 'wysiwyg',
        'instructions'      => '',
        'required'          => 0,
        'conditional_logic' => 0,
        'wrapper'           => array(
            'width' => '',
            'class' => '',
            'id'    => '',
        ),
        'default_value'     => '',
        'tabs'              => 'text',
        'media_upload'      => 1,
        'toolbar'           => 'full',
        'delay'             => 0,
    )
) );

/* Square chart */
gutenberg_block( array(
    'name'  => 'squarechart1',
    'title' => 'Square chart first',
), array(
    array(
        'key'   => 'field_631756c6b761e',
        'label' => 'First chart',
        'type'  => 'tab',
    ),
    array(
        'key'   => 'field_63175758b761f',
        'label' => 'Bottom chart text',
        'name'  => 'sq_bottom_text1',
        'type'  => 'text',
    ),
    array(
        'key'   => 'field_6317576bb7620',
        'label' => 'Center chart text',
        'name'  => 'sq_text_center',
        'type'  => 'text',
    ),
    array(
        'key'        => 'field_6317579ab7621',
        'label'      => 'Items',
        'name'       => 'sq_items1',
        'type'       => 'repeater',
        'layout'     => 'block',
        'sub_fields' => array(
            array(
                'key'   => 'field_631757c8b7622',
                'label' => 'Percent',
                'name'  => 'percent',
                'type'  => 'number',
            ),
            array(
                'key'   => 'field_631757d9b7623',
                'label' => 'Content',
                'name'  => 'content',
                'type'  => 'textarea',
                'rows'  => 3,
            ),
        ),
    ),
    array(
        'key'   => 'field_631757eeb7624',
        'label' => 'Second chart',
        'type'  => 'tab',
    ),
    array(
        'key'   => 'field_6317580ab7625',
        'label' => 'Bottom chart text',
        'name'  => 'sq_bottom_text2',
        'type'  => 'text',
    ),
    array(
        'key'   => 'field_6317581eb7626',
        'label' => 'Center chart text',
        'name'  => 'sq_text_center2',
        'type'  => 'text',
    ),
    array(
        'key'        => 'field_63175851b7627',
        'label'      => 'Items',
        'name'       => 'sq_items2',
        'type'       => 'repeater',
        'layout'     => 'block',
        'sub_fields' => array(
            array(
                'key'   => 'field_631758dbb7628',
                'label' => 'Percent',
                'name'  => 'percent',
                'type'  => 'number',
            ),
            array(
                'key'   => 'field_631758e8b7629',
                'label' => 'Content',
                'name'  => 'content',
                'type'  => 'textarea',
                'rows'  => 3,
            ),
        ),
    ),
) );

gutenberg_block( array(
    'name'  => 'squarechart2',
    'title' => 'Square chart second',
), array(
        array(
            'key'               => 'field_63184cd16cce3',
            'label'             => 'Top title',
            'name'              => 'sq_title',
            'type'              => 'text',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
            ),
            'default_value'     => '',
            'placeholder'       => '',
            'prepend'           => '',
            'append'            => '',
            'maxlength'         => '',
        ),
        array(
            'key'               => 'field_63184ce16cce4',
            'label'             => 'Items',
            'name'              => 'sq_items3',
            'type'              => 'repeater',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
            ),
            'collapsed'         => '',
            'min'               => 0,
            'max'               => 0,
            'layout'            => 'block',
            'button_label'      => '',
            'sub_fields'        => array(
                array(
                    'key'               => 'field_63184ced6cce5',
                    'label'             => 'Amount',
                    'name'              => 'amount',
                    'type'              => 'number',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => '',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'min'               => '',
                    'max'               => '',
                    'step'              => '',
                ),
                array(
                    'key'               => 'field_63184d076cce6',
                    'label'             => 'Title',
                    'name'              => 'title',
                    'type'              => 'text',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => '',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'maxlength'         => '',
                ),
                array(
                    'key'               => 'field_63184d0d6cce7',
                    'label'             => 'Amount text (with k for thousands)',
                    'name'              => 'amount_text',
                    'type'              => 'text',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => '',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'maxlength'         => '',
                ),
                array(
                    'key'               => 'field_63184d286cce9',
                    'label'             => 'Content',
                    'name'              => 'content',
                    'type'              => 'wysiwyg',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => '',
                    'tabs'              => 'all',
                    'toolbar'           => 'full',
                    'media_upload'      => 1,
                    'delay'             => 0,
                ),
                array(
                    'key'               => 'field_63184d3f6ccea',
                    'label'             => 'Link',
                    'name'              => 'link',
                    'type'              => 'text',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => '',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'maxlength'         => '',
                ),
                array(
                    'key'               => 'field_63184d4d6cceb',
                    'label'             => 'Image',
                    'name'              => 'image',
                    'type'              => 'image',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'return_format'     => 'url',
                    'preview_size'      => 'medium',
                    'library'           => 'all',
                    'min_width'         => '',
                    'min_height'        => '',
                    'min_size'          => '',
                    'max_width'         => '',
                    'max_height'        => '',
                    'max_size'          => '',
                    'mime_types'        => '',
                ),
                array(
                    'key'   => 'squarechart2_image_on_top',
                    'label' => 'Move image to top',
                    'name'  => 'move_image_to_top',
                    'type'  => 'true_false',
                ),
            ),
        ),
    )
);


/* Resources highlights */
gutenberg_block( array(
    'name'  => 'resources-highlights',
    'title' => 'Resources highlights',
),
    array(
        array(
            'key'   => 'field_62bc11f0f71ce',
            'label' => 'Title',
            'name'  => 'title',
            'type'  => 'text',
        ),
        array(
            'key'          => 'resources_highlights_add_border_radius',
            'label'        => 'Add border radius to cards',
            'name'         => 'add_border_radius',
            'type'         => 'true_false',
        ),
        array(
            'key'        => 'field_62bc11c0f71cd',
            'label'      => 'Items',
            'name'       => 'items',
            'type'       => 'repeater',
            'layout'     => 'block',
            'sub_fields' => array(
                array(
                    'key'   => 'field_62bc13fca1e19',
                    'label' => 'Title',
                    'name'  => 'title',
                    'type'  => 'text',
                ),
                array(
                    'key'           => 'field_62bc13e1a1e17',
                    'label'         => 'Image',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key'   => 'field_62bc13e6a1e18',
                    'label' => 'Link',
                    'name'  => 'link',
                    'type'  => 'text',
                ),
            ),
        ),
    )
);

/* Latest */
gutenberg_block( array(
    'name'  => 'latest',
    'title' => 'Narrow section',
),
    array(
        array(
            'key'     => 'latest_padding',
            'label'   => 'Padding',
            'name'    => 'padding',
            'type'    => 'number',
            'wrapper' => [
                'width' => '50'
            ]
        ),
        array(
            'key' => 'field_64b7c5c781cb6',
            'label' => 'Title',
            'name' => 'title',
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
        array(
            'key' => 'field_64b7c5dc81cb7',
            'label' => 'Text',
            'name' => 'text',
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
        array(
            'key' => 'field_64b7c5eb81cb8',
            'label' => 'Button',
            'name' => 'button',
            'type' => 'link',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'array',
        ),
    )
);

/* Newsletter form */
gutenberg_block( array(
    'name'  => 'newsletter-form',
    'title' => 'Newsletter form',
),
    array(
        array(
            'key'   => 'field_62bc16451c659',
            'label' => 'Content',
            'name'  => 'content',
            'type'  => 'wysiwyg',
        ),
    )
);

/* Parallax block */
gutenberg_block( array(
    'name'  => 'parallax',
    'title' => 'Parallax block',
),
    array(
        array(
            'key'           => 'enable_overlay',
            'label'         => 'Enable overlay on image?',
            'name'          => 'enable_overlay',
            'type'          => 'true_false',
            'default_value' => 1,
        ),
        array(
            'key'           => 'field_62beb2f867527',
            'label'         => 'Parallax image',
            'name'          => 'parallax_image',
            'type'          => 'image',
            'return_format' => 'url',
        ),
        array(
            'key'           => 'field_62beb32a67528',
            'label'         => 'Mode',
            'name'          => 'mode',
            'type'          => 'select',
            'choices'       => array(
                'wide'       => 'Wide',
                'fullscreen' => 'Fullscreen',
                'narrow'     => 'Narrow',
            ),
            'default_value' => false,
            'allow_null'    => 1,
        ),
        array(
            'key'   => 'field_62beb2ca67524',
            'label' => 'Title',
            'name'  => 'title',
            'type'  => 'text',
        ),
        array(
            'key'           => 'field_62beb2d067525',
            'label'         => 'Image',
            'name'          => 'image',
            'type'          => 'image',
            'return_format' => 'url',
        ),
        array(
            'key'   => 'field_62beb2ec67526',
            'label' => 'Content',
            'name'  => 'content',
            'type'  => 'wysiwyg',
        ),
    )
);

/* Parallax block */
gutenberg_block( array(
    'name'  => 'video-row',
    'title' => 'Video row',
),
    array(
        array(
            'key'   => 'field_62c44a6674eff',
            'label' => 'Title 1',
            'name'  => 'title1',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_62c44a9b74f01',
            'label' => 'Video link 1',
            'name'  => 'video_link1',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_62c44a7074f00',
            'label' => 'Title 2',
            'name'  => 'title2',
            'type'  => 'text',
        ),
        array(
            'key'   => 'field_62c44aa874f02',
            'label' => 'Video link2',
            'name'  => 'video_link2',
            'type'  => 'text',
        ),
    )
);

/* Take action */
gutenberg_block( array(
    'name'  => 'take-action',
    'title' => 'Take action',
),
    array(
        array(
            'key'   => 'field_62cade74ee70b',
            'label' => 'Title',
            'name'  => 'title',
            'type'  => 'text',
        ),
        array(
            'key'           => 'field_62cade84ee70d',
            'label'         => 'Image',
            'name'          => 'image',
            'type'          => 'image',
            'return_format' => 'url',
        ),
        array(
            'key'   => 'field_62cade99ee70e',
            'label' => 'Excerpt',
            'name'  => 'excerpt_text',
            'type'  => 'textarea',
        ),
        array(
            'key'     => 'field_62cade9bee70f',
            'label'   => 'Button name',
            'name'    => 'btn_name',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '40',
            ),
        ),
        array(
            'key'     => 'field_62cade78ee70c',
            'label'   => 'Link',
            'name'    => 'link',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '60',
            ),
        ),
    )
);

/* Subscribe promo */
gutenberg_block( array(
    'name'  => 'subscribe-promo',
    'title' => 'Subscribe promo',
),
    array(
        array(
            'key'   => 'field_62cae35d81311',
            'label' => 'Title',
            'name'  => 'title',
            'type'  => 'text',
        ),
        array(
            'key'     => 'field_62cae36a81313',
            'label'   => 'Button text',
            'name'    => 'btn_text',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '40',
            ),
        ),
        array(
            'key'     => 'field_62cae36181312',
            'label'   => 'Button link',
            'name'    => 'button_link',
            'type'    => 'text',
            'wrapper' => array(
                'width' => '60',
            ),
        ),
        array(
            'key'          => 'subscribe_promo_enable_form',
            'label'        => 'Enable form',
            'name'         => 'enable_form',
            'type'         => 'true_false',
            'instructions' => 'If not checked, the subscribe form will be hidden',
        ),
    )
);

/* Country select */
gutenberg_block( array(
        'name'  => 'country-select',
        'title' => 'Country select',
    )
);

/* Country select */
gutenberg_block( array(
    'name'  => 'donate-page',
    'title' => 'Donate page',
),
    array(
        array(
            'key'               => 'field_62ce694cf9b66',
            'label'             => 'Title',
            'name'              => 'title',
            'type'              => 'text',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
            ),
            'default_value'     => '',
            'placeholder'       => '',
            'prepend'           => '',
            'append'            => '',
            'maxlength'         => '',
        ),
        array(
            'key'           => 'field_62ce6978f9b69b',
            'label'         => 'Banner image',
            'name'          => 'banner',
            'type'          => 'image',
            'return_format' => 'url',
        ),
        array(
            'key'           => 'donate_page_banner_video',
            'label'         => 'Banner video',
            'name'          => 'banner_video',
            'type'          => 'file',
            'return_format' => 'url',
        ),
        array(
            'key'               => 'field_62ce6951f9b67',
            'label'             => 'Amount items',
            'name'              => 'items',
            'type'              => 'repeater',
            'instructions'      => '',
            'required'          => 0,
            'conditional_logic' => 0,
            'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
            ),
            'collapsed'         => '',
            'min'               => 0,
            'max'               => 0,
            'layout'            => 'table',
            'button_label'      => '',
            'sub_fields'        => array(
                array(
                    'key'   => 'field_62ce696af9b68',
                    'label' => 'Amount',
                    'name'  => 'amount',
                    'type'  => 'number',
                ),
                array(
                    'key'           => 'field_62ce6978f9b69',
                    'label'         => 'Image',
                    'name'          => 'image',
                    'type'          => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key'   => 'field_62ce6985f9b6a',
                    'label' => 'Text',
                    'name'  => 'text',
                    'type'  => 'textarea',
                    'rows'  => 3,
                ),
            ),
        ),
    )
);

/* Country select */
gutenberg_block( array(
    'name'  => 'insta-story',
    'title' => 'Insta story',
),
    array(
        array(
            'key'           => 'field_62db959bfdceb',
            'label'         => 'Stories',
            'name'          => 'stories',
            'type'          => 'relationship',
            'post_type'     => array(
                'insta-stories',
            ),
            'filters'       => array(
                'search',
            ),
            'return_format' => 'id',
        ),
    )
);

/* Get involved */
gutenberg_block(
    array(
        'name'  => 'get-involved',
        'title' => 'Get involved',
    ),
    array(
        array(
            'key' => 'field_65b8f965e1f23',
            'label' => 'Background',
            'name' => 'get_involved_bg',
            'type' => 'color_picker',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '33',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '#6b3268',
            'enable_opacity' => 0,
            'return_format' => 'string',
        ),
        array(
            'key' => 'field_65b8fc99fe64d',
            'label' => 'Text Color',
            'name' => 'get_involved_color',
            'type' => 'color_picker',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '33',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '#ffffff',
            'enable_opacity' => 0,
            'return_format' => 'string',
        ),
        array(
            'key' => 'field_65b900e143056',
            'label' => 'Inversed',
            'name' => 'inversed',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '33',
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
        array(
            'key' => 'field_629771fa46134',
            'label' => 'Title',
            'name' => 'get_involved_title',
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
        array(
            'key' => 'field_6297720446135',
            'label' => 'Content',
            'name' => 'get_involved_content',
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
            'rows' => 5,
            'new_lines' => '',
        ),
        array(
            'key' => 'field_6297721a46136',
            'label' => 'Items',
            'name' => 'get_involved_items',
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
            'layout' => 'row',
            'button_label' => '',
            'sub_fields' => array(
                array(
                    'key' => 'field_6297722d46137',
                    'label' => 'Title',
                    'name' => 'title',
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
                array(
                    'key' => 'field_6297723146138',
                    'label' => 'Image',
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
                    'return_format' => 'url',
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
                array(
                    'key' => 'field_629772474613a',
                    'label' => 'Link',
                    'name' => 'link',
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
                array(
                    'key' => 'field_65b8f965e1f23_title_bg',
                    'label' => 'Title Background',
                    'name' => 'get_involved_title_bg',
                    'type' => 'color_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'enable_opacity' => 0,
                    'return_format' => 'string',
                ),
            ),
        ),
    ));