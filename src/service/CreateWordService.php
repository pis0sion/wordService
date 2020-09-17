<?php


namespace Pis0sion\src\service;

use PhpOffice\PhpWord\TemplateProcessor;

/**
 * Class CreateWordService
 * @package Pis0sion\src\service
 */
class CreateWordService
{
    /**
     * @var array
     */
    protected $configure;

    /**
     * @var TemplateProcessor
     */
    protected $template;

    /**
     * CreateWordService constructor.
     * @param TemplateProcessor $template
     */
    public function __construct(TemplateProcessor $template)
    {
        $this->template = $template;
        $this->configure = [
            "HBlock" => [
                "HParams" => "key",
                "HExample" => "value",
                "HBool" => false,    // true 代表必填项
                "HDesc" => "description",
            ],
            "QBlock" => [
                "QParams" => "key",
                "QExample" => "value",
                "QBool" => false,   // false  需要验证是否是not_null
                "QDesc" => "description",
            ],
            "BodyBlock" => [
                "BOParams" => "key",
                "BOExample" => "value",
                "BOBool" => false,
                "BODesc" => "description",
            ],
            "RestFulBlock" => [
                "RestParams" => "key",
                "RestExample" => "value",
                "RestBool" => true,
                "RestDesc" => "description",
            ],
            "RespBlock" => [
                "RespParams" => "key",
                "RespExample" => "value",
                "RespType" => "field_type",
                "RespDesc" => "description",
            ],
        ];
    }

    /**
     * 渲染文本模板
     * @param string $key
     * @param string $value
     */
    public function renderTextRun(string $key, string $value)
    {
        $this->template->setValue($key, $value);
    }

    /**
     * 渲染复杂模板
     * @param string $key
     * @param  $value
     */
    public function renderComplexValue(string $key, $value)
    {
        $this->template->setComplexValue($key, $value);
    }

    /**
     * 渲染表格
     * @param array $params
     * @param string $block_name
     * @throws \Throwable
     */
    protected function renderTable(array $params, string $block_name)
    {
        try {
            $count = count($params);
            $this->template->cloneBlock($block_name);
            $structures = $this->getFirstRowNameByBlock($block_name);
            $this->template->cloneRow(key($structures), $count);
            for ($j = 0; $j < $count; $j++) {
                foreach ($structures as $key => $structure) {
                    if (is_bool($structure)) {
                        // 字段可选填
                        if ($structure === true) {
                            $this->template->setValue($key . "#" . ($j + 1), "必填");
                        } else {
                            $this->template->setValue($key . "#" . ($j + 1), $this->filterNotNull($params[$j]));
                        }
                    } else {
                        if ($structure == "description" && trim($params[$j][$structure]) == "") {
                            $this->template->setValue($key . "#" . ($j + 1), "暂无描述");
                        } else {
                            $this->template->setValue($key . "#" . ($j + 1), $params[$j][$structure]);
                        }
                    }
                }
            }
        } catch (\Throwable $throwable) {
            throw $throwable;
        }
    }

    /**
     * @param string $block_name
     * @return array
     */
    protected function getFirstRowNameByBlock(string $block_name): array
    {
        return $this->configure[$block_name];
    }

    /**
     * @param array $parameter
     * @return string
     */
    protected function filterNotNull(array $parameter): string
    {
        $flagString = "必填";
        $result = $parameter["not_null"] ?? 0;
        if ($result == false) {
            $flagString = "选填";
        }
        return $flagString;
    }

    /**
     * @param string $filePath
     */
    public function saveAs(string $filePath)
    {
        $this->template->saveAs($filePath);
    }

    /**
     * @param string $block_name
     */
    public function deleteBlock(string $block_name)
    {
        $this->template->cloneBlock($block_name, 0);
    }

    /**
     * @param array $parameter
     * @param string $block_name
     * @throws \Throwable
     */
    protected function renderBlock(array $parameter, string $block_name)
    {
        if ($parameter) {
            $this->renderTable($parameter, $block_name);
        } else {
            $this->deleteBlock($block_name);
        }
    }

    /**
     * @param array $parameters
     * @throws \Throwable
     */
    public function multiRenderBlock(array $parameters): void
    {
        foreach ($parameters as $key => $parameter) {
            $this->renderBlock($parameter, $key);
        }
    }

    /**
     * @param string $regex
     * @return string
     */
    public function prettify(string $regex): string
    {
        // 验证是否为json数据
        $originStr = json_decode($regex, true);
        if ($originStr == false || $originStr == null) {
            return "null";
        }

        // json 数据做美化
        $regex = json_encode($originStr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        return str_replace(array("\r\n", "\r", "\n"), "<w:br />" . "\r", $regex);
    }
}