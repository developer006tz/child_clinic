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
        Schema::create('mothers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clinic_id')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('blood_type_id');
            $table->date('dob');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table
                ->enum('insurance_info', ['No', 'Yes'])
                ->default('No')
                ->nullable();
            $table->string('occupation')->nullable();

            $table->timestamps();
        });

        DB::table('mothers')->insert([
            [
                'clinic_id' => 'CL1234',
                'name' => 'Emma Johnson',
                'blood_type_id' => 1,
                'dob' => '1990-05-15',
                'phone' => '123-456-7890',
                'address' => '123 Main Street',
                'insurance_info' => 'Yes',
                'occupation' => 'Teacher',
            ],
            [
                'clinic_id' => 'CL5678',
                'name' => 'Olivia Davis',
                'blood_type_id' => 2,
                'dob' => '1992-09-22',
                'phone' => '987-654-3210',
                'address' => '456 Elm Street',
                'insurance_info' => 'Yes',
                'occupation' => 'Doctor',
            ],
            [
                'clinic_id' => 'CL9012',
                'name' => 'Sophia Wilson',
                'blood_type_id' => 1,
                'dob' => '1988-07-10',
                'phone' => '555-123-4567',
                'address' => '789 Oak Avenue',
                'insurance_info' => 'No',
                'occupation' => 'Engineer',
            ],
            [
                'clinic_id' => null,
                'name' => 'Ava Thompson',
                'blood_type_id' => 2,
                'dob' => '1995-03-29',
                'phone' => '111-222-3333',
                'address' => '321 Pine Street',
                'insurance_info' => 'No',
                'occupation' => 'Accountant',
            ],
            [
                'clinic_id' => 'CL3456',
                'name' => 'Isabella Moore',
                'blood_type_id' => 1,
                'dob' => '1991-12-05',
                'phone' => '444-555-6666',
                'address' => '567 Cedar Road',
                'insurance_info' => 'Yes',
                'occupation' => 'Lawyer',
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mothers');
    }
};
