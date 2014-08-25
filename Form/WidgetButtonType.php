<?php

namespace Victoire\Widget\ButtonBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Widget\RenderBundle\DataTransformer\JsonToArrayTransformer;

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

        $transformer = new JsonToArrayTransformer();
        //if no entity is given, we generate the static form
        $builder
            ->add('title', 'textarea', array(
                'label'      => 'widget.button.form.label.title'
            ))
            ->add('hoverTitle', null, array(
                'label'   => 'widget.button.form.label.hoverTitle'))
            ->add('linkType', 'choice', array(
                'label'       => 'menu.form.link_type.label',
                'required'    => true,
                'choices'     => array(
                    'page'  => 'menu.form.link_type.page',
                    'route' => 'widget.button.form.link_type.route',
                    'url'   => 'menu.form.link_type.url'
                ),
                'attr'        => array(
                    'class'    => 'item-type',
                    'onchange' => 'trackButtonTypeChange(this);'
                )
            ))
            ->add('link', null, array(
                'label' => 'widget.button.form.label.link',
                'attr'  => array('class' => 'url-type')
            ))
            ->add('page', 'entity', array(
                'label'       => 'menu.form.page.label',
                'required'    => false,
                'empty_value' => 'menu.form.page.blank',
                'class'       => 'VictoirePageBundle:Page',
                'property'    => 'name',
                'attr'        => array('class' => 'page-type'),
            ))
            ->add('route', null, array(
                'label' => 'widget.button.form.label.route',
                'attr'  => array('class' => 'route-type')
            ))
            ->add($builder->create('route_parameters', 'text', array(
                'label'      => 'widget.button.form.label.route_parameters',
                'attr'       => array('class' => 'route-type')
                )
            )->addModelTransformer($transformer))
            ->add('target', 'choice', array(
                'label'   => 'widget.button.form.label.target',
                'choices' => array(
                    '_parent' => 'widget.button.form.choice.target.parent',
                    '_blank'  => 'widget.button.form.choice.target.blank',
                    'ajax-modal'  => 'widget.button.form.choice.target.ajax-modal',
                ),
                'required'  => true))
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
                    'danger'  => 'widget.button.form.choice.style.label.danger'
                ),
                'required'  => true,
            ));

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
