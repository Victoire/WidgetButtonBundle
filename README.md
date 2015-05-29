##Victoire DCMS Button Widget Bundle
============

[![Join the chat at https://gitter.im/FriendsOfVictoire/WidgetButtonBundle](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/FriendsOfVictoire/WidgetButtonBundle?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Need to add buttons your Victoire website ?

#Set Up Victoire

If you haven't already, you can follow the steps to set up Victoire *[here](https://github.com/Victoire/victoire/blob/master/setup.md)*

#Install the Simple Contact Form Bundle :

Run the following composer command :

    php composer.phar require friendsofvictoire/button-widget

#Reminder

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
