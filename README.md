#Victoire DCMS Button Bundle
============

This bundle installs the Button Widget in your Victoire project.
With this widget, you can set up a button anywhere on your website which can link to :

* Internal pages
* URL
* A routing setting
* An anchor - i.e a widget within a page

You can define the size and style of the button

##Set Up Victoire

If you haven't already, you can follow the steps to set up Victoire *[here](https://github.com/Victoire/victoire/blob/master/setup.md)*

##Install the Button Bundle :

Run the following composer command :

    php composer.phar require friendsofvictoire/button-widget

##Reminder

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
