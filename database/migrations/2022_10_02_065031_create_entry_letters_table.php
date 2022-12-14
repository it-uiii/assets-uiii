<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntryLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_letters', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->string('subject');
            $table->date('date_in');
            $table->string('sender');
            $table->text('file');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0: Draft, 1: Acc KTU Sekretaris, 2: Acc Rektor');
            $table->boolean('revision')->nullable();
            $table->text('revision_description')->nullable();
            $table->foreignId('created_by')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('entry_letters');
    }
}
