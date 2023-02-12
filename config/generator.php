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
            'header' => 'Latest Datas',
            'permissions' => [
                'latest data view'
            ],
            'menus' => [
                [
                    'title' => 'Latest Data Device',
                    'icon' => '<i data-feather="check-square"></i>',
                    'route' => '/latest-datas',
                    'permission' => 'latest data view',
                    'permissions' => [],
                    'submenus' => []
                ]
            ]
        ],
        [
            'header' => 'Devices',
            'permissions' => [
                'device view'
            ],
            'menus' => [
                [
                    'title' => 'Management Devices',
                    'icon' => '<i data-feather="airplay"></i>',
                    'route' => '/devices',
                    'permission' => 'device view',
                    'permissions' => [],
                    'submenus' => []
                ]
            ]
        ],
        [
            'header' => 'Instances',
            'permissions' => [
                'instance view',
                'cluster view'
            ],
            'menus' => [
                [
                    'title' => 'Instances',
                    'icon' => '<i data-feather="database"></i>',
                    'route' => null,
                    'permission' => null,
                    'permissions' => [
                        'instance view',
                        'cluster view'
                    ],
                    'submenus' => [
                        [
                            'title' => 'Data Instances',
                            'route' => '/instances',
                            'permission' => 'instance view'
                        ],
                        [
                            'title' => 'Clusters',
                            'route' => '/clusters',
                            'permission' => 'cluster view'
                        ]
                    ]
                ]
            ]
        ],
        [
            'header' => 'Gatewaies',
            'permissions' => [
                'gateway view'
            ],
            'menus' => [
                [
                    'title' => 'Gateway',
                    'icon' => '<i data-feather="hard-drive"></i>',
                    'route' => '/gateways',
                    'permission' => 'gateway view',
                    'permissions' => [],
                    'submenus' => []
                ]
            ]
        ],
        [
            'header' => 'Tickets',
            'permissions' => [
                'ticket view'
            ],
            'menus' => [
                [
                    'title' => 'Tickets',
                    'icon' => '<i data-feather="file-text"></i>',
                    'route' => '/tickets',
                    'permission' => 'ticket view',
                    'permissions' => [],
                    'submenus' => []
                ]
            ]
        ],
        [
            'header' => 'System',
            'permissions' => [
                'rawdata view',
                'parsed view'
            ],
            'menus' => [
                [
                    'title' => 'System Log',
                    'icon' => '<i data-feather="list"></i>',
                    'route' => null,
                    'permission' => null,
                    'permissions' => [
                        'rawdata view',
                        'parsed view'
                    ],
                    'submenus' => [
                        [
                            'title' => 'Rawdata',
                            'route' => '/rawdatas',
                            'permission' => 'rawdata view'
                        ],
                        [
                            'title' => 'Parseds',
                            'route' => '/parseds',
                            'permission' => 'parsed view'
                        ]
                    ]
                ]
            ]
        ],
        [
            'header' => 'Main',
            'permissions' => [
                'subnet view',
                'province view',
                'kabkot view',
                'kecamatan view',
                'kelurahan view',
                'maintenance view',
                'maintenance view'
            ],
            'menus' => [
                [
                    'title' => 'Main Data',
                    'icon' => '<i data-feather="list"></i>',
                    'route' => null,
                    'permission' => null,
                    'permissions' => [
                        'maintenance view',
                        'subnet view',
                        'province view',
                        'kabkot view',
                        'kecamatan view',
                        'kelurahan view'
                    ],
                    'submenus' => [
                        [
                            'title' => 'Maintenances',
                            'route' => '/maintenances',
                            'permission' => 'maintenance view'
                        ],
                        [
                            'title' => 'Subnets',
                            'route' => '/subnets',
                            'permission' => 'subnet view'
                        ],
                        [
                            'title' => 'Provinsi',
                            'route' => '/provinces',
                            'permission' => 'province view'
                        ],
                        [
                            'title' => 'Kabupaten/Kota',
                            'route' => '/kabkots',
                            'permission' => 'kabkot view'
                        ],
                        [
                            'title' => 'Kecamatan',
                            'route' => '/kecamatans',
                            'permission' => 'kecamatan view'
                        ],
                        [
                            'title' => 'Kelurahan',
                            'route' => '/kelurahans',
                            'permission' => 'kelurahan view'
                        ]
                    ]
                ]
            ]
        ],
        [
            'header' => 'Utilities',
            'permissions' => [
                'setting view',
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
                        'setting view',
                        'role & permission view',
                        'user view'
                    ],
                    'submenus' => [
                        [
                            'title' => 'Settings App',
                            'route' => '/settings',
                            'permission' => 'setting view'
                        ],
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
