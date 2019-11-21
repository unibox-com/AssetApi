<?php
/**
 * US Product 环境配置
 */
return array(
    'WWW_ADDRESS' => 'http://asset.zipcodexpress.com',
    'CDN_ADDRESS' => 'http://cdn.zipcodexpress.com/',
    'WWW_DOMAIN' => 'asset.zipcodexpress.com',
    'DOWNLOAD_APP_ADDRESS' => '/app',

    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'rm-0xi0r5r5itzv41f5o.mysql.rds.aliyuncs.com', // 服务器地址,美国RDS
    'DB_NAME'   => 'zpxasset', // 数据库名
    'DB_USER'   => 'unibox', // 用户名
    'DB_PWD'    => 'U-N-I-B-O-X_123',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => '', // 数据库表前缀

    'PUBLIC_PATH' => '/data1/app/AssetApi/Public/',
    'APPLICATION_PATH' => '/app/AssetApi/Application/',

    'UNIBOX_LOG_PATH' => '/data1/logs/weblog/AssetApi/',

    'memcache_config'  => array(
        'type'     => 'memcached',
        'servers'  => array(array('172.22.0.2','7036')),
        'prefix'   => 'asset_',
        'expire'   => 600,
    ),

    'redis_config' => array(
        'type' => 'redis',
        'host' => '172.22.0.2',
        'port' => 6389,
        'prefix'   => 'asset_',
    ),

    'oss_bucket' => 'unibox-us',

    //邮件配置
    'SMTP_SERVER' =>'hwsmtp.exmail.qq.com',                   //邮件服务器
    'SMTP_PORT' =>465,                              //邮件服务器端口
    'SMTP_USER_EMAIL' =>'notification@unibox.com.cn',   //SMTP服务器的用户邮箱(一般发件人也得用这个邮箱)
    'SMTP_USER'=>'notification@unibox.com.cn',          //SMTP服务器账户名
    'SMTP_PWD'=>'UniBox12345',                           //SMTP服务器账户密码
    'SMTP_MAIL_TYPE'=>'HTML',                       //发送邮件类型:HTML,TXT(注意都是大写)
    'SMTP_TIME_OUT'=>10,                            //超时时间
    'SMTP_AUTH'=>true,                              //邮箱验证(一般都要开启)
    'SMTP_SSL'=>false,

    //Xinge
    'XG_ACCESS_ID_IOS' => '2200268639',
    'XG_ACCESS_KEY_IOS' => 'I3MVLZF8738W',
    'XG_SECRET_KEY_IOS' => '3fe94d734cf89652ee70280afa7ea441',

    'XG_ACCESS_ID_ANDROID' => '2100268641',
    'XG_ACCESS_KEY_ANDROID' => 'A6P73LN27FCB',
    'XG_SECRET_KEY_ANDROID' => '8ba3939e65b48c409d915449f36a5795',

    // 加载扩展配置文件 !多个文件中间用 逗号 隔开，但是不能有空格
    'LOAD_EXT_CONFIG' => 'paypal_product,authorize_product',
    //国家代码
    COUTRYCODE=>'1',
);
