<?php
return array(
	
	'open'=>array(//配置在表单中的键名 ,这个会是config[title]
        'title'=>'是否使用七牛进行存储',//表单的文字
        'type'=>'radio',		 //表单的类型：text、textarea、checkbox、radio、select等
        'options'=>array(
            '1'=>'是',
            '0'=>'否',
        ),
        'value'=>'0',
        'tip'=>'不开启则使用本地存储'
    ),
    'global'=>array(//配置在表单中的键名 ,这个会是config[title]
        'title'=>'空间性质',//表单的文字
        'type'=>'radio',		 //表单的类型：text、textarea、checkbox、radio、select等
        'options'=>array(
            '1'=>'公有空间',
            '0'=>'私有空间',
        ),
        'value'=>'1',
        'tip'=>'七牛上可设置空间为私有或者公有,公有空间效率更高'
    ),
   
                    'secrectKey'=>array(
                        'title'=>'secrectKey：',
                        'type'=>'text',
                        'value'=>'',
                        'tip'=>'七牛secrectKey',
                    ),
                    'accessKey'=>array(
                        'title'=>'accessKey：',
                        'type'=>'text',
                        'value'=>'',
                        'tip'=>'七牛accessKey',
                    ),
                    'domain'=>array(
                        'title'=>'domain：',
                        'type'=>'text',
                        'value'=>'',
                        'tip'=>'七牛domain',
                    ),
                     'bucket'=>array(
                        'title'=>'bucket：',
                        'type'=>'text',
                        'value'=>'',
                        'tip'=>'七牛bucket',
                    ),
          
);