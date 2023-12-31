<?php

return [
    /**
     * If any input file(image) as default will used options below.
     */
    'image' => [
        /**
         * Path for store the image.
         *
         * avaiable options:
         * 1. public
         * 2. storage
         */
        'path' => 'storage',

        /**
         * Will used if image is nullable and default value is null.
         */
        'default' => 'https://via.placeholder.com/350?text=No+Image+Avaiable',

        /**
         * Crop the uploaded image using intervention image.
         */
        'crop' => true,

        /**
         * When set to true the uploaded image aspect ratio will still original.
         */
        'aspect_ratio' => true,

        /**
         * Crop image size.
         */
        'width' => 500,
        'height' => 500,
    ],

    'format' => [
        /**
         * Will used to first year on select, if any column type year.
         */
        'first_year' => 1900,

        /**
         * If any date column type will cast and display used this format, but for input date still will used Y-m-d format.
         *
         * another most common format:
         * - M d Y
         * - d F Y
         * - Y m d
         */
        'date' => 'd/m/Y',

        /**
         * If any input type month will cast and display used this format.
         */
        'month' => 'm/Y',

        /**
         * If any input type time will cast and display used this format.
         */
        'time' => 'H:i',

        /**
         * If any datetime column type or datetime-local on input, will cast and display used this format.
         */
        'datetime' => 'd/m/Y H:i',

        /**
         * Limit string on index view for any column type text or longtext.
         */
        'limit_text' => 100,
    ],

    /**
     * It will used for generator to manage and showing menus on sidebar views.
     *
     * Example:
     * [
     *   'header' => 'Main',
     *
     *   // All permissions in menus[] and submenus[]
     *   'permissions' => ['test view'],
     *
     *   menus' => [
     *       [
     *          'title' => 'Main Data',
     *          'icon' => '<i class="bi bi-collection-fill"></i>',
     *          'route' => null,
     *
     *          // permission always null when isset submenus
     *          'permission' => null,
     *
     *          // All permissions on submenus[] and will empty[] when submenus equals to []
     *          'permissions' => ['test view'],
     *
     *          'submenus' => [
     *                 [
     *                     'title' => 'Tests',
     *                     'route' => '/tests',
     *                     'permission' => 'test view'
     *                  ]
     *               ],
     *           ],
     *       ],
     *  ],
     *
     * This code below always changes when you use a generator and maybe you must lint or format the code.
     */
    'sidebars' => [
    [
        'header' => 'Product',
        'permissions' => [
            'categoryproduct view',
            'product view'
        ],
        'menus' => [
            [
                'title' => 'Product',
                'icon' => '<i data-feather="box"></i>',
                'route' => null,
                'permission' => null,
                'permissions' => [
                    'categoryproduct view',
                    'product view'
                ],
                'submenus' => [
                    [
                        'title' => 'Products',
                        'route' => '/products',
                        'permission' => 'product view'
                    ],
                    [
                        'title' => 'Category Products',
                        'route' => '/categoryproducts',
                        'permission' => 'categoryproduct view'
                    ]
                ]
            ]
        ]
    ],
    [
        'header' => 'About',
        'permissions' => [
            'vm view',
            'company view',
            'certificate view',
            'social view',
            'team view'
        ],
        'menus' => [
            [
                'title' => 'About Us',
                'icon' => '<i data-feather="info"></i>',
                'route' => null,
                'permission' => null,
                'permissions' => [
                    'vm view',
                    'company view',
                    'certificate view',
                    'social view',
                    'team view'
                ],
                'submenus' => [
                    [
                        'title' => 'Company',
                        'route' => '/companies',
                        'permission' => 'company view'
                    ],
                    [
                        'title' => 'Visi & Misi',
                        'route' => '/vms',
                        'permission' => 'vm view'
                    ],
                    [
                        'title' => 'Certificates',
                        'route' => '/certificates',
                        'permission' => 'certificate view'
                    ],
                    [
                        'title' => 'Social Media',
                        'route' => '/socials',
                        'permission' => 'social view'
                    ],
                    [
                        'title' => 'Teams',
                        'route' => '/teams',
                        'permission' => 'team view'
                    ]
                ]
            ]
        ]
    ],
    [
        'header' => 'Businesses',
        'permissions' => [
            'business view'
        ],
        'menus' => [
            [
                'title' => 'Business Units',
                'icon' => '<i data-feather="list"></i>',
                'route' => '/businesses',
                'permission' => 'business view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Portfolios',
        'permissions' => [
            'portfolio view'
        ],
        'menus' => [
            [
                'title' => 'Portfolio',
                'icon' => '<i data-feather="list"></i>',
                'route' => '/portfolios',
                'permission' => 'portfolio view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Our Clients',
        'permissions' => [
            'client view'
        ],
        'menus' => [
            [
                'title' => 'Clients',
                'icon' => '<i data-feather="users"></i>',
                'route' => '/clients',
                'permission' => 'client view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Contacts',
        'permissions' => [
            'contact view'
        ],
        'menus' => [
            [
                'title' => 'Contacts',
                'icon' => '<i data-feather="mail"></i>',
                'route' => '/contacts',
                'permission' => 'contact view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Banners',
        'permissions' => [
            'banner view'
        ],
        'menus' => [
            [
                'title' => 'Banner Management',
                'icon' => '<i data-feather="image"></i>',
                'route' => '/banners',
                'permission' => 'banner view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Testimonies',
        'permissions' => [
            'testimony view'
        ],
        'menus' => [
            [
                'title' => 'Testimonies',
                'icon' => '<i data-feather="hash"></i>',
                'route' => '/testimonies',
                'permission' => 'testimony view',
                'permissions' => [],
                'submenus' => []
            ]
        ]
    ],
    [
        'header' => 'Utilities',
        'permissions' => [
            'role & permission view',
            'user view'
        ],
        'menus' => [
            [
                'title' => 'Utilities',
                'icon' => '<i data-feather="settings"></i>',
                'route' => null,
                'permission' => null,
                'permissions' => [
                    'role & permission view',
                    'user view'
                ],
                'submenus' => [
                    [
                        'title' => 'Users',
                        'route' => '/users',
                        'permission' => 'user view'
                    ],
                    [
                        'title' => 'Roles & permissions',
                        'route' => '/roles',
                        'permission' => 'role & permission view'
                    ]
                ]
            ]
        ]
    ]
]
];
