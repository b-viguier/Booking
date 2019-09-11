<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateRoomController extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        $type = $request->request->getAlnum('type');
        $id = $request->request->getInt('id');

        // @TODO: emit event

        return $this->redirectToRoute('room_inventory_list');
    }
}
