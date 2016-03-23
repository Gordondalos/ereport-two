<?php

namespace AppBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use AppBundle\Entity\BaseForms;
use AppBundle\Form\BaseFormsType;

/**
 * BaseForms controller.
 *
 */
class BaseFormsController extends Controller
{

    /**
     * Lists all BaseForms entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:BaseForms')->findAll();

        return $this->render('AppBundle:BaseForms:index.html.twig', array(
            'entities' => $entities,
        ));
    }


    public function organizationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:BaseForms')->findBy(
            array(
                'organizationId' => $id
            )
        );

        return $this->render('AppBundle:BaseForms:form_list.html.twig', array(
            'entities' => $entities,
        ));
    }



    /**
     * Creates a new BaseForms entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new BaseForms();

        $form = $this->createCreateForm($entity);

        $form->handleRequest($request);



       if ($form->isValid()) {

           $entity->setCreateUser($this->getUser());
           $entity->setDateAccepted(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('baseforms_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBundle:BaseForms:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a BaseForms entity.
     *
     * @param BaseForms $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(BaseForms $entity)
    {
        $form = $this->createForm(new BaseFormsType(), $entity, array(
            'action' => $this->generateUrl('baseforms_create'),
            'method' => 'POST',
        ));


        $form->add('formReport','entity',array(
            'class' => 'AppBundle:FormReport',
            'choice_label'=> 'formName',
        ));


        $form->add('typeReport','entity',array(
            'class' => 'AppBundle:TypeReport',
            'choice_label'=> 'typeName',
        ));


        $form->add('organization','entity',array(
            'class' => 'AppBundle:Organization',
            'choice_label'=> 'organizationName',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BaseForms entity.
     *
     */
    public function newAction()
    {
        $entity = new BaseForms();

        $form  = $this->createCreateForm($entity);

        return $this->render('AppBundle:BaseForms:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BaseForms entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:BaseForms')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BaseForms entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:BaseForms:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing BaseForms entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:BaseForms')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BaseForms entity.');
        }



        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:BaseForms:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a BaseForms entity.
    *
    * @param BaseForms $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BaseForms $entity)
    {
        $form = $this->createForm(new BaseFormsType(), $entity, array(
            'action' => $this->generateUrl('baseforms_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BaseForms entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:BaseForms')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BaseForms entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('baseforms_edit', array('id' => $id)));
        }

        return $this->render('AppBundle:BaseForms:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a BaseForms entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:BaseForms')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BaseForms entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('baseforms'));
    }

    /**
     * Creates a form to delete a BaseForms entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('baseforms_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
