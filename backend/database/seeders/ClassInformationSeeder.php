<?php

namespace Database\Seeders;

use App\Repositories\ClassInformationRepository;
use Illuminate\Database\Seeder;

class ClassInformationSeeder extends Seeder
{
    public function run(): void
    {
        $classInformationRepository = app(ClassInformationRepository::class);

        $classInformationRepository->create([
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

        $classInformationRepository->create([
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

        $classInformationRepository->create([
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

        $classInformationRepository->create([
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

        $classInformationRepository->create([
            'course_id' => 1,
            'semester' => 4,
            'room' => 712,
            'block' => 'A',
            'floor' => 4,
            'day' => 'Quinta-feira',
            'teacher_name' => 'Ivone Ascar',
            'start_time' => '10:00:00',
            'end_time' => '11:40:00',
            'subject' => 'Segurança da Informação e de Redes'
        ]);

        $classInformationRepository->create([
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

        //enfermagem

        $classInformationRepository->create([
            'course_id' => 2,
            'semester' => 2,
            'room' => 606,
            'block' => 'B',
            'floor' => 2,
            'day' => 'Terça-feira',
            'teacher_name' => 'Fernanda Oliveira Sousa',
            'start_time' => '08:00:00',
            'end_time' => '10:50:00',
            'subject' => 'Introdução à Biologia Celular e Desenvolvimento'
        ]);

        $classInformationRepository->create([
            'course_id' => 2,
            'semester' => 2,
            'room' => 812,
            'block' => 'B',
            'floor' => 4,
            'day' => 'Quarta-feira',
            'teacher_name' => 'Andressa Almeida Santana Dias',
            'start_time' => '08:00:00',
            'end_time' => '10:50:00',
            'subject' => 'Cien. Morfofuncionais dos Sistemas Imune e Hematologico'
        ]);

        $classInformationRepository->create([
            'course_id' => 2,
            'semester' => 2,
            'room' => 805,
            'block' => 'B',
            'floor' => 4,
            'day' => 'Sexta-feira',
            'teacher_name' => 'Anan Cristina Lira de Menezes',
            'start_time' => '08:00:00',
            'end_time' => '10:50:00',
            'subject' => 'Microbiologia'
        ]);
    }
}
