<?php


namespace Pis0sion\src\component;


/**
 * Interface IZipArchiveFactoryInterface
 * @package Pis0sion\src\component
 */
interface IZipArchiveFactoryInterface
{
    /**
     * @param string $dir_path
     * @return string
     */
    public function compress(string $dir_path): string;

    /**
     * @param string $file_name
     * @param \ZipArchive $zipArchive
     * @return mixed
     */
    public function travelFiles(string $file_name, \ZipArchive $zipArchive);
}