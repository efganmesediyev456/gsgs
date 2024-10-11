<?php

return [
    [
        'title' => 'Əsas'
    ],
    [
        'icon' => '<i class="bx bxs-dashboard"></i>',
        'title' => 'Əsas səhifə',
        'route' => 'gopanel.dashboard',
        'can'   => 'gopanel.dashboard',
    ],
    [
        'icon'  => '<i class="fas fa-tools"></i>',
        'title' => 'Tənzimləmələr',
        'can'   => 'settings',
        'inner' => [
            [
                'icon' => '<i class="fas fa-phone"></i>',
                'title' => 'Əsas Ayarlar',
                'route' => 'gopanel.mainsettings.index',
                'can'   => 'mainsettings.index',
            ],
            [
                'icon' => '<i class="fas fa-phone"></i>',
                'title' => 'Sosial Linklər',
                'route' => 'gopanel.sociallinks.index',
                'can'   => 'sociallinks.index',
            ],
            [
                'icon' => '<i class="fas fa-phone"></i>',
                'title' => 'Menyular',
                'route' => 'gopanel.menus.index',
                    'can'   => 'menus.index',
            ],
            [
                'icon' => '<i class="fas fa-phone"></i>',
                'title' => 'Tərcümələr',
                'route' => 'gopanel.langtranslations.index',
                'can'   => 'menus.index',
            ],
            [
                'icon' => '<i class="fas fa-phone"></i>',
                'title' => 'Əlaqə',
                'route' => 'gopanel.contact.index',
                'can'   => 'contact.index',
            ],
            [
                'icon' => '<i class="fas fa-phone"></i>',
                'title' => 'Əlaqə detallar',
                'route' => 'gopanel.contactdetails.index',
                'can'   => 'contactdetails.index',
            ],
            [
                'icon' => '<i class="fas fa-phone"></i>',
                'title' => 'Saytın dilləri',
                'route' => 'gopanel.languages.index',
                'can'   => 'languages.index',
            ],
        ]
    ],
    [
        'icon'  => '<i class="fas fa-user-tie"></i>',
        'title' => 'İdarəçilər',
        'can'   => 'admins.index',
        'inner' => [
            [
                'icon' => '<i class="fas fa-user-shield"></i>',
                'title' => 'Adminlər',
                'route' => 'gopanel.admins.index',
                'can' => 'admins.index',
            ],
//            [
//                'icon' => '<i class="fas fa-user-lock"></i>',
//                'title' => 'İcazələr',
//                'route' => 'gopanel.permission.index',
//                'can' => 'permission.index',
//            ],
//            [
//                'icon' => '<i class="fas fa-user-graduate"></i>',
//                'title' => 'Vəzifələr',
//                'route' => 'gopanel.role.index',
//                'can' => 'role.index',
//            ],
        ]
    ],

    [
        'icon'  => '<i class="fas fa-user-tie"></i>',
        'title' => 'Əsas səhifə',
        'can'   => 'admins.index',
        'inner' => [
            [
                'icon' => '<i class="fas fa-user-shield"></i>',
                'title' => 'Sliderlər',
                'route' => 'gopanel.sliders.index',
                'can' =>   'admins.index',
            ],
            [
                'icon'  => '<i class="fas fa-user-shield"></i>',
                'title' => 'Özəlliklər',
                'route' => 'gopanel.features.index',
                'can'   => 'features.index',
            ],
            [
                'icon'  => '<i class="fas fa-user-shield"></i>',
                'title' => 'Kəşf edin',
                'route' => 'gopanel.discovers.index',
                'can'   => 'discovers.index',
            ],
            [
                'icon'  => '<i class="fas fa-user-shield"></i>',
                'title' => 'Reklamlar',
                'route' => 'gopanel.advertisements.index',
                'can'   => 'advertisements.index',
            ],
            [
                'icon'  => '<i class="fas fa-user-shield"></i>',
                'title' => 'Əməkdaşlarımız',
                'route' => 'gopanel.partners.index',
                'can'   => 'partners.index',
            ],
            [
                'icon'  => '<i class="fas fa-user-shield"></i>',
                'title' => 'Bloq təklifləri',
                'route' => 'gopanel.blogoffers.index',
                'can'   => 'blogoffers.index',
            ],
//            [
//                'icon' => '<i class="fas fa-user-lock"></i>',
//                'title' => 'İcazələr',
//                'route' => 'gopanel.permission.index',
//                'can' => 'permission.index',
//            ],
//            [
//                'icon' => '<i class="fas fa-user-graduate"></i>',
//                'title' => 'Vəzifələr',
//                'route' => 'gopanel.role.index',
//                'can' => 'role.index',
//            ],
        ]
    ],


    [
            'icon' => '<i class="fas fa-info-circle"></i>',
            'title' => 'Haqqımızda',
            'can' =>   'aboutpages.index',
            'inner' => [
                [
                    'icon' => '<i class="fas fa-info-circle"></i>',
                    'title' => 'Ayarlar',
                    'route' => 'gopanel.aboutpages.index',
                    'can' =>   'aboutpages.index',
                ],
                [
                    'icon' => '<i class="fas fa-info-circle"></i>',
                    'title' => 'Müştəri rəyləri',
                    'route' => 'gopanel.customerratings.index',
                    'can' =>   'customerratings.index',
                ],
            ]

    ],

    [
        'title' => 'Kontent'
    ],
    [
        'icon' => '<i class="fas fa-box"></i>',
        'title' => 'Kateqoriyalar',
        'route' => 'gopanel.category.index',
        'can'   => 'gopanel.category.index',
    ],
    [
        'icon' => '<i class="fas fa-blog"></i>',
        'title' => 'Bloqlar',
        'route' => 'gopanel.blogs.index',
        'can'   => 'gopanel.blogs.index',
    ],
    [
        'icon' => '<i class="fas fa-box-open"></i>',
        'title' => 'Məhsullar',
        'route' => 'gopanel.productslist.index',
        'can'   => 'gopanel.productslist.index',
    ],
    [
        'icon' => '<i class="fa fa-clone" aria-hidden="true"></i>',
        'title' => 'Brendlər',
        'route' => 'gopanel.brends.index',
        'can'   => 'brends.index',
    ],
    [
        'icon' => '<i class="fa fa-clone" aria-hidden="true"></i>',
        'title' => 'Parametrlər',
        'route' => 'gopanel.parameters.index',
        'can'   => 'parameters.index',
    ],
    [
        'icon' => '<i class="fas fa-question-circle"></i>',
        'title' => 'Faqs',
        'route' => 'gopanel.faqs.index',
        'can'   => 'faqs.index',
    ],
    [
        'title' => 'Form Məlumatları',
    ],
    [
        'icon' => '<i class="fas fa-users"></i>',
        'title' => 'Sayta abunə olanlar',
        'route' => 'gopanel.siteapplies.index',
        'can'   => 'siteapplies.index',
    ],
    [
        'icon' => '<i class="fas fa-phone"></i>',
        'title' => 'Əlaqə mesajları',
        'route' => 'gopanel.contactforms.index',
        'can'   => 'contactforms.index',
    ]
];
