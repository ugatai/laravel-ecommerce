<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cart
 *
 * @property int $id
 * @property int $customer_id
 * @property int $product_id
 * @property int $amount
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Customer $customer
 * @property Product $product
 *
 * @package App\Models
 */
final class Cart extends Model
{
	use SoftDeletes;
	protected $table = 'carts';

	protected $casts = [
		'customer_id' => 'int',
		'product_id' => 'int',
		'amount' => 'int'
	];

	protected $fillable = [
		'customer_id',
		'product_id',
		'amount'
	];

    // -----------------------------------------------------------------------------------------------------------------
    // Relation
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return BelongsTo<Customer, Cart>
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return BelongsTo<Product, Cart>
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
