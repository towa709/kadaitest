<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::table('contacts', function (Blueprint $table) {
      $table->dropColumn('content'); // ← これで削除！
    });
  }

  public function down(): void
  {
    Schema::table('contacts', function (Blueprint $table) {
      $table->text('content')->nullable(); // ← 必要なら復元もOK
    });
  }
};
