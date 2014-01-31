<?php

namespace Victoire\Widget\ButtonBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\CmsBundle\Form\EntityProxyFormType;
use Victoire\CmsBundle\Form\WidgetType;


/**
 * WidgetButton form type
 */
class WidgetButtonType extends WidgetType
{

    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //choose form mode
        if ($this->entity_name === null) {
            //if no entity is given, we generate the static form
            $builder
                ->add('title', null, array(
                    'label'      => 'widget.button.form.label.title'
                ))
                ->add('hoverTitle', null, array(
                    'label'   => 'widget.button.form.label.hoverTitle'))
                ->add('link', null, array(
                    'label'   => 'widget.button.form.label.link'))
                ->add('target', null, array(
                    'label'   => 'widget.button.form.label.target'))
                ->add('size', 'choice', array(
                    'label'   => 'widget.button.form.label.size',
                    'choices' => array(
                        'tiny'    => 'widget.button.form.choice.size.tiny',
                        'small'   => 'widget.button.form.choice.size.small',
                        'default' => 'widget.button.form.choice.size.default',
                        'large'   => 'widget.button.form.choice.size.large'
                    ),
                    'required'  => true,
                ))
                ->add('style', 'choice', array(
                    'label'   => 'widget.button.form.label.style',
                    'choices'   => array(
                        'primary' => 'widget.button.form.choice.style.label.primary',
                        'success' => 'widget.button.form.choice.style.label.success',
                        'info'    => 'widget.button.form.choice.style.label.info',
                        'warning' => 'widget.button.form.choice.style.label.warning',
                        'default' => 'widget.button.form.choice.style.label.default',
                        'danger'  => 'widget.button.form.choice.style.label.danger'
                    ),
                    'required'  => true,
                ));

        } else {
            //else, WidgetType class will embed a EntityProxyType for given entity
            parent::buildForm($builder, $options);
        }


    }


    /**
     * bind form to WidgetButton entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\ButtonBundle\Entity\WidgetButton',
            'widget'             => 'button',
            'translation_domain' => 'victoire'
        ));
    }


    /**
     * get form name
     */
    public function getName()
    {
        return 'appventus_victoirecmsbundle_widgetbuttontype';
    }
}
