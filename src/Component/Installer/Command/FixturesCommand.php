<?php

namespace Slab\Component\Installer\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class FixturesCommand
 *
 * @package     Slab\Component\Installer\Command
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
class FixturesCommand extends Command
{
    /** @var string $defaultName */
    protected static $defaultName = 'slab:installer';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('slab:installer')
            ->setDescription('Install fixtures/data for development environment.')
            ->setHelp('This command allows you to install default fixtures ...');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $output->writeln(sprintf('<info>Import slab fixtures.</info>'));
            $this->database->initialize($output);
            $this->schema->initialize($output);
            $this->fixtures->initialize($output);
            $output->writeln(sprintf('<info>Import slab fixtures finished.</info>'));
        } catch (\Exception $e) {
            $output->writeln(sprintf('<danger>Something got wrong during the fixtures import.</danger>'));
        }
    }
}