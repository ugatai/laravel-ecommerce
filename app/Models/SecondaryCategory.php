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
 * Class SecondaryCategory
 *
 * @property int $id
 * @property int $primary_category_id
 * @property string $name
 * @property int $order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property PrimaryCategory $primaryCategory
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
final class SecondaryCategory extends Model
{
	use SoftDeletes;
	protected $table = 'secondary_categories';

	protected $casts = [
		'primary_category_id' => 'int',
		'order' => 'int'
	];

	protected $fillable = [
		'primary_category_id',
		'name',
		'order'
	];

    // -----------------------------------------------------------------------------------------------------------------
    // Relation
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return BelongsTo<PrimaryCategory, SecondaryCategory>
     */
	public function primaryCategory(): BelongsTo
	{
		return $this->belongsTo(PrimaryCategory::class);
	}

    /**
     * @return HasMany<Product>
     */
	public function products(): HasMany
	{
		return $this->hasMany(Product::class);
	}
}
