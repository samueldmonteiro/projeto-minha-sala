<?php

namespace Database\Seeders;

use App\Models\ClassInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassInformation::create([
            'course_id' => 1,
            'semester' => 4,
            'room' => 608,
            'block' => 'B',
            'floor' => 2,
            'day' => 'Segunda-feira',
            'teacher_name' => 'Daniel Augusto Da Silva Carneiro',
            'start_time' => '08:00:00',
            'end_time' => '09:40:00',
            'subject' => 'Engenharia de Software'
        ]);

        ClassInformation::create([
            'course_id' => 1,
            'semester' => 4,
            'room' => 422,
            'block' => 'A',
            'floor' => 4,
            'day' => 'Segunda-feira',
            'teacher_name' => 'Jonhatan',
            'start_time' => '10:00:00',
            'end_time' => '11:40:00',
            'subject' => 'Linguagens Formais e automatos'
        ]);

        ClassInformation::create([
            'course_id' => 1,
            'semester' => 4,
            'room' => 413,
            'block' => 'A',
            'floor' => 4,
            'day' => 'Terça-feira',
            'teacher_name' => 'Roberto Pimentel',
            'start_time' => '08:00:00',
            'end_time' => '10:50:00',
            'subject' => 'Redes de Computadores'
        ]);

        ClassInformation::create([
            'course_id' => 1,
            'semester' => 4,
            'room' => 807,
            'block' => 'B',
            'floor' => 4,
            'day' => 'Quarta-feira',
            'teacher_name' => 'Roberto Pimentel',
            'start_time' => '08:00:00',
            'end_time' => '10:50:00',
            'subject' => 'Algorítimo e Estrutura de Dados'
        ]);

        ClassInformation::create([
            'course_id' => 1,
            'semester' => 4,
            'room' => 419,
            'block' => 'A',
            'floor' => 4,
            'day' => 'Quinta-feira',
            'teacher_name' => 'Ivone Ascar',
            'start_time' => '10:00:00',
            'end_time' => '11:40:00',
            'subject' => 'Segurança da Informação e de Redes'
        ]);

        ClassInformation::create([
            'course_id' => 1,
            'semester' => 4,
            'room' => 422,
            'block' => 'A',
            'floor' => 4,
            'day' => 'Sexta-feira',
            'teacher_name' => 'Jonathan Araujo',
            'start_time' => '08:00:00',
            'end_time' => '09:40:00',
            'subject' => 'Sistemas Digitais e Microprocessadores'
        ]);
    }
}
