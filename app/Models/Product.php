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
 * Class Product
 *
 * @property int $id
 * @property int $shop_id
 * @property int $secondary_category_id
 * @property int|null $image_1
 * @property int|null $image_2
 * @property int|null $image_3
 * @property int|null $image_4
 * @property string $name
 * @property int $price
 * @property string|null $information
 * @property int $status
 * @property int $order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Image|null $image1
 * @property Image|null $image2
 * @property Image|null $image3
 * @property Image|null $image4
 * @property SecondaryCategory $secondaryCategory
 * @property Shop $shop
 * @property Collection|Cart[] $carts
 * @property Collection|Stock[] $stocks
 *
 * @package App\Models
 */
final class Product extends Model
{
	use SoftDeletes;
	protected $table = 'products';

	protected $casts = [
		'shop_id' => 'int',
		'secondary_category_id' => 'int',
		'image_1' => 'int',
		'image_2' => 'int',
		'image_3' => 'int',
		'image_4' => 'int',
		'price' => 'int',
		'status' => 'int',
		'order' => 'int'
	];

	protected $fillable = [
		'shop_id',
		'secondary_category_id',
		'image_1',
		'image_2',
		'image_3',
		'image_4',
		'name',
		'price',
		'information',
		'status',
		'order'
	];

    // -----------------------------------------------------------------------------------------------------------------
    // Relation
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return BelongsTo<Image, Product>
     */
	public function image1(): BelongsTo
	{
		return $this->belongsTo(Image::class, 'image_1');
	}

    /**
     * @return BelongsTo<Image, Product>
     */
    public function image2(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_2');
    }

    /**
     * @return BelongsTo<Image, Product>
     */
    public function image3(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_3');
    }

    /**
     * @return BelongsTo<Image, Product>
     */
    public function image4(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_4');
    }

    /**
     * @return BelongsTo<SecondaryCategory, Product>
     */
	public function secondaryCategory(): BelongsTo
	{
		return $this->belongsTo(SecondaryCategory::class);
	}

    /**
     * @return BelongsTo<Shop, Product>
     */
	public function shop(): BelongsTo
	{
		return $this->belongsTo(Shop::class);
	}

    /**
     * @return HasMany<Cart>
     */
	public function carts(): HasMany
	{
		return $this->hasMany(Cart::class);
	}

    /**
     * @return HasMany<Stock>
     */
	public function stocks(): HasMany
	{
		return $this->hasMany(Stock::class);
	}
}
