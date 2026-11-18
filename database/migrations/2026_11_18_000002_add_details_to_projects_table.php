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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('title');
            $table->text('problem')->nullable()->after('description');
            $table->text('goal')->nullable()->after('problem');
            $table->string('role')->nullable()->after('goal');
            $table->json('features')->nullable()->after('role');
            $table->string('github_url')->nullable()->after('link');
            $table->longText('documentation')->nullable()->after('github_url');
            $table->string('category')->nullable()->after('documentation');
            $table->boolean('is_featured')->default(false)->after('category');
            $table->integer('sort_order')->default(0)->after('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'slug',
                'problem',
                'goal',
                'role',
                'features',
                'github_url',
                'documentation',
                'category',
                'is_featured',
                'sort_order',
            ]);
        });
    }
};
