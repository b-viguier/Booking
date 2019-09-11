<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class RoomInventoryListController extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('room_inventory_list.twig', [
            'rooms' => [ // @TODO: get rooms from read model
                [
                    'id' => 101,
                    'type' => 'double',
                ],
            ],
            'types' => [ // @TODO : get types from read model
                'twin',
                'double',
            ],
        ]);
    }
}
