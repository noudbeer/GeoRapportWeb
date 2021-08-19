<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();

            $table->foreignId('owner_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('client_id')
                ->constrained('societies')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('order_title')->nullable();
            $table->string('orderNumber')->nullable();

            $table->string('cpd_title')->nullable();
            $table->string('cpdNumber')->nullable();


            $table->boolean('isZone');

            $table->json('points');

            $table->dateTime('beginning')->nullable();

            $table->foreignId('status_id')
                ->constrained('statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->dateTime('end')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
