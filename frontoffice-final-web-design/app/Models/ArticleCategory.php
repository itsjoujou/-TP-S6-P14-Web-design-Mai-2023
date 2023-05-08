<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticleCategory
 * 
 * @property int $article_category_id
 * @property string $category_label
 * 
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class ArticleCategory extends Model
{
	protected $table = 'article_category';
	protected $primaryKey = 'article_category_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'article_category_id' => 'int'
	];

	protected $fillable = [
		'category_label'
	];

	public function articles()
	{
		return $this->hasMany(Article::class, 'category');
	}
}
