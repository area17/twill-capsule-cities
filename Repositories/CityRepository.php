<?php

namespace App\Twill\Capsules\Cities\Repositories;

use App\Twill\Capsules\Cities\Models\City;
use App\Twill\Capsules\Base\ModuleRepository;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleTranslations;

class CityRepository extends ModuleRepository
{
    use HandleMedias, HandleTranslations, HandleSlugs, HandleRevisions;

    public function __construct(City $model)
    {
        $this->model = $model;
    }

    public function getFormFields($object): array
    {
        $fields = parent::getFormFields($object);

        $fields = $this->getManyToOneBrowserField(
            $object,
            $fields,
            'country_id',
            'countries',
            'country',
            'destinations',
        );

        return $this->getManyToManyBrowserField($object, $fields, 'restaurants', 'destinations');
    }

    public function afterSave($object, $fields)
    {
        $this->afterSaveUpdateManyToOneBrowser($object, $fields, 'country_id');

        parent::afterSave($object, $fields);
    }
}
