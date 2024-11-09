<?php

namespace App\Services;

use App\Repositories\UserVisitRepository;
use Illuminate\Support\Facades\Auth;

class UserVisitService
{
    public function __construct(
        protected UserVisitRepository $userVisitRepository,
    ) {}

    public function increaseVisit(): void
    {
        $currentDatetime = new \DateTime('now');

        $user = Auth::user();

        $userVisit = $this->userVisitRepository->getByUserId($user->id);

        if (!$userVisit) {
            $this->userVisitRepository->create(
                [
                    'user_id' => $user->id,
                    'last_visit' => $currentDatetime,
                    'total_visits' => 1,
                ]
            );
        }

        if ($userVisit) {

            $lastVisit = new \DateTime($userVisit->last_visit);
            $timeInterval = $lastVisit->diff($currentDatetime);
            $timeDifference = ($timeInterval->days * 24 * 60) + ($timeInterval->h * 60) + $timeInterval->i; // 30 minutes

            if ($timeDifference >= 30) {

                $this->userVisitRepository->update($userVisit->id, [
                    'last_visit' => $currentDatetime->format('Y-m-d H:i:s'),
                    'total_visits' => $userVisit->total_visits + 1
                ]);
            }
        }  
    }
}