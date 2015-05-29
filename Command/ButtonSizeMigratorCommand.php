<?php
namespace Victoire\Widget\ButtonBundle\Command;

use Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Victoire\Bundle\CoreBundle\Entity\Link;

class ButtonSizeMigratorCommand extends ContainerAwareCommand
{
    /**
     * {@inheritDoc}
     */
    public function configure()
    {
        parent::configure();

        $this
            ->setName('victoire:widgetButton:sizeMigrator')
            ->setDescription('migrate old button size value from 2.0 bootstrap class to 3.0 bootstrap class');
    }

    /**
     * Read declared business entities and BusinessEntityPatternPages to generate their urls
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $progress = $this->getHelperSet()->get('progress');
        $progress->setProgressCharacter('V');
        $progress->setEmptyBarCharacter('-');

        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $buttons = $entityManager->getRepository('Victoire\Widget\ButtonBundle\Entity\WidgetButton')->findAll();

        $progress->start($output, count($buttons));
        foreach ($buttons as $button) {
            $progress->advance();
            if ($button->getSize() == 'large') {
                $button->setSize('lg');
            } else if ($button->getSize() == 'tiny') {
                $button->setSize('sm');
            } else if ($button->getSize() == 'normal') {
                $button->setSize('md');
            }

            $entityManager->persist($button);
        }

        $entityManager->flush();
        $progress->finish();
    }
}
