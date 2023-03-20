<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\APIKeys;

class CreateAPIKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_p_i_keys', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("key");
            $table->string("cx");
            $table->integer("currentrequest")->default(0);
            $table->timestamps();
        });
        $p1 = [
            "name" => "Project1",
            "key" => "AIzaSyAYyY_LPHM9sFSeS3RzcsRW1jUR7r7hSe4",
            "cx" => "44a8f175a44bc4701",
        ];
        //APIKeys::create($p1);

        $p2 = [
            "name" => "Project2",
            "key" => "AIzaSyD0nAht_ksnxYTyzjEubEKzRAjJ_cG5w_g",
            "cx" => "1179cbf4f0c6e45da",
        ];
        //APIKeys::create($p2);

        $p3 = [
            "name" => "Project3",
            "key" => "AIzaSyAWIeMvQpD-E7KUnCEyt9JfNQF5RcYM2pU",
            "cx" => "24f247e4dcb3444e6",
        ];
        APIKeys::create($p3);

        //Project 4

        $p5 = [
            "name" => "Project5",
            "key" => "AIzaSyDS9nPLcDKeX_9HOOYtzasknM11tRBj000",
            "cx" => "d0b3076b784044382",
        ];
        APIKeys::create($p5);

        $p6 = [
            "name" => "Project6",
            "key" => "AIzaSyAPXDsrAf4cwbS5pzGVgKNaYjKrBUuNksw",
            "cx" => "51f3cca3271f94f54",
        ];
        APIKeys::create($p6);

        $p7 = [
            "name" => "Project7",
            "key" => "AIzaSyAWZd1k9p5rrVY6YX8B8Ls10ie89EoQWrk",
            "cx" => "57906135fb0eb4bf6",
        ];
        APIKeys::create($p7);

        $p8 = [
            "name" => "Project8",
            "key" => "AIzaSyB-pSH87Inmw-xTi03AQo_bWO9GZBl5Fys",
            "cx" => "0317cd6050cbc4084",
        ];
        APIKeys::create($p8);

        $p9 = [
            "name" => "Project9",
            "key" => "AIzaSyA7Qg265mDQrlt3tkNlNXOQyaSrume4-jw",
            "cx" => "14c9580c7e5074930",
        ];
        APIKeys::create($p9);

        $p10 = [
            "name" => "Project10",
            "key" => "AIzaSyC94ckNQT6amczADFZWPXChz-qVkrexnQM",
            "cx" => "33e955410c5c34393",
        ];
        APIKeys::create($p10);

        $p11 = [
            "name" => "Project11",
            "key" => "AIzaSyB1WC8Dfus-pRJLqbOi0x7OuB21UXMVNXI",
            "cx" => "c3558a81ff94d4ad1",
        ];
        APIKeys::create($p11);

        $p12 = [
            "name" => "Project12",
            "key" => "AIzaSyB7wXFC0d6DTMG6wY5N3Qt8bC-2OpSYw1A",
            "cx" => "a143befd71da44faf",
        ];
        APIKeys::create($p12);

        $p13 = [
            "name" => "Project13",
            "key" => "AIzaSyDCZUdr3ahRFX64Oniyyp4ZaV7FkMc11oQ",
            "cx" => "d3579c33263364df5",
        ];
        APIKeys::create($p13);

        $p14 = [
            "name" => "Project14",
            "key" => "AIzaSyCimY1hCl9SWTodJ3raRkCCmTucX9P4li0",
            "cx" => "45c7b4848cbe14331",
        ];
        APIKeys::create($p14);

        $p15 = [
            "name" => "Project15",
            "key" => "AIzaSyBkntrgU0Y981kUkoWG0sBWhiG1qtU-TNc",
            "cx" => "1119e0ac6f48d4864",
        ];
        APIKeys::create($p15);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_p_i_keys');
    }
}
