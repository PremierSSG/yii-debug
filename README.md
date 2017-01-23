# yii2-debug

This is an improved version of the official [yii2-debug](https://github.com/yiisoft/yii2-debug) module.

Adding duration column to debug index page

## Installation:

Install package via composer ```"premierssg/yii2-debug": "dev-master"```

## Usage:

```php
if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'premierssg\yii2\debug\Module',
        'allowedIPs' => ['*'],
    ];
}
```
