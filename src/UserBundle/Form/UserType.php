<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullNameOrganization')
            ->add('shortNameOrganization')
            ->add('director')
            ->add('directorPhone')
            ->add('directorPost')
            ->add('buhgalter')
            ->add('buhgalterphone')
            ->add('urAdress')
            ->add('phisicalAdress')
            ->add('mailAdress')
            ->add('inn')
            ->add('okpo')
            ->add('dateRegistration','date')
            ->add('okved')
            ->add('numberSocialnFond')
            ->add('gns')

            ->add('bank')
            ->add('bankBik')
            ->add('bankAccount')

            ->add('username')
            ->add('site')
            ->add('timeJob')
            ->add('email','email')
            ->add('enabled')
            ->add('locked')
            ->add('roles')
            ->add('password','password',array(
                'required'=>false,
            ))
            ->add('description')
            ->add('phone')
            ->add('groups','entity',array(
                'class' => 'UserBundle:Group',
                'choice_label' => 'name',
                'multiple' => true

            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Userbundle_user';
    }
}
