<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('issue_name');
        });

        DB::table('issues')->insert(
            array(
                'issue_name' => 'Нет терминала',
            )
        );

        DB::table('issues')->insert(
            array(
                'issue_name' => 'Терминал есть, но попросили оплатить переводом или наличными',
            )
        );

        DB::table('issues')->insert(
            array(
                'issue_name' => 'Терминал не работает',
            )
        );

        DB::table('issues')->insert(
            array(
                'issue_name' => 'Терминал работает',
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
        Schema::dropIfExists('issues');
    }
}
