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
 * Class Image
 *
 * @property int $id
 * @property int $owner_id
 * @property string|null $title
 * @property string $file_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Owner $owner
 *
 * @package App\Models
 */
final class Image extends Model
{
	use SoftDeletes;
	protected $table = 'images';

	protected $casts = [
		'owner_id' => 'int'
	];

	protected $fillable = [
		'owner_id',
		'title',
		'file_path'
	];

    // -----------------------------------------------------------------------------------------------------------------
    // Relation
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return BelongsTo<Owner, Image>
     */
	public function owner(): BelongsTo
	{
		return $this->belongsTo(Owner::class);
	}
}
