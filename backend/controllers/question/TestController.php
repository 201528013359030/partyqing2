<?php

namespace backend\controllers\question;

use Yii;
use yii\web\Controller;
use common\models\Curl;
class TestController extends Controller
{
    public function actionIndex()
    {   

        $fileclient =  new Curl();
        $path = "D:\PHPWeb\advanced\backend\controllers\question\push.bat";
        if (class_exists('\CURLFile')) {
            $field = array('upload' => new \CURLFile(realpath($path)));
        } else {
            $field = array('upload' => '@' . realpath($path));
        }
        $file = $fileclient->post("http://192.168.139.248/offline_media/offline_upload.php?group=0", $field);

        $filePath = json_decode($file,true);
        return $filePath;
    }
}
