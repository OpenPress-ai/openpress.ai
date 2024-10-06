<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentBlockController extends Controller
{
    public function demo()
    {
        $page = [
            "title" => "Welcome to OpenPress",
            "slug" => "welcome",
            "blocks" => [
                [
                    "type" => "Container",
                    "id" => "main-container",
                    "attributes" => [
                        "className" => "page-container"
                    ],
                    "children" => [
                        [
                            "type" => "Headline",
                            "id" => "main-headline",
                            "attributes" => [
                                "level" => "h1",
                                "content" => "Welcome to OpenPress"
                            ]
                        ],
                        [
                            "type" => "Image",
                            "id" => "hero-image",
                            "attributes" => [
                                "src" => "/images/hero.jpg",
                                "alt" => "OpenPress Hero Image",
                                "width" => 1200,
                                "height" => 600
                            ]
                        ],
                        [
                            "type" => "Grid",
                            "id" => "features-grid",
                            "attributes" => [
                                "columns" => 3,
                                "gap" => "20px"
                            ],
                            "children" => [
                                [
                                    "type" => "Container",
                                    "id" => "feature-1",
                                    "children" => [
                                        [
                                            "type" => "Headline",
                                            "id" => "feature-1-title",
                                            "attributes" => [
                                                "level" => "h3",
                                                "content" => "Easy to Use"
                                            ]
                                        ],
                                        [
                                            "type" => "Button",
                                            "id" => "feature-1-button",
                                            "attributes" => [
                                                "text" => "Learn More",
                                                "url" => "/features/easy-to-use"
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ],
                        [
                            "type" => "QueryLoop",
                            "id" => "recent-posts",
                            "attributes" => [
                                "postType" => "post",
                                "limit" => 3,
                                "orderBy" => "date",
                                "order" => "DESC"
                            ],
                            "children" => [
                                [
                                    "type" => "Container",
                                    "id" => "post-container",
                                    "children" => [
                                        [
                                            "type" => "Headline",
                                            "id" => "post-title",
                                            "attributes" => [
                                                "level" => "h2",
                                                "content" => "{{post.title}}"
                                            ]
                                        ],
                                        [
                                            "type" => "Button",
                                            "id" => "read-more",
                                            "attributes" => [
                                                "text" => "Read More",
                                                "url" => "{{post.url}}"
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return view('content-blocks.demo', compact('page'));
    }
}