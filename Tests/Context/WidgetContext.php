<?php

namespace Victoire\Widget\TitleBundle\Tests\Context;

use Knp\FriendlyContexts\Context\RawMinkContext;

class WidgetContext extends RawMinkContext
{
    /**
     * @Then /^I should see a button "(.+)" with class "(.+)"$/
     */
    public function iShouldSeeButtonWithClass($text, $class)
    {
        $page = $this->getSession()->getPage();

        $button = $page->find('xpath', sprintf(
            'descendant-or-self::a[contains(@class, "%s") and contains(normalize-space(.), "%s")]',
            $class,
            $text
        ));
        if (null === $button) {
            $message = sprintf(
                'Button with text "%s" and class "%s" not found.',
                $text,
                $class
            );
            throw new \Behat\Mink\Exception\ResponseTextException($message, $this->getSession());
        }
    }

    /**
     * @Then /^I should see a button "(.+)" with hover title "(.+)"$/
     */
    public function iShouldSeeButtonWithHoverTitle($text, $hoverTitle)
    {
        $page = $this->getSession()->getPage();

        $button = $page->find('xpath', sprintf(
            'descendant-or-self::a[contains(@title, "%s") and contains(normalize-space(.), "%s")]',
            $hoverTitle,
            $text
        ));
        if (null === $button) {
            $message = sprintf(
                'Button with text "%s" and hover title "%s" not found.',
                $text,
                $hoverTitle
            );
            throw new \Behat\Mink\Exception\ResponseTextException($message, $this->getSession());
        }
    }

    /**
     * @Then /^I should see a button "(.+)" with a "(.+)" icon$/
     */
    public function iShouldSeeButtonWithIcon($text, $icon)
    {
        $page = $this->getSession()->getPage();

        $button = $page->find('xpath', sprintf(
            'descendant-or-self::a[contains(normalize-space(.), "%s")]/i[contains(@class, "%s")]',
            $text,
            $icon
        ));
        if (null === $button) {
            $message = sprintf(
                'Button with text "%s" and icon "%s" not found.',
                $text,
                $icon
            );
            throw new \Behat\Mink\Exception\ResponseTextException($message, $this->getSession());
        }
    }
}
