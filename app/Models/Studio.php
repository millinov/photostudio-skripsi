<?php

namespace App\Models;

class Studio 
{
    private static $studio_foto = [
        [
            "title" => "Studio Foto 1",
            "slug" => "studio-foto-1",
            "author" => "Budi",
            "desc" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error maxime, odit voluptate dignissimos, aliquid exercitationem repellendus tempora nam laudantium, natus minima magni odio ducimus nostrum perspiciatis. Sapiente natus laudantium odit delectus corrupti debitis. Aliquam veniam sint vel ipsum perspiciatis vero? Debitis commodi mollitia tempora soluta consequuntur non eum consequatur nihil, dignissimos blanditiis placeat suscipit vero officia laboriosam neque eaque libero dolorem qui reiciendis, doloremque quis sequi optio voluptate? Repellat ut soluta, repudiandae recusandae, veniam voluptas obcaecati facere velit eaque maxime fugiat adipisci alias id odit nemo, quos accusantium dolore est.."
        ],
        [
            "title" => "Studio Foto Dua",
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

    public static function all()
    {
        return collect (self::$studio_foto);
    }

    public static function find($slug)
    {
        $studios = static::all();
        // $studio = [];
        // foreach($studios as $item) {
        //     if($item["slug"] === $slug)
        //     {
        //         $studio = $item;
        //     }
        // }

        return $studios->firstWhere('slug', $slug);
    }

}
