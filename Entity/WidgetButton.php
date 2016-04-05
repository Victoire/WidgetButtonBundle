<?php

namespace Victoire\Widget\ButtonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetButton.
 *
 * @ORM\Table("vic_widget_button")
 * @ORM\Entity
 */
class WidgetButton extends Widget
{
    use \Victoire\Bundle\WidgetBundle\Entity\Traits\LinkTrait;

    /**
     * @var string
     * @Assert\NotBlank()
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
     * @var bool
     *
     * @ORM\Column(name="is_block", type="boolean")
     */
    protected $isBlock;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_callToAction", type="boolean")
     */
    protected $isCallToAction;

    /**
     * @var bool
     *
     * @ORM\Column(name="tooltipable", type="boolean")
     */
    protected $tooltipable;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=55, nullable=true)
     */
    protected $icon;

    /**
     * Set title.
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
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set hoverTitle.
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
     * Get hoverTitle.
     *
     * @return string
     */
    public function getHoverTitle()
    {
        return $this->hoverTitle;
    }

    /**
     * Set style.
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
     * Get style.
     *
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set size.
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
     * Get size.
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Get isBlock.
     *
     * @return string
     */
    public function getIsBlock()
    {
        return $this->isBlock;
    }

    /**
     * Set isBlock.
     *
     * @param string $isBlock
     *
     * @return $this
     */
    public function setIsBlock($isBlock)
    {
        $this->isBlock = $isBlock;

        return $this;
    }

    /**
     * Get isCallToAction.
     *
     * @return string
     */
    public function getIsCallToAction()
    {
        return $this->isCallToAction;
    }

    /**
     * Set isCallToAction.
     *
     * @param string $isCallToAction
     *
     * @return $this
     */
    public function setIsCallToAction($isCallToAction)
    {
        $this->isCallToAction = $isCallToAction;

        return $this;
    }

    /**
     * Get icon.
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set icon.
     *
     * @param string $icon
     *
     * @return $this
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTooltipable()
    {
        return $this->tooltipable;
    }

    /**
     * @param bool $tooltipable
     */
    public function setTooltipable($tooltipable)
    {
        $this->tooltipable = $tooltipable;
    }
}
