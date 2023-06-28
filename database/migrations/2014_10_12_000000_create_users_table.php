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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->unsignedBigInteger('clinic_id')->nullable();
            $table->string('user_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token', 100)->nullable();

            $table->timestamps();
        });

        DB::table('users')->insert([
            [

                'id'=> 2,
                'name' => 'Emma Johnson',
                'email' => 'emma.johnson@gmail.com',
                'phone' => '123-456-7890',
                'clinic_id' => 1,
                'password' => Hash::make('parent'),
            ],
            [
                'id'=> 3,
                'name' => 'Olivia Davis',
                'email' => 'olivia.davis@gmail.com',
                'phone' => '123-456-0000',
                'clinic_id' => 1,
                'password' => Hash::make('parent'),
            ],
            [
                'id'=> 4,
                'name' => 'Sophia Wilson',
                'email' => 'sophia.wilson@gmail.com',
                'phone' => '123-456-999',
                'clinic_id' => 1,
                'password' => Hash::make('parent'),
            ],
            [

                'id'=> 5,
                'name' => 'Ava Thompson',
                'email' => 'ava.thompson@gmail.com',
                'phone' => '111-222-3333',
                'clinic_id' => 1,
                'password' => Hash::make('parent'),
            ],
            [
                'id' => 6,
                'name' => 'Isabella Moore',
                'email' => 'isabella.moore@gmail.com',
                'phone' => '444-555-6666',
                'clinic_id' => 1,
                'password' => Hash::make('parent'),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
