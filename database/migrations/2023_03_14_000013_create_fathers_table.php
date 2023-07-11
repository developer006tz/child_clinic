<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fathers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('dob');
            $table->string('phone');
            $table->string('address');
            $table->string('occupation');
            $table->unsignedBigInteger('mother_id');

            $table->timestamps();
        });

        DB::table('fathers')->insert([
            [
                'name' => 'James Johnson',
                'dob' => '1988-03-15',
                'phone' => '123-456-7890',
                'address' => '123 Main Street',
                'occupation' => 'Engineer',
                'mother_id' => 1,
            ],
            [
                'name' => 'Michael Davis',
                'dob' => '1990-06-22',
                'phone' => '987-654-3210',
                'address' => '456 Elm Street',
                'occupation' => 'Teacher',
                'mother_id' => 2,
            ],
            
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fathers');
    }
};
