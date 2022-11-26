<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            $table->string('organisation_name');
            $table->string('address');
            $table->string('description')->nullable();
            $table->bigInteger('status')->nullable();
            $table->float('latitude');
            $table->float('longitude');
            $table->timestamps();
        });

        DB::table('organisations')->insert(
            array(
                'organisation_name' => 'Носки и шорты',
                'address' => 'Ленина 1, Этаж 5',
                'description' => 'описание 1...',
                'latitude' => 62.034741,
                'longitude' => 129.729014,
                'status' => 1
            )
        );

        DB::table('organisations')->insert(
            array(
                'organisation_name' => 'Рога и Копыта',
                'address' => 'Березка 1, Этаж 2',
                'description' => 'описание 2...',
                'latitude' => 62.010546,
                'longitude' => 129.710280,
                'status' => 2
            )
        );

        DB::table('organisations')->insert(
            array(
                'organisation_name' => 'Магазин Снуби-биг',
                'address' => 'Кошкина 12, Этаж 1',
                'description' => 'описание 3...',
                'latitude' => 62.040608,
                'longitude' => 129.750592,
                'status' => 4
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisations');
    }
}
