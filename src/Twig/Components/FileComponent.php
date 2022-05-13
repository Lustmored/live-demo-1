<?php
declare(strict_types=1);

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveFileArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('file')]
class FileComponent
{
    use DefaultActionTrait;

    #[LiveProp]
    public array $files = [];

    #[LiveAction]
    public function test(
        #[LiveFileArg(name: 'form[file]', multiple: true)]
        array $files
    ): void{
        $this->files = $files;
    }
}
