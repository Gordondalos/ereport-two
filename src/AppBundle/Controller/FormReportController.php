<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\FormReport;
use AppBundle\Form\FormReportType;

/**
 * FormReport controller.
 *
 */
class FormReportController extends Controller
{

    /**
     * Lists all FormReport entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:FormReport')->findAll();

        return $this->render('AppBundle:FormReport:index.html.twig', array(
            'entities' => $entities,
        ));
    }


    public function AllAction($em = null)
    {
        if($em == null){
            $em = $this->getDoctrine()->getManager();
        }
        $entities = $em->getRepository('AppBundle:FormReport')->findAll();

        return $entities;
    }


    /**
     * Creates a new FormReport entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new FormReport();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('formreport_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:FormReport:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a FormReport entity.
     *
     * @param FormReport $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(FormReport $entity)
    {
        $form = $this->createForm(new FormReportType(), $entity, array(
            'action' => $this->generateUrl('formreport_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new FormReport entity.
     *
     */
    public function newAction()
    {
        $entity = new FormReport();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBundle:FormReport:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FormReport entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:FormReport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormReport entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:FormReport:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FormReport entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:FormReport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormReport entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:FormReport:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a FormReport entity.
    *
    * @param FormReport $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(FormReport $entity)
    {
        $form = $this->createForm(new FormReportType(), $entity, array(
            'action' => $this->generateUrl('formreport_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing FormReport entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:FormReport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FormReport entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('formreport_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:FormReport:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a FormReport entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:FormReport')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FormReport entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('formreport'));
    }

    /**
     * Creates a form to delete a FormReport entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formreport_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
