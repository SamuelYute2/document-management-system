<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->longText('index');
            $table->string('url')->nullable();
            $table->string('path')->nullable();
            $table->enum('type', [1,2,3,4,5,6]);

            $table->unsignedBigInteger('employee_id');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });

        Schema::create('department_document', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('document_id');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
        });

        Schema::create('document_version', function (Blueprint $table) {
            $table->unsignedBigInteger('original_document_id');
            $table->unsignedBigInteger('new_document_id');
            $table->timestamps();

            $table->foreign('original_document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('new_document_id')->references('id')->on('documents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_version');
        Schema::dropIfExists('department_document');
        Schema::dropIfExists('documents');
    }
}
