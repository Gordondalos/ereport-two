<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\TypeReport;
use AppBundle\Form\TypeReportType;

/**
 * TypeReport controller.
 *
 */
class TypeReportController extends Controller
{

    /**
     * Lists all TypeReport entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:TypeReport')->findAll();

        return $this->render('AppBundle:TypeReport:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TypeReport entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TypeReport();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typereport_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:TypeReport:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TypeReport entity.
     *
     * @param TypeReport $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TypeReport $entity)
    {
        $form = $this->createForm(new TypeReportType(), $entity, array(
            'action' => $this->generateUrl('typereport_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TypeReport entity.
     *
     */
    public function newAction()
    {
        $entity = new TypeReport();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:TypeReport:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TypeReport entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TypeReport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeReport entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:TypeReport:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TypeReport entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TypeReport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeReport entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:TypeReport:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TypeReport entity.
    *
    * @param TypeReport $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TypeReport $entity)
    {
        $form = $this->createForm(new TypeReportType(), $entity, array(
            'action' => $this->generateUrl('typereport_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TypeReport entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:TypeReport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeReport entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typereport_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:TypeReport:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TypeReport entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:TypeReport')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TypeReport entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('typereport'));
    }

    /**
     * Creates a form to delete a TypeReport entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typereport_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
