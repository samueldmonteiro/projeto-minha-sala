<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'semester',
        'room',
        'block',
        'floor',
        'day',
        'teacher_name',
        'start_time',
        'end_time',
        'subject'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getClassByDay(User $user, DateTime $forDay = null): Collection
    {
        $date = new DateTime('now');
        if($forDay) $date = $forDay;
        
        $weekDay = $date->format('l');

        $weekDays = [
            'Sunday' => 'Domingo',
            'Monday' => 'Segunda-feira',
            'Tuesday' => 'Terça-feira',
            'Wednesday' => 'Quarta-feira',
            'Thursday' => 'Quinta-feira',
            'Friday' => 'Sexta-feira',
            'Saturday' => 'Sábado',
        ];

        if ($weekDays[$weekDay] == 'Sábado') {
            $date->modify('+2 days');
        }

        if ($weekDays[$weekDay] == 'Domingo') {
            $date->modify('+1 day');
        }

        $weekDay = $date->format('l');
        $today = $weekDays[$weekDay];
        $course_id = (int)$user->course_id;
        $semester = (int)$user->semester;

        return $this->where('day', $today)
            ->where('course_id', $course_id)->where('semester', $semester)->get();
    }
}
