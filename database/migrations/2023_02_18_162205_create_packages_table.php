<?php

use App\Models\Package;
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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('price');
            $table->bigInteger('stock')->default(100);
            $table->bigInteger('static_stock')->default(100);
            $table->bigInteger('hours')->default(0);
            $table->decimal('total_profit', 20, 2);
            $table->timestamps();
        });
        //gratis
        $data = [
            [
                'price' => 0,
                'hours' => 1000,
                'total_profit' => 10000
            ],
            [
                'price' => 10,
                'hours' => 1000,
                'total_profit' => 100000
            ],
            [
                'price' => 100,
                'hours' => 10000,
                'total_profit' => 1000000
            ],
            [
                'price' => 500,
                'hours' => 500000,
                'total_profit' => 50000000
            ],
            [
                'price' => 1000,
                'hours' => 100000,
                'total_profit' => 10000000
            ],
            [
                'price' => 10000,
                'hours' => 1000000,
                'total_profit' => 100000000
            ],
        ];
        foreach ($data as $key => $value) {
            Package::create($value);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
