<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Article
 * 
 * @property int $article_id
 * @property string $title
 * @property int $category
 * @property string $picture
 * @property string $content
 * @property string $summary
 * @property int $author
 * @property Carbon $udpated_on
 * 
 * @property ArticleCategory $article_category
 * @property User $user
 *
 * @package App\Models
 */
class Article extends Model
{
	protected $table = 'articles';
	protected $primaryKey = 'article_id';
	public $timestamps = false;

	protected $casts = [
		'category' => 'int',
		'author' => 'int',
		'udpated_on' => 'datetime'
	];

	protected $fillable = [
		'title',
		'category',
		'picture',
		'content',
		'summary',
		'author',
		'udpated_on'
	];

	public function article_category()
	{
		return $this->belongsTo(ArticleCategory::class, 'category');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'author');
	}

	public function slugify()
	{
		return Str::slug($this->article_id." ".$this->title, "-");
	}
}
