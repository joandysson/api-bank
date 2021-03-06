<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransactionsTable extends Migration
{
    private $table = 'transactions';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->table)) return;

        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->double('value')->default(0);
            $table->unsignedBigInteger('account_to')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');;
            $table->foreign('account_to')->references('id')->on('accounts')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
