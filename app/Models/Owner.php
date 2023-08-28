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
 * Class Owner
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|Image[] $images
 * @property Collection|Shop[] $shops
 *
 * @package App\Models
 */
final class Owner extends Model
{
	use SoftDeletes;
	protected $table = 'owners';

	protected $casts = [
		'email_verified_at' => 'datetime'
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
		'remember_token'
	];

    // -----------------------------------------------------------------------------------------------------------------
    // Relation
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return HasMany<Image>
     */
	public function images(): HasMany
	{
		return $this->hasMany(Image::class);
	}

    /**
     * @return HasMany<Shop>
     */
	public function shops(): HasMany
	{
		return $this->hasMany(Shop::class);
	}
}
