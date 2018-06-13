<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCommentColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('comments', function(Blueprint $table) {
            $table->renameColumn('comment', 'commentBody');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('comments', function(Blueprint $table) {
            $table->renameColumn('commentBody', 'comment');
        });
    }
}
