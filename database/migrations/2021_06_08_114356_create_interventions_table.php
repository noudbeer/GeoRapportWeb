<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();

            // id reattachment site 
            $table->foreignId('site_id')
                ->constrained('sites')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->json('location');
            
            // date of the intervention 
            $table->datetime('datetimeOfIntervention');

            // id of user who created the intervention
            $table->foreignId('owner_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->ondDelete('cascade');

            // name of the contributors on the intervention 
            $table->text('teamMembers');

            // id of group of interventions 
            $table->foreignId('interventionsGroup_id')
                ->nullable()
                ->constrained('interventionsGroup')
                ->onUpdate('cascade')
                ->ondDelete('cascade');

            // id intervention type
            $table->foreignId('type_id')
                ->constrained('interventionsType')
                ->onUpdate('cascade')
                ->ondDelete('cascade');
            
            $table->integer('quantity');
            $table->string('unit');
            $table->text('comment');
            
            // time passed on the intervention
            $table->integer('timeSpent');
            
            $table->foreignId('unitOfTime_id')
                ->constrained('unitOfTime')
                ->onUpdate('cascade')
                ->ondDelete('cascade');

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
        Schema::dropIfExists('interventions');
    }
}
