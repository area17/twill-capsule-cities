<?php

use App\Twill\Capsules\Base\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateCitiesTables extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            createDefaultTableFields($table);

            $table
                ->integer('position')
                ->unsigned()
                ->nullable();

            $table->integer('country_id')->nullable();

            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
        });

        Schema::create('city_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'city');

            $table->string('name', 200)->nullable();

            $this->createSeoFields($table);
        });

        Schema::create('city_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'city');
        });

        Schema::create('city_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'city');
        });
    }

    public function down()
    {
        Schema::dropIfExists('city_revisions');
        Schema::dropIfExists('city_translations');
        Schema::dropIfExists('city_slugs');
        Schema::dropIfExists('cities');
    }
}
