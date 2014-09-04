<?php

namespace Victoire\Widget\ButtonBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\CoreBundle\Form\WidgetType;

/**
 * WidgetButton form type
 */
class WidgetButtonType extends WidgetType
{
    /**
     * define form fields
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @throws \Exception
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $namespace = $options['namespace'];
        $entityName = $options['entityName'];

        if ($entityName !== null) {
            if ($namespace === null) {
                throw new \Exception('The namespace is mandatory if the entity_name is given.');
            }
        }

        //if no entity is given, we generate the static form
        $builder
            ->add('title', 'textarea', array(
                'label'      => 'widget.button.form.label.title'
            ))
            ->add('hoverTitle', null, array(
                'label'   => 'widget.button.form.label.hoverTitle'))

            ->add('size', 'choice', array(
                'label'   => 'widget.button.form.label.size',
                'choices' => array(
                    'normal' => 'widget.button.form.choice.size.normal',
                    'tiny'   => 'widget.button.form.choice.size.tiny',
                    'large'  => 'widget.button.form.choice.size.large'
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
                    'danger'  => 'widget.button.form.choice.style.label.danger',
                    'link'    => 'widget.button.form.choice.style.label.link'
                ),
                'required'  => true,
            ))
            ->add('link', 'victoire_link')
            ;

        parent::buildForm($builder, $options);
    }

    /**
     * bind form to WidgetButton entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\ButtonBundle\Entity\WidgetButton',
            'widget'             => 'Button',
            'translation_domain' => 'victoire'
        ));
    }

    /**
     * get form name
     *
     * @return string
     */
    public function getName()
    {
        return 'victoire_widget_form_button';
    }
}
