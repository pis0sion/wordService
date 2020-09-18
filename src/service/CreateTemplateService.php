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
     * @var array
     */
    protected static $template = [
        "api" => "./template/tmpl.docx",
        "doc" => "./template/doc.docx"
    ];

    /**
     * @param string $filename
     * @return TemplateProcessor
     * @throws CopyFileException
     * @throws CreateTemporaryFileException
     */
    public static function createTemplateFactory(string $filename): TemplateProcessor
    {
        // TODO: Implement createTemplateFactory() method.

        if (!array_key_exists($filename, self::$template)) {
            throw new \RuntimeException("template is not exist ...");
        }
        $path = self::$template[$filename];
        return new TemplateProcessor($path);
    }
}