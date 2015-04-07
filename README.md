Victoire CMS Button Widget Bundle
============

Need to add a button in a victoire cms website ?
Get this button bundle and so on

First you need to have a valid Symfony2 Victoire edition.
Then you just have to run the following composer command :

    php composer.phar require appventus/button-widget

The button bundle handles Bootstrap and Foundation view.


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
