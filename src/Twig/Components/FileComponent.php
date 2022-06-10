<?php
declare(strict_types=1);

namespace App\Twig\Components;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveFileArg;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\ValidatableComponentTrait;

#[AsLiveComponent('file')]
class FileComponent
{
    use DefaultActionTrait;
    use ValidatableComponentTrait;

    #[Valid, All([new Image()])]
    public array $autoFiles = [];

    #[Valid, Image]
    public ?UploadedFile $manualFile = null;

    #[LiveAction]
    public function test(
        #[LiveFileArg]
        ?UploadedFile $manualFile = null,
        #[LiveFileArg]
        ?array $autoFiles = null
    ): void{
        if ($manualFile) {
            $this->manualFile = $manualFile;
        }
        if ($autoFiles) {
            $this->autoFiles = $autoFiles;
        }

        $this->validate();
    }
}
