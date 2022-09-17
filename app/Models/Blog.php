<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function slug()
    {
//        echo 'aaaa';die();
        return $this->id;
    }

    public static function find($id)
    {
//        echo '<pre>'.print_r($id,1);die();
        $posts = Blog::all();
        foreach ($posts as $post) {
            if($post->id == $id) {
//                echo '<pre>'.print_r($post,1);die();
                return $post;
            }
        }
    }
}
