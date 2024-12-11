<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyOrganizerIdInEventsTable extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('organizer_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('organizer_id')->nullable(false)->change();
        });
    }
};
