<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'shift_id',
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


    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }


    protected function startTime(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::createFromFormat('H:i:s', $value)->format('H:i'),
        );
    }

    protected function endTime(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::createFromFormat('H:i:s', $value)->format('H:i'),
        );
    }

    public function getTodayClass(User $user): Collection
    {
        $date = new DateTime('now');
        
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
        $shift_id = (int)$user->shift_id;


        return $this->where('day', $today)
            ->where('course_id', $course_id)
            ->where('semester', $semester)
            ->where('shift_id', $shift_id)
            ->get();
    }


    public function getByDay(User $user, string|null $day): Collection
    {
        if($day == null){
            return $this->getTodayClass($user);
        }

        $course_id = (int)$user->course_id;
        $semester = (int)$user->semester;
        $shift_id = (int)$user->shift_id;

        return $this->where('day', $day)
            ->where('course_id', $course_id)
            ->where('semester', $semester)
            ->where('shift_id', $shift_id)
            ->get();
    }
}
