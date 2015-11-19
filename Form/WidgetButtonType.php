<?php

namespace Victoire\Widget\ButtonBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\CoreBundle\Form\WidgetType;

/**
 * WidgetButton form type.
 */
class WidgetButtonType extends WidgetType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @throws \Exception
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //if no entity is given, we generate the static form
        $builder
            ->add('title', null, [
                'label'      => 'widget.button.form.label.title',
            ])
            ->add('hoverTitle', null, [
                'label'   => 'widget.button.form.label.hoverTitle',
            ])
            ->add('size', 'choice', [
                'label'   => 'widget.button.form.label.size',
                'choices' => [
                    'md'  => 'widget.button.form.choice.size.normal',
                    'sm'  => 'widget.button.form.choice.size.tiny',
                    'lg'  => 'widget.button.form.choice.size.large',
                ],
                'required'  => true,
            ])
            ->add('style', 'choice', [
                'label'     => 'widget.button.form.label.style',
                'choices'   => [
                    'default' => 'widget.button.form.choice.style.label.default',
                    'primary' => 'widget.button.form.choice.style.label.primary',
                    'success' => 'widget.button.form.choice.style.label.success',
                    'info'    => 'widget.button.form.choice.style.label.info',
                    'warning' => 'widget.button.form.choice.style.label.warning',
                    'danger'  => 'widget.button.form.choice.style.label.danger',
                    'link'    => 'widget.button.form.choice.style.label.link',
                ],
                'required'  => true,
            ])
            ->add('link', 'victoire_link')
            ->add('isBlock', null, [
                'label'   => 'widget.button.form.label.isBlock',
            ])
            ->add('isCallToAction', null, [
                'label'   => 'widget.button.form.label.isBlock.isCallToAction',
            ])
            ->add('tooltipable', null, [
                'label'   => 'widget.button.form.label.tooltipable',
            ])
            ->add('icon', 'font_awesome_picker');

        parent::buildForm($builder, $options);
    }

    /**
     * bind form to WidgetButton entity.
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\ButtonBundle\Entity\WidgetButton',
            'widget'             => 'Button',
            'translation_domain' => 'victoire',
        ]);
    }

    /**
     * get form name.
     *
     * @return string
     */
    public function getName()
    {
        return 'victoire_widget_form_button';
    }
}
