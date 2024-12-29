<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('role_user', function (Blueprint $table) {
            //authorizable id is the id of the user
            //autherizable_type is the type of the user (user, admin)
            $table->morphs('authorizable');
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();
            $table->primary(['authorizable_id','authorizable_type','role_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
