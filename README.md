[![CircleCI](https://circleci.com/gh/Victoire/WidgetButtonBundle.svg?style=shield)](https://circleci.com/gh/Victoire/WidgetButtonBundle)

Victoire Button Bundle
============

## What is the purpose of this bundle

This bundle installs the *Button Widget* on your Victoire project.
With this widget, you can set up a button anywhere on your website which can link to :

* Internal pages
* URL
* A routing setting
* An anchor - i.e a widget within a page

You can define the size and style of the button

## Set Up Victoire

If you haven't already, you can follow the steps to set up Victoire *[here](https://github.com/Victoire/victoire/blob/master/doc/setup.md)*

## Install the bundle :

Run the following composer command :

    php composer.phar require victoire/button-widget

### Reminder

Do not forget to add the bundle in your AppKernel !

    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\ButtonBundle\VictoireWidgetButtonBundle(),
            );

            return $bundles;
        }
    }
