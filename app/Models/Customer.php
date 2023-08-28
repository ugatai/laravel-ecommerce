<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property int $status
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|Cart[] $carts
 *
 * @package App\Models
 */
final class Customer extends Model
{
	use SoftDeletes;
	protected $table = 'customers';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'status' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'status',
		'remember_token'
	];

    // -----------------------------------------------------------------------------------------------------------------
    // Relation
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return HasMany<Cart>
     */
	public function carts(): HasMany
	{
		return $this->hasMany(Cart::class);
	}
}
