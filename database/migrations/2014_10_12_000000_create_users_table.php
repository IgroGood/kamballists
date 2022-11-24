<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->unique();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('users')->insert(
            array(
                'phone' => '+7(999)000-13-13',
                'password' => '$2y$10$.M/spn69jS7YfercDzwmdezTaMdbY0w6j1Map6UIxkmqxsNW0WxX.'
            )
        );

        DB::table('users')->insert(
            array(
                'phone' => '+7(999)000-13-14',
                'password' => '$2y$10$.M/spn69jS7YfercDzwmdezTaMdbY0w6j1Map6UIxkmqxsNW0WxX.'
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
        Schema::dropIfExists('users');
    }
}
