<?php

namespace App\Actions\ImageActions;

class DeleteImageAction
{
    public function execute($path)
    {
        \Storage::disk('public')->delete($path);
    }
}
