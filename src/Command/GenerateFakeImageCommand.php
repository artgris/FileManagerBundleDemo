<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpKernel\KernelInterface;

#[AsCommand(
    name: 'generate:fake-images',
    description: 'Add a short description for your command',
)]
class GenerateFakeImageCommand extends Command
{
    public function __construct(private KernelInterface $kernel)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $files = [
            "&filename.jpg",
            "filename*.jpg",
            "filename?.jpg",
            "filename|.jpg",
            "filename$.jpg",
            "filename{}.jpg",
            "filename[].jpg",
            "filename<>.jpg",
            "filename:.jpg",
            'filename\.jpg',
            "filename'.jpg",
            "filename\.jpg",
            '\filename.jpg',
            "filename%20.jpg",
            "filename!@#$.jpg",
            "filenameé.jpg",
            "filename?.jpg",
            "filename..jpg",
            "CON.jpg",
        ];

        $filesystem = new Filesystem();

        $uploads = $this->kernel->getProjectDir()."/public/uploads/specialchars/";
        $privateUploads = $this->kernel->getProjectDir()."/private/";
        $orgine = $this->kernel->getProjectDir(). "/public/uploads/file_example_JPG_100kB.jpg";

        foreach ($files as $filename) {
            $path = $uploads.$filename;
            $filesystem->copy($orgine, $path);
            $pathPrivate = $privateUploads.$filename;
            $filesystem->copy($orgine, $pathPrivate);
        }

        $io->success('ok');

        return Command::SUCCESS;
    }
}
