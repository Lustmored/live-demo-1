<?php
declare(strict_types=1);

namespace App\Twig\Components;

use Symfony\Component\HttpFoundation\File\UploadedFile;
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
    public array $autoFiles = [];

    #[LiveProp]
    public array $manualFiles = [];

    #[LiveAction]
    public function test(
        #[LiveFileArg]
        ?UploadedFile $manualFiles = null,
        #[LiveFileArg]
        ?array $autoFiles = null
    ): void{
        if ($manualFiles) {
            $this->manualFiles = [$manualFiles];
        }
        if ($autoFiles) {
            $this->autoFiles = $autoFiles;
        }
    }
}
