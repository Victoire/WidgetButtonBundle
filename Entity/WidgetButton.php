<?php
namespace Victoire\Widget\ButtonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetButton
 *
 * @ORM\Table("vic_widget_button")
 * @ORM\Entity
 */
class WidgetButton extends Widget
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=55)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="hoverTitle", type="string", length=55)
     */
    protected $hoverTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    protected $link;

    /**
     * @var string
     *
     * @ORM\Column(name="target", type="string", length=10)
     */
    protected $target;

    /**
     * @var string tiny|small|default|large
     *
     *
     * @ORM\Column(name="size", type="string", length=10)
     */
    protected $size;

    /**
     * @var string default|warning|info|success|primary|danger
     *
     * @ORM\Column(name="style", type="string", length=10)
     */
    protected $style;

    /**
     * @ORM\ManyToOne(targetEntity="Victoire\Bundle\PageBundle\Entity\Page")
     * @ORM\JoinColumn(name="attached_page_id", referencedColumnName="id", onDelete="cascade", nullable=true)
     */
    protected $page;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=55, nullable=true)
     */
    protected $route;

    /**
     * @var string
     *
     * @ORM\Column(name="route_parameters", type="array", nullable=true)
     */
    protected $routeParameters = array();

    /**
     * @var string
     *
     * @ORM\Column(name="link_type", type="string", length=255)
     */
    protected $linkType;

    /**
     * Set title
     *
     * @param string $title
     *
     * @return WidgetButton
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set hoverTitle
     *
     * @param string $hoverTitle
     *
     * @return WidgetButton
     */
    public function setHoverTitle($hoverTitle)
    {
        $this->hoverTitle = $hoverTitle;

        return $this;
    }

    /**
     * Get hoverTitle
     *
     * @return string
     */
    public function getHoverTitle()
    {
        return $this->hoverTitle;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return WidgetButton
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set target
     *
     * @param string $target
     *
     * @return WidgetButton
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set style
     *
     * @param string $style
     *
     * @return WidgetButton
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set size
     *
     * @param string $size
     *
     * @return WidgetButton
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set route
     *
     * @param string $route
     *
     * @return WidgetButton
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set routeParameters
     *
     * @param array $routeParameters
     *
     * @return WidgetButton
     */
    public function setRouteParameters($routeParameters)
    {
        $this->routeParameters = $routeParameters;

        return $this;
    }

    /**
     * Get routeParameters
     *
     * @return array
     */
    public function getRouteParameters()
    {
        return $this->routeParameters;
    }

    /**
     * Set page
     * @param \Victoire\Bundle\PageBundle\Entity\Page $page
     *
     * @return WidgetButton
     */
    public function setPage($page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \Victoire\Bundle\PageBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set linkType
     *
     * @param  string   $linkType
     * @return MenuItem
     */
    public function setlinkType($linkType)
    {
        $this->linkType = $linkType;

        return $this;
    }

    /**
     * Get linkType
     *
     * @return string
     */
    public function getlinkType()
    {
        return $this->linkType;
    }
}
