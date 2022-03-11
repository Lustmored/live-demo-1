<?php
declare(strict_types=1);

namespace App\Twig\Components;

use Symfony\Component\HttpFoundation\Request;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('file')]
class FileComponent
{
    use DefaultActionTrait;

    #[LiveProp]
    public array $files = [];

    #[LiveAction]
    public function test(Request $request): void{
        $this->files = $request->files->all();
    }
}
