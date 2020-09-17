<?php


namespace Pis0sion\src\service;


use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\TemplateProcessor;
use Pis0sion\src\component\IWordTemplateFactoryInterface;

/**
 * Class CreateTemplateService
 * @package Pis0sion\src\service
 */
class CreateTemplateService implements IWordTemplateFactoryInterface
{

    /**
     * @param string $filename
     * @return TemplateProcessor
     * @throws CopyFileException
     * @throws CreateTemporaryFileException
     */
    public static function createTemplateFactory(string $filename): TemplateProcessor
    {
        // TODO: Implement createTemplateFactory() method.
        return new TemplateProcessor($filename);
    }
}