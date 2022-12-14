<?php

namespace Nrz\LaravelModuleCreator\Exceptions\File;

use Exception;
use Nrz\LaravelModuleCreator\Helpers\File;

class FileIsNotWritableException extends Exception
{
    public function __construct(File $file)
    {
        parent::__construct("requested file is not writable: " . $file->getFilePath());
    }
}