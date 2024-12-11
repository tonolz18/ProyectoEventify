<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('event_attendees', function (Blueprint $table) {
            $table->boolean('validated')->default(false)->after('quantity');
        });
    }

    public function down()
    {
        Schema::table('event_attendees', function (Blueprint $table) {
            $table->dropColumn('validated');
        });
    }
};
