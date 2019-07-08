<?php

namespace App\Controller\Temperature;

use App\Entity\Temperature\Temperature;
use App\Form\Temperature\TemperatureType;
use App\Repository\Temperature\TemperatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/temperature/temperature")
 */
class TemperatureController extends AbstractController
{
    /**
     * @Route("/", name="temperature_temperature_index", methods={"GET"})
     */
    public function index(TemperatureRepository $temperatureRepository): Response
    {
        return $this->render('temperature/temperature/index.html.twig', [
            'temperatures' => $temperatureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="temperature_temperature_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $temperature = new Temperature();
        $form = $this->createForm(TemperatureType::class, $temperature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($temperature);
            $entityManager->flush();

            return $this->redirectToRoute('temperature_temperature_index');
        }

        return $this->render('temperature/temperature/new.html.twig', [
            'temperature' => $temperature,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="temperature_temperature_show", methods={"GET"})
     */
    public function show(Temperature $temperature): Response
    {
        return $this->render('temperature/temperature/show.html.twig', [
            'temperature' => $temperature,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="temperature_temperature_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Temperature $temperature): Response
    {
        $form = $this->createForm(TemperatureType::class, $temperature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('temperature_temperature_index', [
                'id' => $temperature->getId(),
            ]);
        }

        return $this->render('temperature/temperature/edit.html.twig', [
            'temperature' => $temperature,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="temperature_temperature_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Temperature $temperature): Response
    {
        if ($this->isCsrfTokenValid('delete'.$temperature->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($temperature);
            $entityManager->flush();
        }

        return $this->redirectToRoute('temperature_temperature_index');
    }
}
