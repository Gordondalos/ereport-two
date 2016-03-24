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
            ->add('username')
            ->add('inn')
            ->add('numberSocialnFond')
            ->add('bank')
            ->add('bankAccount')
            ->add('bankBik')
            ->add('director')
            ->add('directorPhone')
            ->add('buhgalter')
            ->add('buhgalterphone')
            ->add('phisicalAdress')
            ->add('urAdress')
            ->add('mailAdress')
            ->add('site')
            ->add('fullNameOrganization')
            ->add('shortNameOrganization')
            ->add('gns')
            ->add('okpo')
            ->add('timeJob')
            ->add('email','email')
            ->add('enabled')
            ->add('locked')
            ->add('roles')
            ->add('password','password')
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
