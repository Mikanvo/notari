<?php

namespace App\Controller;

use App\Entity\Module;
use App\Form\GestionWorkflowType;
use App\Repository\GestionWorkflowRepository;
use App\Repository\TypeRepository;
use App\Repository\WorkflowRepository;
use App\Entity\GestionWorkflow;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/admin")
 * il s'agit du workflow des module
 */
class WorkflowController extends AbstractController
{
    /**
     * @Route("/workflow", name="workflow")
     * @param GestionWorkflowRepository $repository
     * @return Response
     */
    public function index(GestionWorkflowRepository $repository): Response
    {

        $pagination = $repository->findBy(['active' => 1]);
//dd($pagination);
        return $this->render('_admin/workflow/index.html.twig', [
            'pagination' => $pagination,
            'tableau' => [
                'titre' => 'titre',
                'type_acte' => 'type_acte',
                'nombre_total_jour' => 'nombre_total_jour',


            ],
            'modal' => 'modal',

            'titre' => 'Liste des workflows',
        ]);
    }

    /**
     * @Route("/workflow/new", name="workflow_new", methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param TypeRepository $repository
     * @return Response
     */
    public function new(Request $request, EntityManagerInterface $em, TypeRepository $repository): Response
    {
        $workflow = new GestionWorkflow();
        $form = $this->createForm(GestionWorkflowType::class, $workflow, [
            'method' => 'POST',
            'action' => $this->generateUrl('workflow_new')
        ]);
        $form->handleRequest($request);

        $isAjax = $request->isXmlHttpRequest();

        if ($form->isSubmitted()) {
            $response = [];
            $redirect = $this->generateUrl('workflow');
            $datas = $form->get('workflow')->getData();

            $typeActe = $repository->find($request->get('type'));
            $total =0;

            if ($form->isValid()) {

                foreach ($datas as $data) {
                    $data->setTypeActe($typeActe);
                    $total = $total + $data->getNombreJours();
                }
                $workflow->setActive(1);
                $workflow->setTotal($total);
                $workflow->setType($typeActe);
                $em->persist($workflow);
                $em->flush();

                $message = 'Opération effectuée avec succès';
                $statut = 1;
                $this->addFlash('success', $message);

            }
            if ($isAjax) {
                return $this->json(compact('statut', 'message', 'redirect'));
            } else {
                if ($statut == 1) {
                    return $this->redirect($redirect);
                }
            }
        }

        return $this->render('_admin/workflow/new.html.twig', [
            'workflow' => $workflow,
            'form' => $form->createView(),
            'titre' => 'Worflow',
            'type' => $repository->findAll(),
        ]);
    }
    /**
     * @Route("/workflow/{id}/confirmation", name="workflow_confirmation", methods={"GET"})
     * @param $id
     * @param GestionWorkflow $parent
     * @return Response
     */
    public function confirmation($id,GestionWorkflow $parent): Response
    {
        return $this->render('_admin/modal/confirmation.html.twig',[
            'id'=>$id,
            'action'=>'workflow',
        ]);
    }


    /**
     * @Route("/workflow/{id}/edit", name="workflow_edit", methods={"GET","POST"})
     * @param Request $request
     * @param GestionWorkflow $workflow
     * @param EntityManagerInterface $em
     * @param TypeRepository $repository
     * @return Response
     */
    public function edit(Request $request, GestionWorkflow $workflow, EntityManagerInterface $em, TypeRepository $repository): Response
    {

        $form = $this->createForm(GestionWorkflowType::class, $workflow, [
            'method' => 'POST',
            'action' => $this->generateUrl('workflow_edit', [
                'id' => $workflow->getId(),
            ])
        ]);
        $form->handleRequest($request);

        $isAjax = $request->isXmlHttpRequest();

        if ($form->isSubmitted()) {
            $response = [];
            $redirect = $this->generateUrl('workflow');
            $datas = $form->get('workflow')->getData();

            $typeActe = $repository->find($request->get('type'));
            $total =0;

            if ($form->isValid()) {

                foreach ($datas as $data) {
                    $data->setTypeActe($typeActe);
                    $total = $total + $data->getNombreJours();
                }
                $workflow->setActive(1);
                $workflow->setTotal($total);
                $workflow->setType($typeActe);
                $em->persist($workflow);
                $em->flush();

                $message = 'Opération effectuée avec succès';
                $statut = 1;
                $this->addFlash('success', $message);

            }
            if ($isAjax) {
                return $this->json(compact('statut', 'message', 'redirect'));
            } else {
                if ($statut == 1) {
                    return $this->redirect($redirect);
                }
            }
        }

        return $this->render('_admin/workflow/edit.html.twig', [
            'workflow' => $workflow,
            'form' => $form->createView(),
            'type' => $repository->findAll(),
            'titre' => 'Worflow',
        ]);
    }

    /**
     * @Route("/workflow/{id}/show", name="workflow_show", methods={"GET"})
     * @param GestionWorkflow $workflow
     * @return Response
     */
    public function show(GestionWorkflow $workflow, TypeRepository $repository): Response
    {
        $form = $this->createForm(GestionWorkflowType::class, $workflow, [
            'method' => 'POST',
            'action' => $this->generateUrl('workflow_show', [
                'id' => $workflow->getId(),
            ])
        ]);

        return $this->render('_admin/workflow/voir.html.twig', [
            'workflow' => $workflow,
            'titre' => 'Worflow',
            'type' => $repository->findAll(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/workflow/{id}/active", name="workflow_active", methods={"GET"})
     * @param $id
     * @param GestionWorkflow $workflow
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function active($id, GestionWorkflow $workflow, EntityManagerInterface $entityManager): Response
    {


        if ($workflow->getActive() == 1) {

            $workflow->setActive(0);

        } else {

            $workflow->setActive(1);

        }

        $entityManager->persist($workflow);
        $entityManager->flush();
        return $this->json([
            'code' => 200,
            'message' => 'ça marche bien',
            'active' => $workflow->getActive(),
        ], 200);


    }


    /**
     * @Route("/workflow/delete/{id}", name="workflow_delete", methods={"POST","GET","DELETE"})
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param GestionWorkflow $workflow
     * @return Response
     */
    public function delete(Request $request, EntityManagerInterface $em, GestionWorkflow $workflow): Response
    {


        $form = $this->createFormBuilder()
            ->setAction(
                $this->generateUrl(
                    'workflow_delete'
                    , [
                        'id' => $workflow->getId()
                    ]
                )
            )
            ->setMethod('DELETE')
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->remove($workflow);
            $em->flush();

            $redirect = $this->generateUrl('workflow');

            $message = 'Opération effectuée avec succès';

            $response = [
                'statut' => 1,
                'message' => $message,
                'redirect' => $redirect,
            ];

            $this->addFlash('success', $message);

            if (!$request->isXmlHttpRequest()) {
                return $this->redirect($redirect);
            } else {
                return $this->json($response);
            }


        }
        return $this->render('_admin/workflow/delete.html.twig', [
            'workflow' => $workflow,
            'form' => $form->createView(),
        ]);
    }

}
