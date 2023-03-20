<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Roles;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string("rolename");

            $table->timestamps();
        });
        Roles::create(['rolename' => 'Admin']); //required index 1
        Roles::create(['rolename' => 'Litere']);
        Roles::create(['rolename' => 'SREM']);
        Roles::create(['rolename' => 'SEPA']);
        Roles::create(['rolename' => 'Drept']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
