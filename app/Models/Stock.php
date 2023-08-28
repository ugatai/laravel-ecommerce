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
 * Class Stock
 *
 * @property int $id
 * @property int $product_id
 * @property int $amount
 * @property int $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Product $product
 *
 * @package App\Models
 */
final class Stock extends Model
{
    use SoftDeletes;

    protected $table = 'stocks';

    protected $casts = [
        'product_id' => 'int',
        'amount' => 'int',
        'type' => 'int'
    ];

    protected $fillable = [
        'product_id',
        'amount',
        'type'
    ];

    // -----------------------------------------------------------------------------------------------------------------
    // Relation
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return BelongsTo<Product, Stock>
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
