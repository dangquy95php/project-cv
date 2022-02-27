<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => 'nipponpaint',
    'logo_img' => '/images/common/logo.svg',
    'logo_img_class' => 'brand-image',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => false,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#661-authentication-views-classes
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#662-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-danger elevation-3',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'admin/home',

    'logout_url' => 'admin/logout',

    'login_url' => 'admin/login',

    'register_url' => 'admin/user/register',

    'password_reset_url' => 'admin/password/reset',

    'password_email_url' => 'admin/password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    //AdminLTEのデフォルトのcssとjsを読み込んだあと、別途css/admin/style.cssとjs/admin/app.jsを読み込ませる運用
    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'        => '製品',
            'icon'        => 'fas fa-fw fa-paint-roller',
            'submenu' => [
                [
                    'text' => '建築用塗料',
                    'icon' => 'fas fa-fw fa-home',
                    'submenu' => [
                        [
                            'text' => '製品',
                            'url' => 'admin/product/building',
                            'icon' => 'far fa-circle nav-icon'
                        ],
                        [
                            'text' => '製品カテゴリ',
                            'url' => 'admin/product/building/category',
                            'icon' => 'far fa-circle nav-icon'
                        ],
                    ]
                ],
                [
                    'text' => '重防食用塗料',
                    'icon' => 'fas fa-fw fa-archway',
                    'submenu' => [
                        [
                            'text' => '製品',
                            'url' => 'admin/product/large',
                            'icon' => 'far fa-circle nav-icon'
                        ],
                        [
                            'text' => '規格',
                            'url' => 'admin/product/large/standard',
                            'icon' => 'far fa-circle nav-icon'
                        ],
                        [
                            'text' => '仕様｜橋梁・コンクリート',
                            'url' => 'admin/product/large/specification/bridge',
                            'icon' => 'far fa-circle nav-icon'
                        ],
                        [
                            'text' => '仕様｜プラント・鉄塔・鋼構造物',
                            'url' => 'admin/product/large/specification/steel',
                            'icon' => 'far fa-circle nav-icon'
                        ]
                    ]
                ],
                [
                    'text' => '自動車補修用塗料',
                    'icon' => 'fas fa-fw fa-car',
                    'submenu' => [
                        [
                            'text' => '製品',
                            'url' => 'admin/product/automotive',
                            'icon' => 'far fa-circle nav-icon'
                        ],
                        [
                            'text' => '製品カテゴリ',
                            'url' => 'admin/product/automotive/category',
                            'icon' => 'far fa-circle nav-icon'
                        ],
                    ]
                ],
                [
                    'text' => '資料',
                    'url' => 'admin/product/document',
                    'icon' => 'far fa-fw fa-file-pdf'
                ]
            ]
        ],
        [
            'text'        => 'ニッペラボ',
            'icon'        => 'fas fa-fw fa-paint-roller',
            'submenu'     => [
                [
                    'text' => '記事',
                    'url'  => 'admin/nippelab/article',
                    'icon' => 'far fa-circle nav-icon'
                ],
                [
                    'text' => '用語',
                    'icon' => 'far fa-fw fa-folder',
                    'submenu' => [
                        [
                            'text' => '用語',
                            'url'  => 'admin/nippelab/term',
                            'icon' => 'far fa-circle nav-icon',
                        ],
                        [
                            'text' => 'タグ',
                            'url'  => 'admin/nippelab/term_tag',
                            'icon' => 'far fa-circle nav-icon',
                        ],
                    ]
                ]
            ]
        ],
        [
            'text'      => '拠点情報',
            'url'         => 'admin/network',
            'icon'      => 'fas fa-fw fa-brush',
        ],
        [
            'text'        => 'よくあるご質問',
            'icon'        => 'fas fa-fw fa-paint-roller',
            'submenu' => [
                [
                    'text' => 'ご質問',
                    'url'  => 'admin/faq',
                    'icon' => 'far fa-circle nav-icon',
                ],
                [
                    'text' => 'ピックアップ',
                    'url'  => 'admin/faq/pickup',
                    'icon' => 'far fa-circle nav-icon',
                ],
                [
                    'text' => '質問カテゴリ',
                    'url'  => 'admin/faq/category',
                    'icon' => 'far fa-circle nav-icon',
                ],
            ]
        ],
        [
            'text'        => 'トピックス',
            'url'         => 'admin/news',
            'icon'        => 'fas fa-fw fa-brush',
        ],
        [
            'text'        => 'ファイル管理',
            'url'         => 'admin/file',
            'icon'        => 'fas fa-fw fa-file',
        ],
        ['header' => 'account_settings'],
        [
            'text' => 'ユーザー管理',
            'url'  => 'admin/user',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'マイプロフィール',
            'url'  => 'admin/user/my_profile',
            'icon' => 'fas fa-fw fa-user',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        [
            'name' => 'Chartjs',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        [
            'name' => 'Pace',
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],
];
