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
        Schema::table('cours', function (Blueprint $table) {
            $table->integer('semestre')->default(1)->after('description');
            $table->integer('credits')->default(0)->after('semestre');
            $table->integer('volume_horaire')->default(0)->after('credits');
            $table->foreignId('filiere_id')->nullable()->constrained('filieres')->onDelete('set null')->after('niveau_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cours', function (Blueprint $table) {
            $table->dropForeign(['filiere_id']);
            $table->dropColumn(['semestre', 'credits', 'volume_horaire', 'filiere_id']);
        });
    }
};
