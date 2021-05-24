@extends('twill::layouts.form')

@section('contentFields')
    @formField('browser', [
        'routePrefix' => 'destinations',
        'moduleName' => 'countries',
        'name' => 'country_id',
        'label' => __('Country'),
        'max' => 1,
    ])

    @component('twill::partials.form.utils._columns')
        @slot('left')
            @formField('input', [
                'name' => 'latitude',
                'label' => 'Latitude',
                'translated' => false,
            ])
        @endslot

        @slot('right')
            @formField('input', [
                'name' => 'longitude',
                'label' => 'Longitude',
                'translated' => false,
            ])
        @endslot
    @endcomponent
@stop

@section('fieldsets')
    @if(config('twill.capsule.cities.seo.enabled'))
        <a17-fieldset title="{{__('SEO')}}" id="seo" :open="false">
            @formField('input', [
                'name' => 'seo_title',
                'label' => 'SEO title',
                'translated' => false,
            ])

            @formField('input', [
                'name' => 'seo_description',
                'label' => 'SEO description',
                'translated' => false,
            ])
        <a17-fieldset title="{{__('Cities')}}" id="cities" :open="true">
    @endif
@stop
