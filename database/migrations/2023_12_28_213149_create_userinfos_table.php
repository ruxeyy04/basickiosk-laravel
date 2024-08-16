<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('userinfos', function (Blueprint $table) {
            $table->increments('userid');
            $table->string('username', 50);
            $table->string('password', 255);
            $table->string('usertype', 15)->default('Cashier');
            $table->timestamps();
        });

        // Insert initial data
        DB::table('userinfos')->insert([
            ['username' => 'incharge', 'password' => '$2y$12$0Bk2aTZtfZ9ecweHJLW9L.bU/dAMll8EMFwvutQNu4nID2qSZguqm', 'usertype' => 'In-charge'],
            ['username' => 'cashier', 'password' => '$2y$12$0Bk2aTZtfZ9ecweHJLW9L.bU/dAMll8EMFwvutQNu4nID2qSZguqm', 'usertype' => 'Cashier'],
            ['username' => 'admin', 'password' => '$2y$12$0Bk2aTZtfZ9ecweHJLW9L.bU/dAMll8EMFwvutQNu4nID2qSZguqm', 'usertype' => 'Admin'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('userinfos');
    }
};
