<?php

return [
    'debug'  => true,
    'schnti.cachebuster.active' => false,

    'pedroborges.meta-tags.default' => function ($page, $site) {
        return [
            'title' => $site->title(),
            'meta' => [
                'description' => $site->description()
            ],
            'link' => [
                'canonical' => $page->url()
            ],
            'og' => [
                'title' => $page->isHomePage()
                    ? $site->title()
                    : $page->title(),
                'type' => 'website',
                'site_name' => $site->title(),
                'url' => $page->url(),
                'namespace:image' => function($page, $site) {
                    $image = $site->fbimg()->toFile();
    
                    return [
                        'image' => $image->url(),
                        'height' => $image->height(),
                        'width' => $image->width(),
                        'type' => $image->mime()
                    ];
                }
            ]
        ];
    }
];