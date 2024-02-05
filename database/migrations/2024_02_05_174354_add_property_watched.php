<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Psy\Shell;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       if(!Schema::hasColumn('episodes','watched')){
            Schema::table('episodes', function(Blueprint $table){
                $table->boolean('watched')->default(false);
            });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(Schema::hasColumn('episodes','watched')){
            Schema::table('episodes', function (Blueprint $table){
                $table->dropColumn('watched');
            });
        }
    }
};
