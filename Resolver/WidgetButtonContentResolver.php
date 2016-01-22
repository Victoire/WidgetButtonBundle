<?php

namespace Victoire\Widget\ButtonBundle\Resolver;

use Victoire\Bundle\WidgetBundle\Model\Widget;
use Victoire\Bundle\WidgetBundle\Resolver\BaseWidgetContentResolver;
use Victoire\Widget\ButtonBundle\Entity\WidgetButton;

class WidgetButtonContentResolver extends BaseWidgetContentResolver
{
    /**
     * Get the static content of the widget.
     *
     * @param Widget $widget
     *
     * @return string
     */
    public function getWidgetStaticContent(Widget $widget)
    {
        $parameters = parent::getWidgetStaticContent($widget);
        $parameters = $this->setButtonParameters($widget, $parameters);

        return $parameters;
    }

    /**
     * Get the business entity content.
     *
     * @param Widget $widget
     *
     * @return string
     */
    public function getWidgetBusinessEntityContent(Widget $widget)
    {
        if ($entity = $widget->getEntity() && 'route' === $widget->getLink()->getLinkType()) {
            //Read into route parameters with twig
            $this->readIntoWidgetRouteParameters($widget);
        }

        $parameters = $this->getWidgetStaticContent($widget);
        $this->populateParametersWithWidgetFields($widget, $entity, $parameters);
        $parameters = $this->setButtonParameters($widget, $parameters);

        return $parameters;
    }

    /**
     * Get the content of the widget by the entity linked to it.
     *
     * @param Widget $widget
     *
     * @return string
     */
    public function getWidgetEntityContent(Widget $widget)
    {
        if ($entity = $widget->getEntity() && 'route' === $widget->getLink()->getLinkType()) {
            //Read into route parameters with twig
            $this->readIntoWidgetRouteParameters($widget);
        }

        $parameters = $this->getWidgetStaticContent($widget);
        $this->populateParametersWithWidgetFields($widget, $entity, $parameters);
        $parameters = $this->setButtonParameters($widget, $parameters);

        return $parameters;
    }

    /**
     * Get the content of the widget for the query mode.
     *
     * @param Widget $widget
     *
     * @return string
     */
    public function getWidgetQueryContent(Widget $widget)
    {
        $parameters = parent::getWidgetQueryContent($widget);
        $parameters = $this->setButtonParameters($widget, $parameters);

        return $parameters;
    }

    public function readIntoWidgetRouteParameters(Widget $widget)
    {
        $entity = $widget->getEntity();

        //Creates a new twig environment
        $twig = new \Twig_Environment(new \Twig_Loader_Array([]));

        //add global values for `entity` and `businessEntityId`
        $vars = [
            'entity'                       => $entity,
            $widget->getBusinessEntityId() => $entity,
        ];

        //Interpret variables in widget route parameters to be able to generate correct
        $params = [];
        foreach ($widget->getLink()->getRouteParameters() as $key => $_routeParameter) {
            $template = $twig->createTemplate($_routeParameter);
            $params[$key] = $template->render($vars);
        }
        $widget->getLink()->setRouteParameters($params);
    }

    protected function setButtonParameters(Widget $widget, $parameters)
    {
        /* @var WidgetButton $widget */
        $icon = ($parameters['icon']) ? "<i class='fa ".$parameters['icon']."'></i>" : '';
        $label = $icon.' '.$parameters['title'];

        $block = ($parameters['isBlock']) ? 'btn-block' : '';
        $class = 'btn btn-'.$parameters['size'].' btn-'.$parameters['style'].' '.$block;
        $title = $parameters['hoverTitle'];
        $attributes = [
            'class' => $class,
            'title' => $title,
        ];

        $tooltipId = ['tooltipId' => null];
        if ($parameters['tooltipable']) {
            $id = 'vic_button_tooltip_'.$widget->getId();
            $attributes = array_merge($attributes, ['id' => $id]);
            $tooltipId = ['tooltipId' => $id];
        }

        $parameters = array_merge($parameters, [
            'attributes' => $attributes,
            'label'      => $label,
        ], $tooltipId);

        return $parameters;
    }
}
