<?php


use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use Pis0sion\src\entity\GenerateWordDoc;
use Pis0sion\src\service\CreateZipArchiveService;

include_once "vendor/autoload.php";
// 防止文件deleteBlock 和 cloneBlock 失效
ini_set('pcre.backtrack_limit', 999999999999);

$list = [
    [
        'project_id' => '245570',
        'parent_id' => '2754389',
        'target_id' => '2754388',
        'name' => '新建接口1',
        'method' => 'POST',
        'mark' => 'developing',
        'target_type' => 'api',
        'update_day' => '1600099200',
        'update_dtime' => '2020-09-15 18:30:38',
        'sort' => '0',
        'request' =>
            [
                'target_id' => 2754388,
                'auth' =>
                    [
                        'type' => 'noauth',
                        'kv' =>
                            [
                                'key' => '',
                                'value' => '',
                            ],
                        'bearer' =>
                            [
                                'key' => '',
                            ],
                        'basic' =>
                            [
                                'username' => '',
                                'password' => '',
                            ],
                    ],
                'body' =>
                    [
                        'mode' => 'form-data',
                        'parameter' =>
                            [
                                0 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'pageasd',
                                        'value' => '',
                                        'not_null' => 1,
                                        'field_type' => '',
                                        'description' => 'page指的是分页',
                                    ],
                                1 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'dsda',
                                        'value' => 'a',
                                        'not_null' => 1,
                                        'field_type' => '',
                                        'description' => '',
                                    ],
                            ],
                        'raw' => '',
                        'raw_para' =>
                            [
                            ],
                    ],
                'description' => '根据用户id查询用户的接口信息',
                'event' =>
                    [
                        'pre_script' => '',
                        'test' => '',
                    ],
                'header' =>
                    [
                        'parameter' =>
                            [
                                0 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'accept',
                                        'value' => 'text/css,*/*;q=0.1',
                                        'not_null' => 1,
                                        'field_type' => '',
                                        'description' => '',
                                    ],
                                1 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'accept-encoding',
                                        'value' => 'gzip, deflate, br',
                                        'not_null' => 1,
                                        'field_type' => '',
                                        'description' => '',
                                    ],
                                2 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'accept-language',
                                        'value' => 'zh-CN,zh;q=0.9',
                                        'not_null' => 1,
                                        'field_type' => '',
                                        'description' => '',
                                    ],
                                3 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'cache-control',
                                        'value' => 'no-cache',
                                        'not_null' => 1,
                                        'field_type' => '',
                                        'description' => '',
                                    ],
                            ],
                    ],
                'query' =>
                    [
                        'parameter' =>
                            [
                            ],
                    ],
                'resful' =>
                    [
                        'parameter' =>
                            [
                            ],
                    ],
                'url' => 'https://echo.apipost.cn/get.php',
            ],
        'response' =>
            [
                'success' =>
                    [
                        'raw' => '{
	"err    code": 0,
	"errstr": "success",
	"post|1": {
		"pageasd": "",
		"dsda": "a"
	},
	"get|1": [],
	"request": {
		"pageasd": "",
		"dsda": "a"
	},
	"file": [],
	"put": "",
	"header": {
		"Host": "echo.apipost.cn",
		"Connection": "keep-alive",
		"Content-Length": "230",
		"Accept": "text/css,*/*;q=0.1",
		"Accept-Encoding": "gzip, deflate, br",
		"Content-Type": "multipart/form-data; boundary=----WebKitFormBoundaryWOePBT8dUNmQiFtX",
		"Cookie": "PHPSESSID=tb3s7a3a2fe0e1dk4hk8d9hgma",
		"Origin": "https://echo.apipost.cn",
		"User-Agent": "ApiPOST Runtime +https://www.apipost.cn",
		"Accept-Language": "zh-CN,zh;q=0.9",
		"Cache-Control": "no-cache",
		"Token-Global": "456"
	},
	"cookie": {
		"PHPSESSID": "tb3s7a3a2fe0e1dk4hk8d9hgma"
	}
}',
                        'parameter' =>
                            [
                                0 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'errcode',
                                        'value' => '0',
                                        'field_type' => 'Number',
                                        'description' => '',
                                    ],
                                1 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'errstr',
                                        'value' => 'success',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                2 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'post',
                                        'value' => '',
                                        'field_type' => 'Object',
                                        'description' => '',
                                    ],
                                3 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'post.pageasd',
                                        'value' => '',
                                        'field_type' => 'Object',
                                        'description' => '',
                                    ],
                                4 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'post.dsda',
                                        'value' => 'a',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                5 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'get',
                                        'value' => '{}',
                                        'field_type' => 'Object',
                                        'description' => '',
                                    ],
                                6 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'request',
                                        'value' => '',
                                        'field_type' => 'Object',
                                        'description' => '',
                                    ],
                                7 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'request.pageasd',
                                        'value' => '',
                                        'field_type' => 'Object',
                                        'description' => '',
                                    ],
                                8 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'request.dsda',
                                        'value' => 'a',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                9 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'file',
                                        'value' => '{}',
                                        'field_type' => 'Object',
                                        'description' => '',
                                    ],
                                10 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'put',
                                        'value' => '',
                                        'field_type' => 'Object',
                                        'description' => '',
                                    ],
                                11 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'header',
                                        'value' => '',
                                        'field_type' => 'Object',
                                        'description' => '',
                                    ],
                                12 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'header.Host',
                                        'value' => 'echo.apipost.cn',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                13 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'header.Connection',
                                        'value' => 'keep-alive',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                14 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'header.Content-Length',
                                        'value' => '230',
                                        'field_type' => 'Number',
                                        'description' => '',
                                    ],
                                15 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'header.Accept',
                                        'value' => 'text/css,*/*;q=0.1',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                16 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'header.Accept-Encoding',
                                        'value' => 'gzip, deflate, br',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                17 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'header.Content-Type',
                                        'value' => 'multipart/form-data; boundary=----WebKitFormBoundaryWOePBT8dUNmQiFtX',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                18 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'header.Cookie',
                                        'value' => 'PHPSESSID=tb3s7a3a2fe0e1dk4hk8d9hgma',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                19 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'header.Origin',
                                        'value' => 'https://echo.apipost.cn',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                20 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'header.User-Agent',
                                        'value' => 'ApiPOST Runtime +https://www.apipost.cn',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                21 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'header.Accept-Language',
                                        'value' => 'zh-CN,zh;q=0.9',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                22 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'header.Cache-Control',
                                        'value' => 'no-cache',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                23 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'header.Token-Global',
                                        'value' => '456',
                                        'field_type' => 'Number',
                                        'description' => '',
                                    ],
                                24 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'cookie',
                                        'value' => '',
                                        'field_type' => 'Object',
                                        'description' => '',
                                    ],
                                25 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'cookie.PHPSESSID',
                                        'value' => 'tb3s7a3a2fe0e1dk4hk8d9hgma',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                            ],
                    ],
            ],
    ],
    [
        'project_id' => '245570',
        'parent_id' => '2754389',
        'target_id' => '2754409',
        'name' => '新建接口3',
        'method' => 'POST',
        'mark' => 'developing',
        'target_type' => 'api',
        'update_day' => '1599494400',
        'update_dtime' => '2020-09-08 09:54:57',
        'sort' => '0',
        'request' =>
            [
                'target_id' => 2754409,
                'auth' =>
                    [
                        'type' => 'noauth',
                        'kv' =>
                            [
                                'key' => '',
                                'value' => '',
                            ],
                        'bearer' =>
                            [
                                'key' => '',
                            ],
                        'basic' =>
                            [
                                'username' => '',
                                'password' => '',
                            ],
                    ],
                'body' =>
                    [
                        'mode' => 'form-data',
                        'parameter' =>
                            [
                                0 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'page',
                                        'value' => '',
                                        'not_null' => 1,
                                        'field_type' => '',
                                        'description' => 'page指的是分页',
                                    ],
                                1 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'dsda1',
                                        'value' => 'a',
                                        'not_null' => 1,
                                        'field_type' => '',
                                        'description' => '',
                                    ],
                            ],
                        'raw' => '',
                        'raw_para' =>
                            [
                            ],
                    ],
                'description' => '',
                'event' =>
                    [
                        'pre_script' => '',
                        'test' => '',
                    ],
                'header' =>
                    [
                        'parameter' =>
                            [
                                0 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'accept',
                                        'value' => 'text/css,*/*;q=0.1',
                                        'not_null' => 1,
                                        'field_type' => '',
                                        'description' => '',
                                    ],
                                1 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'accept-encoding',
                                        'value' => 'gzip, deflate, br',
                                        'not_null' => 1,
                                        'field_type' => '',
                                        'description' => '',
                                    ],
                                2 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'accept-language',
                                        'value' => 'zh-CN,zh;q=0.9',
                                        'not_null' => 1,
                                        'field_type' => '',
                                        'description' => '',
                                    ],
                                3 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'cache-control',
                                        'value' => 'no-cache',
                                        'not_null' => 1,
                                        'field_type' => '',
                                        'description' => '',
                                    ],
                            ],
                    ],
                'query' =>
                    [
                        'parameter' =>
                            [
                            ],
                    ],
                'resful' =>
                    [
                        'parameter' =>
                            [
                            ],
                    ],
                'url' => 'https://echo.apipost.cn/post1.php',
            ],
        'response' =>
            [
                'success' =>
                    [
                        'raw' => '',
                        'parameter' =>
                            [
                            ],
                    ],
            ],
    ],
    [
        'project_id' => '245570',
        'parent_id' => '2754390',
        'target_id' => '2769390',
        'name' => '递归测试接口',
        'method' => 'POST',
        'mark' => 'developing',
        'target_type' => 'api',
        'update_day' => '1600012800',
        'update_dtime' => '2020-09-14 11:11:10',
        'sort' => '0',
        'request' =>
            [
                'target_id' => 2769390,
                'auth' =>
                    [
                        'type' => 'noauth',
                        'kv' =>
                            [
                                'key' => '',
                                'value' => '',
                            ],
                        'bearer' =>
                            [
                                'key' => '',
                            ],
                        'basic' =>
                            [
                                'username' => '',
                                'password' => '',
                            ],
                    ],
                'body' =>
                    [
                        'mode' => 'form-data',
                        'parameter' =>
                            [
                            ],
                        'raw' => '',
                        'raw_para' =>
                            [
                            ],
                    ],
                'description' => '',
                'event' =>
                    [
                        'pre_script' => '',
                        'test' => '',
                    ],
                'header' =>
                    [
                        'parameter' =>
                            [
                            ],
                    ],
                'query' =>
                    [
                        'parameter' =>
                            [
                            ],
                    ],
                'resful' =>
                    [
                        'parameter' =>
                            [
                            ],
                    ],
                'url' => 'http://47.95.15.38:8000/tree',
            ],
        'response' =>
            [
                'success' =>
                    [
                        'raw' => '{
	"code": 200,
	"result": [
		{
			"menu_id": "001",
			"pid": "000",
			"name": "系统管理",
			"children": [
				{
					"menu_id": "002",
					"pid": "001",
					"name": "菜单管理",
					"children": null
				},
				{
					"menu_id": "003",
					"pid": "001",
					"name": "配置管理",
					"children": [
						{
							"menu_id": "005",
							"pid": "003",
							"name": "规则列表",
							"children": null
						}
					]
				}
			]
		},
		{
			"menu_id": "006",
			"pid": "000",
			"name": "业务      受理",
			"children": [
				{
					"menu_id": "007",
					"pid": "006",
					"name": "移动故障单录入",
					"children": null
				}
			]
		}
	]
}',
                        'parameter' =>
                            [
                                0 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'code',
                                        'value' => '200',
                                        'field_type' => 'Number',
                                        'description' => '响应码',
                                    ],
                                1 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'result',
                                        'value' => '',
                                        'field_type' => 'Object',
                                        'description' => '',
                                    ],
                                2 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'result.menu_id',
                                        'value' => '001',
                                        'field_type' => 'Number',
                                        'description' => '',
                                    ],
                                3 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'result.pid',
                                        'value' => '000',
                                        'field_type' => 'Number',
                                        'description' => '',
                                    ],
                                4 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'result.name',
                                        'value' => '系统管理',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                5 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'result.children',
                                        'value' => '',
                                        'field_type' => 'Object',
                                        'description' => '',
                                    ],
                                6 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'result.children.menu_id',
                                        'value' => '002',
                                        'field_type' => 'Number',
                                        'description' => '',
                                    ],
                                7 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'result.children.pid',
                                        'value' => '001',
                                        'field_type' => 'Number',
                                        'description' => '',
                                    ],
                                8 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'result.children.name',
                                        'value' => '菜单管理',
                                        'field_type' => 'String',
                                        'description' => '',
                                    ],
                                9 =>
                                    [
                                        'is_checked' => 1,
                                        'type' => 'Text',
                                        'key' => 'result.children.children',
                                        'value' => '',
                                        'field_type' => 'Object',
                                        'description' => '',
                                    ],
                            ],
                    ],
            ],
    ],
];
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
        $compressService->downloadCompressFile();
    }

}











