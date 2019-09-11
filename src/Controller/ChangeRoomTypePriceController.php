<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangeRoomTypePriceController extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        $type = $request->request->getAlnum('type');
        $price = $request->request->getInt('price');

        // @TODO: emit event

        return $this->redirectToRoute('room_types_dashboard');
    }
}
