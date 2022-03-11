<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePslsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agent_id')->unsigned()->nullable();
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
            $table->string('new_on_board',250)->nullable();
            $table->string('sector',250)->nullable();
            $table->string('company',100)->nullable();
            $table->string('percentage',6)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('psls');
    }
}
