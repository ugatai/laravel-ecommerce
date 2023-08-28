<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Shop
 *
 * @property int $id
 * @property int $owner_id
 * @property string $name
 * @property string $information
 * @property string $file_path
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Owner $owner
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
final class Shop extends Model
{
	use SoftDeletes;
	protected $table = 'shops';

	protected $casts = [
		'owner_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'owner_id',
		'name',
		'information',
		'file_path',
		'status'
	];

    // -----------------------------------------------------------------------------------------------------------------
    // Relation
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return BelongsTo<Owner, Shop>
     */
	public function owner(): BelongsTo
	{
		return $this->belongsTo(Owner::class);
	}

    /**
     * @return HasMany<Product>
     */
	public function products(): HasMany
	{
		return $this->hasMany(Product::class);
	}
}
