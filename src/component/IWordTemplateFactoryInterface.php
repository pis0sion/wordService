<?php


namespace Pis0sion\src\component;


use PhpOffice\PhpWord\TemplateProcessor;

/**
 * Interface IWordTemplateFactoryInterface
 * @package Pis0sion\src\service
 */
interface IWordTemplateFactoryInterface
{
    /**
     * @param string $filename
     * @return TemplateProcessor
     */
    public static function createTemplateFactory(string $filename): TemplateProcessor;
}