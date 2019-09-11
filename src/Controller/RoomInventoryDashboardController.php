<?php

namespace App\Controller;

use App\ReadModels\RoomInventory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class RoomInventoryDashboardController extends AbstractController
{
    /**
     * @var RoomInventory
     */
    private $roomInventory;

    public function __construct(RoomInventory $roomInventory)
    {
        $this->roomInventory = $roomInventory;
    }

    public function __invoke(): Response
    {
        return $this->render('room_inventory_dashboard.twig', [
            'rooms' => ($this->roomInventory)(),
            'types' => [ // @TODO : get types from read model
                'twin',
                'double',
            ],
        ]);
    }
}
