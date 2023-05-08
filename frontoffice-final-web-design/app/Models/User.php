<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $user_id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property int $role
 * 
 * @property RoleUser $role_user
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'user_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'role' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'first_name',
		'last_name',
		'password',
		'role'
	];

	public function role_user()
	{
		return $this->belongsTo(RoleUser::class, 'role');
	}

	public function articles()
	{
		return $this->hasMany(Article::class, 'author');
	}
}
