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
            [
                'name' => 'William Wilson',
                'dob' => '1985-11-10',
                'phone' => '555-123-4567',
                'address' => '789 Oak Avenue',
                'occupation' => 'Doctor',
                'mother_id' => 3,
            ],
            [
                'name' => 'David Thompson',
                'dob' => '1992-09-29',
                'phone' => '111-222-3333',
                'address' => '321 Pine Street',
                'occupation' => 'Accountant',
                'mother_id' => 4,
            ],
            [
                'name' => 'Joseph Moore',
                'dob' => '1994-05-05',
                'phone' => '444-555-6666',
                'address' => '567 Cedar Road',
                'occupation' => 'Lawyer',
                'mother_id' => 5,
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
