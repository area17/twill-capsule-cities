<?php

namespace App\Twill\Capsules\Cities\Models;

use App\Twill\Capsules\Base\Model;
use A17\Twill\Models\Behaviors\HasSlug;
use App\Twill\Capsules\Base\Scopes\OrderByPosition;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasTranslation;
use App\Twill\Capsules\Countries\Models\Country;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasTranslation, HasSlug, HasRevisions, HasPosition;

    protected $fillable = ['published', 'country_id'];

    public $translatedAttributes = ['name', 'active'];

    public $slugAttributes = ['name'];

    public string $titleColumnKey = 'name';

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function getCountryNameAttribute(): ?string
    {
        return $this->country->name ?? '--';
    }

    public function getLinkAttribute(): string
    {
        return route('front.city.show', [
            'country' => $this->country->slug,
            'city' => $this->slug,
        ]);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new OrderByPosition());

        parent::booted();
    }
}
