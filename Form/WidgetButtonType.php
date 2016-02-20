<?php

namespace Victoire\Widget\ButtonBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Bundle\FormBundle\Form\Type\FontAwesomePickerType;
use Victoire\Bundle\FormBundle\Form\Type\LinkType;

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
            ->add('size', ChoiceType::class, [
                'label'   => 'widget.button.form.label.size',
                'choices' => [
                    'md'  => 'widget.button.form.choice.size.normal',
                    'sm'  => 'widget.button.form.choice.size.tiny',
                    'lg'  => 'widget.button.form.choice.size.large',
                ],
                'required'  => true,
            ])
            ->add('style', ChoiceType::class, [
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
            ->add('link', LinkType::class)
            ->add('isBlock', null, [
                'label'   => 'widget.button.form.label.isBlock',
            ])
            ->add('isCallToAction', null, [
                'label'   => 'widget.button.form.label.isBlock.isCallToAction',
            ])
            ->add('tooltipable', null, [
                'label'   => 'widget.button.form.label.tooltipable',
            ])
            ->add('icon', FontAwesomePickerType::class);

        parent::buildForm($builder, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\ButtonBundle\Entity\WidgetButton',
            'widget'             => 'Button',
            'translation_domain' => 'victoire',
        ]);
    }
}
