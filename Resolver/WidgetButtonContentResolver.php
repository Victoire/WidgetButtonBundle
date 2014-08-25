<?php

namespace Victoire\Widget\ButtonBundle\Resolver;

use Victoire\Bundle\WidgetBundle\Model\Widget;
use Victoire\Bundle\WidgetBundle\Resolver\BaseWidgetContentResolver;

class WidgetButtonContentResolver extends BaseWidgetContentResolver
{
    /**
     * Get the business entity content
     * @param Widget $widget
     *
     * @return string
     */
    public function getWidgetBusinessEntityContent(Widget $widget)
    {
        if ($entity = $widget->getEntity()) {
            //Read into route parameters with twig
            $this->readIntoWidgetRouteParameters($widget);
        }

        $parameters = $this->getWidgetStaticContent($widget);
        $this->populateParametersWithWidgetFields($widget, $entity, $parameters);

        return $parameters;
    }

    /**
     * Get the content of the widget by the entity linked to it
     *
     * @param Widget $widget
     *
     * @return string
     *
     */
    public function getWidgetEntityContent(Widget $widget)
    {
        if ($entity = $widget->getEntity()) {
            //Read into route parameters with twig
            $this->readIntoWidgetRouteParameters($widget);
        }

        $parameters = $this->getWidgetStaticContent($widget);
        $this->populateParametersWithWidgetFields($widget, $entity, $parameters);

        return $parameters;
    }

    public function readIntoWidgetRouteParameters(Widget $widget)
    {
        $entity = $widget->getEntity();

        //Creates a new twig environment
        $twig = new \Twig_Environment(new \Twig_Loader_String());

        //add global values for `entity` and `businessEntityName`
        $twig->addGlobal('entity', $entity);
        $twig->addGlobal($widget->getBusinessEntityName(), $entity);

        //Get widget route parameters
        foreach ($widget->getRouteParameters() as $key => $_routeParameter) {
            $params[$key] = $twig->render($_routeParameter);
        }
        $widget->setRouteParameters($params);
    }
}
