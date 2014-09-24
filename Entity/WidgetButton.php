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
    use \Victoire\Bundle\WidgetBundle\Entity\Traits\LinkTrait;
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="hoverTitle", type="string", length=55, nullable=true)
     */
    protected $hoverTitle;

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

}
