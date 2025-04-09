




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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poll_option_id')->constrained()->onDelete('cascade');
            $table->string('voter_hash');
            $table->timestamps();
            
            $table->unique(['poll_option_id', 'voter_hash']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};

