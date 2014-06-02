<?php
namespace Victoire\Widget\ButtonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\CoreBundle\Entity\Widget;

/**
 * WidgetButton
 *
 * @ORM\Table("cms_widget_button")
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
     * @ORM\Column(name="link", type="string", length=255)
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
     * Set title
     *
     * @param string $title
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
