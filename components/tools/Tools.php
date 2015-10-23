<?php

namespace app\components\tools;

use Yii;
use app\components\pic2sdk\ImgUpload;
use Aliyun\OSS\OSSClient;

class Tools {

    public static function upthumburl($uploadFile, $path = 'img') {
        if ($uploadFile->error == 0) {
            $filename = explode(".", $uploadFile->name);
            $data = date("Y", time()) . '/' . date("m", time()) . '/' . date("d", time()) . '/';
            $save_path = "../uploads/$data";
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $namef = md5(uniqid(rand(), true)) . '.' . end($filename);
            $savePath = $save_path . $namef;
            $img_full_path = str_replace("..", "", Yii::$app->basePath . $save_path . $namef);
            $uploadFile->saveAs($savePath);
            $file_url = ImgUpload::upload($img_full_path, $namef, $path, Yii::$app->params['namespace']);
            @unlink($savePath);
            return $file_url;
        }
    }

    public static function upthumb($uploadFile) {
        if ($uploadFile->error == 0) {
            $filename = explode(".", $uploadFile->name);
            $data = date("Y", time()) . '/' . date("m", time()) . '/' . date("d", time()) . '/';
            $save_path = "../uploads/$data";
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $namef = md5(uniqid(rand(), true)) . '.' . end($filename);
            $savePath = $save_path . $namef;
            $img_full_path = str_replace("..", "", Yii::$app->basePath . $save_path . $namef);
            $uploadFile->saveAs($savePath);
            $ossClient = OSSClient::factory([
                        'AccessKeyId' => Yii::$app->params['keyId'],
                        'AccessKeySecret' => Yii::$app->params['keySecret'],
                        'Endpoint' => Yii::$app->params['Endpoint'],
            ]);
            $key = $namef;  
            $ossClient->putObject([
                'Bucket' => Yii::$app->params['classPicBucket'],
                'Key' => $key,
                'Content' => fopen($img_full_path, 'r'),
                'ContentLength' => filesize($img_full_path)
            ]);
            $ossUrl = "http://" . Yii::$app->params['classPicBucket'] . ".oss-cn-qingdao.aliyuncs.com/" . $key;
            return $ossUrl;
        }
    }

}
