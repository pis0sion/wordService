<?php
declare(strict_types=1);

namespace Pis0sion\src\entity;

use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use Pis0sion\src\enum\DescriptionEnum;
use Pis0sion\src\enum\DevelopStatusEnum;
use Pis0sion\src\service\CreateTemplateService;
use Pis0sion\src\service\CreateWordService;

/**
 * Class GenerateWordDoc
 * @package Pis0sion\src\entity
 */
class GenerateWordDoc
{
    /**
     * @var string
     */
    protected $savePath;

    /**
     * 设置保存路径
     * @param string $savePath
     */
    public function setSavePath(string $savePath): void
    {
        $this->savePath = $savePath;
    }

    /**
     * 获取保存地址
     * @return string
     */
    public function getSavePath(): string
    {
        return $this->savePath;
    }

    /**
     * @param array $parameter
     * @param int $key
     * @param array $globalVars
     * @return string
     * @throws CopyFileException
     * @throws CreateTemporaryFileException
     * @throws \Throwable
     */
    public function create(array $parameter, int $key, array $globalVars = [])
    {
        /**
         * 创建word模板
         */
        $templateProcessor = CreateTemplateService::createTemplateFactory("tmpl.docx");
        $wordService = new CreateWordService($templateProcessor);

        /**
         * 渲染模板
         */
        $description = $this->achieveDescription($parameter["request"]);
        // 标题和更新时间
        $wordService->renderTextRun("TitleName", $parameter["name"]);

        $wordService->renderTextRun("UpTime", $parameter["update_dtime"]);
        // 渲染接口简介
        $wordService->renderTextRun("Description", $description);

        // 渲染基础信息
        $wordService->renderTextRun("DepState", $this->obtainMarkText($parameter));

        $wordService->renderTextRun("ReqUrl", $parameter["request"]["url"]);

        $wordService->renderTextRun("ReqMethod", $parameter["method"]);

        $wordService->renderTextRun("ReqContentType", $parameter["request"]["body"]["mode"]);

        // 是否含有全局参数
        list($gHeaderParams, $gBodyParams, $gQueryParams) = [$globalVars["header"] ?? [], $globalVars["body"] ?? [], $globalVars["query"] ?? []];

        /**
         * 渲染表格
         */
        $HBlock = $parameter['request']['header']['parameter'] ?? [];
        $HBlock = $this->mergeGlobalParameters($gHeaderParams, $HBlock);

        /**
         * query parameter
         */
        $QBlock = $parameter['request']['query']['parameter'] ?? [];
        $QBlock = $this->mergeGlobalParameters($gQueryParams, $QBlock);

        /**
         * body parameter
         */
        $BodyBlock = $parameter['request']['body']['raw_para'] ?? [];
        $BodyBlock = $this->mergeGlobalParameters($gBodyParams, $BodyBlock);

        /**
         * restful  parameter
         */
        $RestFulBlock = $parameter['request']['resful']['parameter'] ?? [];

        /**
         * response  parameter
         */
        $RespBlock = $parameter['response']['success']['parameter'] ?? [];

        //  批量渲染表格
        $wordService->multiRenderBlock(compact("HBlock", "QBlock", "BodyBlock", "RestFulBlock", "RespBlock"));

        //  渲染响应示例
        $respJson = $parameter['response']['success']['raw'] ?? "";
        $resp = $wordService->prettify($respJson);
        $wordService->renderTextRun("RespJson", $resp);

        //  设置生成文件的目录
        if (!is_dir($this->savePath)) {
            @mkdir($this->savePath);
        }
        $fileName = $key . "-" . $parameter["name"] . "-" . uniqid() . ".docx";
        $wordService->saveAs($this->savePath . "/" . $fileName);
        return $this->savePath;
    }

    /**
     * 获取描述
     * @param array $datumArr
     * @return string
     */
    protected function achieveDescription(array $datumArr): string
    {
        $description = $datumArr['description'] ?? "";
        if (trim($description) == "") {
            $description = DescriptionEnum::NOTFOUND;
        }
        return $description;
    }

    /**
     * 获取开发状态
     * @param array $markArr
     * @return string
     */
    protected function obtainMarkText(array $markArr): string
    {
        $markResult = DevelopStatusEnum::DEVELOP;
        if (trim($markArr["mark"]) == "modifying") {
            $markResult = DevelopStatusEnum::MODIFY;
        } elseif (trim($markArr["mark"]) == "complated") {
            $markResult = DevelopStatusEnum::COMPLETE;
        }
        return $markResult;
    }

    /**
     * 全局变量缺少 not_null 字段
     * @param array $globalParameters
     * @return array
     */
    protected function optimizeGlobalParameters(array $globalParameters): array
    {
        foreach ($globalParameters as $key => &$parameter) {
            $parameter["not_null"] = 1;
        }

        return $globalParameters;
    }

    /**
     * 合并全局参数
     * @param array $globalParameters
     * @param array $blockArr
     * @return array
     */
    protected function mergeGlobalParameters(array $globalParameters, array $blockArr): array
    {
        if (count($globalParameters) > 0) {
            $globalParameters = array_reverse($this->optimizeGlobalParameters($globalParameters));
            foreach ($globalParameters as $parameter) {
                array_unshift($blockArr, $parameter);
            }
        }
        return $blockArr;
    }
}