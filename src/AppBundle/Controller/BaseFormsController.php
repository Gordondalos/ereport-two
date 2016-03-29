<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Status;
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

    // Данная форма не выводится введу изменениея логики
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:BaseForms')->findAll();
        return $this->render('AppBundle:BaseForms:index.html.twig', array(
            'entities' => $entities,
        ));
    }


    // Данная форма не выводится введу изменениея логики
    public function reportAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:BaseForms')->findBy(
            array('isreport' => '1'),
            array('dateAccepted' => 'Desc')
        );

        return $this->render('AppBundle:BaseForms:indexReport.html.twig', array(
            'entities' => $entities,
        ));
    }

// Возвращает все формы для этой организации
    public function organizationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:BaseForms')->findBy(
            array(
                'organizationId' => $id,
                'isreport' => null

            )
        );
        $u = $this->getUser();
        $ent = $em->getRepository('UserBundle:User')->find($u->getId());
        $role = $ent->getRoles();
        $isadmin = in_array('ROLE_ADMIN',$role);
        return $this->render('AppBundle:BaseForms:form_list.html.twig', array(
            'entities' => $entities,
            'isadmin'=>$isadmin
        ));
    }

    // Возврпщает все отчеты этой организации
    public function organizationAdminAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $u = $this->getUser();
        $curator_id = $u->getId();

        $status = $this->getStatusNew();

        $entities = $em->getRepository('AppBundle:BaseForms')->findBy(
            array(
                'organizationId' => $id,
                'curatorUserId'=>$curator_id,
                'isreport' => 1,
                'status'=>$status[0]

            ),
            array('dateAccepted' => 'DESC')
        );
        return $this->render('AppBundle:BaseForms:form_report_admin_list.html.twig', array(
            'entities' => $entities,
        ));
    }


// возвращает отчеты текущего пользователя
    public function organizationReportAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $userId = $this->getUser()->getId();
        $entities = $em->getRepository('AppBundle:BaseForms')->findBy(
            array(
                'organizationId' => $id,
                'createUserId' => $userId,
                'isreport' => 1
            ),
            array('dateAccepted' => 'Desc')
        );
        return $this->render('AppBundle:BaseForms:form_report_list.html.twig', array(
            'entities' => $entities,
        ));
    }

// Возвращает все отчеты указанного пользователя данной организации
// принимает id организацйии и id пользователя
    public function organizationUserReportAction($id_organization, $id_user)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:BaseForms')->findBy(
            array(
                'organizationId' => $id_organization,
                'createUserId' => $id_user,
                'isreport' => 1
            ),
            array('dateAccepted' => 'Desc')
        );
        return $this->render('AppBundle:BaseForms:form_report_admin_list.html.twig', array(
            'entities' => $entities,
        ));
    }


// Данный метод выводит отчеты, но не используется из за логики
    public function reportAdminAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:BaseForms')->findBy(
            array('isreport' => '1'),
            array('dateAccepted' => 'Desc')
        );

        return $this->render('AppBundle:BaseForms:indexAdmin.html.twig', array(
            'entities' => $entities,
        ));
    }



    public function getStatusNew(){
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:Status')->findAll();
        return $entities;
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


        $entity->setDescription($request->request->get('description'));

       if ($form->isValid()) {

           //Установим создателя отчета
           $entity->setCreateUser($this->getUser());
           // Установим куратора отчета
           $curatorUserId = $this->getUser()->getCuratorUserId();
           $em = $this->getDoctrine()->getManager();
           $curator = $em->getRepository('UserBundle:User')->findById($curatorUserId);
           $entity->setCuratorUser( $curator[0] );

            //Установим дату сдачи
           $entity->setDateAccepted(new \DateTime());
           //Установим статус отчета
           $newStatus = $this->getStatusNew();
           $entity->setStatus($newStatus[0]);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

           if($entity->getIsreport()){
               return $this->redirect($this->generateUrl('baseforms_show_report', array('id' => $entity->getId())));
           }else{
               return $this->redirect($this->generateUrl('baseforms_show', array('id' => $entity->getId())));
           }



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

        $form->add('area','entity',array(
            'class' => 'AppBundle:Area',
            'choice_label'=> 'nameArea',
        ));


        $form->add('isreport', 'hidden', array(
            'data' => false,
        ));




        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }





    /**
     * Creates a form to create a BaseForms entity.
     *
     * @param BaseForms $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateReportForm(BaseForms $entity)
    {
        $form = $this->createForm(new BaseFormsType(), $entity, array(
            'action' => $this->generateUrl('baseforms_create'),
            'method' => 'POST',
        ));

        $form->add('imageFile', 'vich_file', array(
        'required'      => true,
        'allow_delete'  => true, // not mandatory, default is true
        'download_link' => true, // not mandatory, default is true

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

        $form->add('area','entity',array(
            'class' => 'AppBundle:Area',
            'choice_label'=> 'nameArea',
        ));

        $form->add('isreport', 'hidden', array(
            'data' => true,
        ));



        $form->add('submit', 'submit', array('label' => 'Send'));

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

    public function createReportAction()
    {
        $entity = new BaseForms();

        $form  = $this->createCreateReportForm($entity);

        return $this->render('AppBundle:BaseForms:createReport.html.twig', array(
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

    public function showAdminAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:BaseForms')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BaseForms entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:BaseForms:showAdmin.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a BaseForms entity.
     *
     */
    public function showReportAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:BaseForms')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BaseForms entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:BaseForms:showreport.html.twig', array(
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

    public function editAdminAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:BaseForms')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BaseForms entity.');
        }


        $editForm = $this->createEditReportForm($entity);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:BaseForms:editAdmin.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Displays a form to edit an existing BaseForms entity.
     *
     */
    public function editReportAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:BaseForms')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BaseForms entity.');
        }


        $editForm = $this->createEditReportForm($entity);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBundle:BaseForms:editReport.html.twig', array(
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

        $u = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $ent = $em->getRepository('UserBundle:User')->find($u->getId());
        $role = $ent->getRoles();
        $isadmin = in_array('ROLE_ADMIN',$role);


        $form = $this->createForm(new BaseFormsType(), $entity, array(
            'action' => $this->generateUrl('baseforms_update', array('id' => $entity->getId())),
            'method' => 'PUT',
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

        $form->add('area','entity',array(
            'class' => 'AppBundle:Area',
            'choice_label'=> 'nameArea',
        ));

        $form->add('isreport', 'hidden', array(
            'data' => false,
        ));

        $form->add('description');

        if($isadmin){
            $form->add('status','entity',array(
                'class' => 'AppBundle:Status',
                'choice_label'=> 'statusName',
            ));
        }


        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }



    /**
     * Creates a form to edit a BaseForms entity.
     *
     * @param BaseForms $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditReportForm(BaseForms $entity)
    {

        $u = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $ent = $em->getRepository('UserBundle:User')->find($u->getId());
        $role = $ent->getRoles();
        $isadmin = in_array('ROLE_ADMIN',$role);

        $form = $this->createForm(new BaseFormsType(), $entity, array(
            'action' => $this->generateUrl('baseforms_update', array('id' => $entity->getId())),
            'method' => 'PUT',
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

        $form->add('area','entity',array(
            'class' => 'AppBundle:Area',
            'choice_label'=> 'nameArea',
        ));


        if($isadmin){
            $form->add('status','entity',array(
                'class' => 'AppBundle:Status',
                'choice_label'=> 'statusName',
            ));
        }

        $form->add('description');


        $form->add('isreport', 'hidden', array(
            'data' => true,
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

        $entity->setDescription($request->request->get('description'));


        if ($editForm->isValid()) {
            $em->flush();


            $u = $this->getUser();
            $em = $this->getDoctrine()->getManager();
            $ent = $em->getRepository('UserBundle:User')->find($u->getId());
            $role = $ent->getRoles();
            $isadmin = in_array('ROLE_ADMIN',$role);

            if($entity->getIsreport()){
                if($isadmin){
                    return $this->redirect($this->generateUrl('baseforms_edit_admin', array('id' => $id)));
                }else{
                    return $this->redirect($this->generateUrl('baseforms_edit_report', array('id' => $id)));
                }
            }else{
                return $this->redirect($this->generateUrl('baseforms_edit', array('id' => $id)));
            }


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
