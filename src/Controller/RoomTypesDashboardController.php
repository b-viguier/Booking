<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class RoomTypesDashboardController extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('room_types_dashboard.twig', [
            'types' => [ // @TODO : get types from read model
                'twin' => 90,
                'double' => 200,
            ]
        ]);
    }
}
