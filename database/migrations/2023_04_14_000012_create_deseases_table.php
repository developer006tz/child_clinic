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
        Schema::create('deseases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table
                ->enum('type', [
                    'infectious',
                    'chronic',
                    'mental-illness',
                    'autoimmune',
                    'non-infectious',
                    'other',
                ])
                ->default('non-infectious');
            $table->text('description');

            $table->timestamps();
        });

        DB::table('deseases')->insert([
            ['name' => 'Respiratory Syncytial Virus (RSV)', 'type' => 'infectious', 'description' => 'RSV is a common respiratory virus that can cause severe respiratory tract infections in young children.'],
            ['name' => 'Gastroenteritis', 'type' => 'infectious', 'description' => 'Gastroenteritis is an infection of the digestive system that can cause diarrhea, vomiting, and dehydration in infants and young children.'],
            ['name' => 'Asthma', 'type' => 'chronic', 'description' => 'Asthma is a chronic respiratory condition characterized by inflammation and narrowing of the airways, leading to breathing difficulties.'],
            ['name' => 'Autism Spectrum Disorder (ASD)', 'type' => 'mental-illness', 'description' => 'ASD is a developmental disorder that affects communication, social interaction, and behavior.'],
            ['name' => 'Type 1 Diabetes', 'type' => 'autoimmune', 'description' => 'Type 1 diabetes is an autoimmune disease in which the bodys immune system mistakenly attacks the insulin-producing cells in the pancreas.'],
            ['name' => 'Allergies', 'type' => 'non-infectious', 'description' => 'Allergies occur when the immune system overreacts to certain substances, resulting in allergic reactions such as itching, rashes, or difficulty breathing.'],
            ['name' => 'Cerebral Palsy', 'type' => 'chronic', 'description' => 'Cerebral palsy is a group of disorders that affect movement, muscle tone, and coordination, usually caused by brain damage during early development.'],
            ['name' => 'Down Syndrome', 'type' => 'chronic', 'description' => 'Down syndrome is a genetic disorder caused by the presence of an extra copy of chromosome 21, leading to developmental delays and certain physical characteristics.'],
            ['name' => 'Congenital Heart Defects', 'type' => 'chronic', 'description' => 'Congenital heart defects are structural abnormalities of the heart present at birth, which can affect blood flow and heart function.'],
            ['name' => 'Childhood Cancer', 'type' => 'other', 'description' => 'Childhood cancer refers to various types of cancer that can occur in children, including leukemia, brain tumors, and neuroblastoma.'],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deseases');
    }
};
