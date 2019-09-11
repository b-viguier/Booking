<?php


namespace App\Controller;


use App\Events\RoomAddedToInventory;
use App\EventStore\EventStore;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateRoomController extends AbstractController
{
    /**
     * @var EventStore
     */
    private $eventStore;

    public function __construct(EventStore $eventStore)
    {
        $this->eventStore = $eventStore;
    }

    public function __invoke(Request $request): Response
    {
        $type = $request->request->getAlnum('type');
        $id = $request->request->getInt('id');

        $this->eventStore->append(new RoomAddedToInventory($id, $type, new DateTimeImmutable()));

        return $this->redirectToRoute('room_inventory_dashboard');
    }
}
