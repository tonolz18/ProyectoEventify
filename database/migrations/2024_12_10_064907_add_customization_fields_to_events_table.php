<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('banner_image')->nullable()->after('logo'); // Imagen del banner
            $table->text('additional_details')->nullable()->after('description'); // Descripción adicional o detalles
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['banner_image', 'additional_details']);
        });
    }
};

