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
            $table->unsignedBigInteger('clinic_id');
            $table->string('name');
            $table->unsignedBigInteger('blood_type_id');
            $table->unsignedBigInteger('user_id');
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
                'clinic_id' => 1,
                'name' => 'Emma Johnson',
                'user_id' => 2,
                'blood_type_id' => 1,
                'dob' => '1990-05-15',
                'phone' => '255746828843',
                'address' => '123 Main Street',
                'insurance_info' => 'Yes',
                'occupation' => 'Teacher',
            ],
            [
                'clinic_id' => 1,
                'name' => 'Olivia Davis',
                'user_id' => 3,
                'blood_type_id' => 2,
                'dob' => '1992-09-22',
                'phone' => '255621097541',
                'address' => '456 Elm Street',
                'insurance_info' => 'Yes',
                'occupation' => 'Doctor',
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
