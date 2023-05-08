<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleUser
 * 
 * @property int $role_id
 * @property string $role_label
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class RoleUser extends Model
{
	protected $table = 'role_user';
	protected $primaryKey = 'role_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'role_id' => 'int'
	];

	protected $fillable = [
		'role_label'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'role');
	}
}
