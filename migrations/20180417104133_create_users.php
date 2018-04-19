<?php

use Illuminate\Database\Schema\Blueprint;
use \App\System\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        $this->schema->create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('login', 32);
            $table->string('password');
            $table->timestamps();
            $table->index('login');
        });
    }

    public function down()
    {
        $this->schema->drop('users');
    }
}
