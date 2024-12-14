<?php

namespace App\UseCases\UserVisit;

use DateTime;
use App\Repositories\UserVisitRepository;
use App\UseCases\Auth\GetUser;

class IncreaseVisit
{
    public function __construct(
        private UserVisitRepository $userVisitRepository,
        private GetUser $getUser,
    ) {}

    public function execute(): void
    {
        $currentDatetime = new DateTime();

        $user = $this->getUser->execute();

        $userVisit = $this->userVisitRepository->getByUserId($user->id);

        if (!$userVisit) {
            $this->userVisitRepository->create([
                'user_id' => $user->id,
                'last_visit' => $currentDatetime,
                'total_visits' => 1,
            ]);
            return;
        }

        $lastVisit = new DateTime($userVisit->last_visit);
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
