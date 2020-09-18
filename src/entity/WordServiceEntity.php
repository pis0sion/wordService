<?php


namespace Pis0sion\src\entity;


use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use Pis0sion\src\service\CreateZipArchiveService;
use Throwable;

/**
 * Class WordServiceEntity
 * @package Pis0sion\src\entity
 */
class WordServiceEntity
{
    /**
     * @param array $list
     * @param array $global_paras
     * @throws Throwable
     * @throws CopyFileException
     * @throws CreateTemporaryFileException|\Throwable
     */
    public function run(array $list, array $global_paras)
    {
        $word = new GenerateWordDoc();
        // 设置保存的路径
        $word->setSavePath(getcwd() . "//" . uniqid());
        // 生成各个接口的文档
        foreach ($list as $key => $parameter) {
            $word->create($parameter, $key, $global_paras);
        }
        // 下载文件
        $this->compressAndDownloadFiles($word);
    }

    /**
     * @param $word
     */
    protected function compressAndDownloadFiles($word)
    {
        // 压缩处理
        $compressService = new CreateZipArchiveService();
        // 设置压缩文件的名称
        $compressService->setCompressFile(getcwd() . '/zip/' . uniqid() . '.zip');
        // 压缩目录中的文件
        $compressService->compress($word->getSavePath());
        // 删除目录及其文件
        $compressService->deleteFiles($word->getSavePath());
        // 下载文件
        $compressService->downloadCompressFile();
    }

}