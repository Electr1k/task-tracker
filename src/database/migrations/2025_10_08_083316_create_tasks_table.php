<?php

use App\Enums\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    private const string TABLE_NAME = 'tasks';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->comment('Задачи');

            $table->id()->comment('Идентификатор');

            $table->string('title', 1024)
                ->comment('Название');

            $table->text('description')
                ->nullable()
                ->comment('Описание');

            $table->enum('status', Status::values())
                ->default(Status::WAITING)
                ->comment('Статус');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
