<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

	protected $with = ['category', 'author'];

    protected $guarded = [];
    //protected $guarded = ['id'];                          //for colluns you don't want changed
    //protected $fillable = ['title', 'body', 'excerpt'];   //for colluns you want to changed

	public function scopeFilter($querry, array $filters) //call Post::newquerry()->filter()
	{
		$querry->when($filters['search'] ?? false, function($querry, $search) // == resquest('search') // ?? = no null
		{
			$querry->where(function($querry) use ($search)
			{
				$querry
						->where('title', 'like', '%' . $search . '%')
						->orWhere('body', 'like', '%' . $search . '%');
			});
		});

		$querry->when($filters['category'] ?? false, function($querry, $category) // == resquest('search') // ?? = no null
		{
			$querry
				->whereHas('category',
 					function ($querry) use ($category)
					{
						$querry
						       ->where('categories.slug', $category);
					});
		});

		$querry->when($filters['author'] ?? false, function($querry, $author) // == resquest('search') // ?? = no null
		{
			$querry
				->whereHas('author',
					function ($querry) use ($author)
					{
						$querry
							->where('username', $author);
					});
		});
	}


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

	public function author()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
