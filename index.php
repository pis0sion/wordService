<?php


use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use Pis0sion\src\entity\GenerateWordDoc;
use Pis0sion\src\service\CreateZipArchiveService;

include_once "vendor/autoload.php";
// 防止文件deleteBlock 和 cloneBlock 失效
ini_set('pcre.backtrack_limit', 999999999999);

$test_params = file_get_contents("data.json");

$list = json_decode($test_params, true);
// 数据列表

// 全局参数
$global_paras = [
    "header" =>
        [
            [
                "is_checked" => 1,
                "type" => "Text",
                "key" => "token_global",
                "value" => "456",
                "description" => ""
            ]
        ],
    "query" => [],
    "body" => [],
];

(new WordService())->run($list, $global_paras);

/**
 * Class WordService
 */
class WordService
{
    /**
     * @param array $list
     * @param array $global_paras
     * @throws Throwable
     * @throws CopyFileException
     * @throws CreateTemporaryFileException
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
        var_dump($compressService->getCompressFile());
    }

}











