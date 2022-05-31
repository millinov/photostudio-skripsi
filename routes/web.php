<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Aplikasi sewa Studio Foto",
        "email" => "asdfg@gmail.com",
        "image" => "image-about.jpg"
    ]);
});

Route::get('/katalog', function () {

    $katalog_studio = [
        [
            "title" => "Studio Foto 1",
            "slug" => "studio-foto-1",
            "author" => "Budi",
            "desc" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error maxime, odit voluptate dignissimos, aliquid exercitationem repellendus tempora nam laudantium, natus minima magni odio ducimus nostrum perspiciatis. Sapiente natus laudantium odit delectus corrupti debitis. Aliquam veniam sint vel ipsum perspiciatis vero? Debitis commodi mollitia tempora soluta consequuntur non eum consequatur nihil, dignissimos blanditiis placeat suscipit vero officia laboriosam neque eaque libero dolorem qui reiciendis, doloremque quis sequi optio voluptate? Repellat ut soluta, repudiandae recusandae, veniam voluptas obcaecati facere velit eaque maxime fugiat adipisci alias id odit nemo, quos accusantium dolore est.."
        ],
        [
            "title" => "Studio Foto 2",
            "slug" => "studio-foto-2",
            "author" => "Doni",
            "desc" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error maxime, odit voluptate dignissimos, aliquid exercitationem repellendus tempora nam laudantium, natus minima magni odio ducimus nostrum perspiciatis. Sapiente natus laudantium odit delectus corrupti debitis. Aliquam veniam sint vel ipsum perspiciatis vero? Debitis commodi mollitia tempora soluta consequuntur non eum consequatur nihil, dignissimos blanditiis placeat suscipit vero officia laboriosam neque eaque libero dolorem qui reiciendis, doloremque quis sequi optio voluptate? Repellat ut soluta, repudiandae recusandae, veniam voluptas obcaecati facere velit eaque maxime fugiat adipisci alias id odit nemo, quos accusantium dolore est.."
        ],
        [
            "title" => "Studio Foto 3",
            "slug" => "studio-foto-3",
            "author" => "Sara",
            "desc" => "
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error maxime, odit voluptate dignissimos, aliquid exercitationem repellendus tempora nam laudantium, natus minima magni odio ducimus nostrum perspiciatis. Sapiente natus laudantium odit delectus corrupti debitis. Aliquam veniam sint vel ipsum perspiciatis vero? Debitis commodi mollitia tempora soluta consequuntur non eum consequatur nihil, dignissimos blanditiis placeat suscipit vero officia laboriosam neque eaque libero dolorem qui reiciendis, doloremque quis sequi optio voluptate? Repellat ut soluta, repudiandae recusandae, veniam voluptas obcaecati facere velit eaque maxime fugiat adipisci alias id odit nemo, quos accusantium dolore est.."
        ]
    ];

    return view('katalog', [
        "title" => "Katalog",
        "catalogue" => $katalog_studio
    ]);
});

// halaman single post
Route::get('katalog/{slug}', function($slug) {

    $katalog_studio = [
        [
            "title" => "Studio Foto 1",
            "slug" => "studio-foto-1",
            "author" => "Budi",
            "desc" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error maxime, odit voluptate dignissimos, aliquid exercitationem repellendus tempora nam laudantium, natus minima magni odio ducimus nostrum perspiciatis. Sapiente natus laudantium odit delectus corrupti debitis. Aliquam veniam sint vel ipsum perspiciatis vero? Debitis commodi mollitia tempora soluta consequuntur non eum consequatur nihil, dignissimos blanditiis placeat suscipit vero officia laboriosam neque eaque libero dolorem qui reiciendis, doloremque quis sequi optio voluptate? Repellat ut soluta, repudiandae recusandae, veniam voluptas obcaecati facere velit eaque maxime fugiat adipisci alias id odit nemo, quos accusantium dolore est.."
        ],
        [
            "title" => "Studio Foto 2",
            "slug" => "studio-foto-2",
            "author" => "Doni",
            "desc" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error maxime, odit voluptate dignissimos, aliquid exercitationem repellendus tempora nam laudantium, natus minima magni odio ducimus nostrum perspiciatis. Sapiente natus laudantium odit delectus corrupti debitis. Aliquam veniam sint vel ipsum perspiciatis vero? Debitis commodi mollitia tempora soluta consequuntur non eum consequatur nihil, dignissimos blanditiis placeat suscipit vero officia laboriosam neque eaque libero dolorem qui reiciendis, doloremque quis sequi optio voluptate? Repellat ut soluta, repudiandae recusandae, veniam voluptas obcaecati facere velit eaque maxime fugiat adipisci alias id odit nemo, quos accusantium dolore est.."
        ],
        [
            "title" => "Studio Foto 3",
            "slug" => "studio-foto-3",
            "author" => "Sara",
            "desc" => "
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error maxime, odit voluptate dignissimos, aliquid exercitationem repellendus tempora nam laudantium, natus minima magni odio ducimus nostrum perspiciatis. Sapiente natus laudantium odit delectus corrupti debitis. Aliquam veniam sint vel ipsum perspiciatis vero? Debitis commodi mollitia tempora soluta consequuntur non eum consequatur nihil, dignissimos blanditiis placeat suscipit vero officia laboriosam neque eaque libero dolorem qui reiciendis, doloremque quis sequi optio voluptate? Repellat ut soluta, repudiandae recusandae, veniam voluptas obcaecati facere velit eaque maxime fugiat adipisci alias id odit nemo, quos accusantium dolore est.."
        ]
    ];

    $new_studio = [];
    foreach($katalog_studio as $item) {
        if($item["slug"] == $slug)
        {
            $new_studio = $item;
        }
    }

    return view('studio',[
        "title" => "Studio Foto",
        "studio" => $new_studio
    ]);
});