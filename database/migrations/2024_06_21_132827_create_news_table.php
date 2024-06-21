<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string("title",160);
            $table->string("slug",255)->unique();
            $table->text("content");
            $table->string("image",255)->nullable();
            $table->foreignId("category_id")->constrained("categories")->onDelete("cascade");
            $table-foreingId("user_id")->constrained("users")->onDelete("cascade");
            $table->boolean("is_active")->default(true);
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
        Schema::dropIfExists('news');
    }
};
