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
 * Class PrimaryCategory
 *
 * @property int $id
 * @property string $name
 * @property int $order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|SecondaryCategory[] $secondary_categories
 *
 * @package App\Models
 */
final class PrimaryCategory extends Model
{
	use SoftDeletes;
	protected $table = 'primary_categories';

	protected $casts = [
		'order' => 'int'
	];

	protected $fillable = [
		'name',
		'order'
	];

    // -----------------------------------------------------------------------------------------------------------------
    // Relation
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return HasMany<SecondaryCategory>
     */
	public function secondary_categories(): HasMany
	{
		return $this->hasMany(SecondaryCategory::class);
	}
}
