<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use \Spatie\YamlFrontMatter\YamlFrontMatter;

class Post2
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;


    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        return collect(File::files(resource_path("posts")))
            ->map(function ($files) {
                return YamlFrontMatter::parseFile($files);
            })
            ->map(function ($documents) {
                return new Post2(
                    $documents->title,
                    $documents->excerpt,
                    $documents->date,
                    $documents->body(),
                    $documents->slug );
            }
            )
            ->sortByDesc('date');
    }
    public static function find($slug)
    {
        $path = resource_path("posts/{$slug}.html");//resource_path - give a path of resources

        if (!file_exists($path)){
            //abort(404);
            throw new ModelNotFoundException();
        }
        return cache()->remember("posts.{$slug}", now()->addMinutes(2), function () use ($slug) {
            //var_dump('file_get_contents');
            return static::all()->firstWhere('slug', $slug);
        });
    }
}
