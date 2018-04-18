<?php
$namespaceDefinition
use Illuminate\Database\Schema\Blueprint;
use $useClassName;

class $className extends $baseClassName
{
    public function up()
    {
        /**
         * https://laravel.com/docs/5.5/migrations#creating-tables
         */

        /**
        $this->schema->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login', 32);
            $table->string('password');
            $table->timestamps();
            $table->index('login');
        });
        */
    }

    public function down()
    {
        /**
        $this->schema->drop('users');
        */
    }
}
