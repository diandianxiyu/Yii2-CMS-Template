<?php
namespace app\components\pic2sdk;

use Yii;
use app\components\pic2sdk\AlibabaImage;
use app\components\pic2sdk\utils\UploadPolicy;

/**
 * 上传图片文件集成化
 */
class  ImgUpload{
    
    /**
     * 上传文件到图片处理服务
     * @param string $localpath 本地的地址
     * @param string $filename 文件名
     * @param string $updir 上传到的文件夹
     * @param string $namespace 上传到的命名空间
     */
    public static function upload($localpath,$filename,$updir='images',$namespace='42d43976cb4e9c09'){
        $ak = Yii::$app->params['wantu_ak'];   // app key 
        $sk = Yii::$app->params['wantu_sk']; // secret key
        //return ['ak'=>$ak,'sk'=>$sk];
        $image  = new AlibabaImage($ak, $sk, "TOP" /*$upload_endpoint, $manage_endpoint*/);
        $uploadPolicy = new UploadPolicy();
        $uploadPolicy->dir = $updir;    // 
        $uploadPolicy->name = $filename;  // 文件名不能包含"/"
        $uploadPolicy->namespace= $namespace; // type =TOP 必填
        //$uploadPolicy->bucket= 'xxxxxxx'; // type =CLOUD 必填

        // 小文件上传
        $res = $image->upload($localpath, $uploadPolicy, $opts = array());
         return $res;
        return $res['url'];
    }
}
