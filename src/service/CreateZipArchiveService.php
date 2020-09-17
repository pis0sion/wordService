<?php


namespace Pis0sion\src\service;

use Pis0sion\src\component\IZipArchiveFactoryInterface;
use ZipArchive;

/**
 * Class CreateZipArchiveService
 * @package Pis0sion\src\service
 */
class CreateZipArchiveService implements IZipArchiveFactoryInterface
{
    /**
     * 要实现压缩的目录
     * @var string
     */
    protected $compress_file;

    /**
     * @param string $dir_path
     * @return string
     */
    public function compress(string $dir_path): string
    {
        $zipArchive = new ZipArchive();
        if ($zipArchive->open($this->compress_file, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            $this->travelFiles($dir_path, $zipArchive);
            $zipArchive->close();
        }
        return $this->compress_file;
    }

    /**
     * @param string $file_name
     * @param \ZipArchive $zipArchive
     * @return mixed|void
     */
    public function travelFiles(string $file_name, \ZipArchive $zipArchive)
    {
        // TODO: Implement compress() method.
        $handler = opendir($file_name);
        while (($filename = readdir($handler)) !== false) {
            if ($filename != "." && $filename != "..") {
                if (is_dir($file_name . "/" . $filename)) {
                    $this->travelFiles($file_name . "/" . $filename, $zipArchive);
                } else {
                    $zipArchive->addFile($file_name . "/" . $filename, $filename);
                }
            }
        }
        @closedir($file_name);
    }

    /**
     * @param string $dir_path
     */
    public function deleteFiles(string $dir_path)
    {
        if (is_dir($dir_path)) {
            $dirs = scandir($dir_path);
            foreach ($dirs as $dir) {
                if ($dir != '.' && $dir != '..') {
                    $sonDir = $dir_path . '/' . $dir;
                    if (is_dir($sonDir)) {
                        $this->deleteFiles($sonDir);
                        @rmdir($sonDir);
                    } else {
                        @unlink($sonDir);
                    }
                }
            }
            @rmdir($dir_path);
        }
    }

    /**
     * @return string
     */
    public function getCompressFile(): string
    {
        return $this->compress_file;
    }

    /**
     * @param string $compress_file
     */
    public function setCompressFile(string $compress_file): void
    {
        $this->compress_file = $compress_file;
    }


}