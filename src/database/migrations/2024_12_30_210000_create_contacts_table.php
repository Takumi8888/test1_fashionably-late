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
        Schema::create('contacts', function (Blueprint $table)
        {
            $table->id();
            $table->string('first_name')->comment('姓');
            $table->string('last_name')->comment('名');
            $table->tinyInteger('gender')->unsigned()->comment('性別 1:男性、2:女性、3:その他');
            $table->string('email')->constrained()->cascadeOnDelete()->comment('メールアドレス');
            $table->string('tel')->comment('電話番号');
            $table->string('address')->comment('住所');
            $table->string('building')->nullable()->comment('建物名');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete()->comment('お問い合わせの種類');
            $table->text('detail')->comment('お問い合わせの内容');
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
