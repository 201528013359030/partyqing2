<?php
namespace common\models;
use common\models\Curl;
use common\models\IctWebService;
class WebService extends \yii\base\Component
{
	public $method;
	public $methodManage;

	function init(){
        $this->registerApi("auth.gettoken",
                "authGettoken",
                [
                "name"=>['type'=>'string'],
                "password"=>['type'=>'string'],
                "apiKey"=>['type'=>'string'],
                ],
                false
                );
    }

    public function run(){
    	if(!isset($this->methodManage[$this->method])){
            throw new \yii\web\HttpException(200,'Invalid method',20100);
    	}
        if(!$this->authAccessToken()){
            throw new \yii\web\HttpException(200,'Method call failed the API Authentication',20101);
        }
    	$parameter = $this->methodManage[$this->method]['parameter'];//获取注册的接口对应的参数--byfyq
    	$post = \Yii::$app->request->post();

    	//拼接接口对应的方法需要的参数
    	$parameterStr="";
		while ($key = key($this->methodManage[$this->method]['parameter'])) {
            if(!isset($post[$key])){
                if(isset($this->methodManage[$this->method]['parameter'][$key]['required'])){
                    if($this->methodManage[$this->method]['parameter'][$key]['required'] === false){
                        $evalStr = "$$key=".'$this->methodManage[$this->method]["parameter"][$key]["default"];';
                        eval($evalStr);
                        $parameterStr = $parameterStr."$$key,";
                        next($this->methodManage[$this->method]['parameter']);
                        continue;
                    }else{
                        throw new \yii\web\HttpException(200,"Missing parameter $key in method ".$this->method,20102);
                    }
                }else{
                   throw new \yii\web\HttpException(200,"Missing parameter $key in method ".$this->method,20102);
                }
            }
		 	$evalStr = "$$key=".'$post[$key];';
		 	eval($evalStr);
		 	$parameterStr = $parameterStr."$$key,";
		 	next($this->methodManage[$this->method]['parameter']);//数组指针指向数组中下一个元素
		}
		$parameterStr = substr($parameterStr,0,-1);//去掉参数中最后一个符号：”,“--byfyq
	//	return $parameterStr;
    	$runStr = '$return[\'data\'] = $this->'.$this->methodManage[$this->method]['method']."($parameterStr);";//构造字符串调用接口函数--byfyq
    	eval($runStr);//解析字符串，调用请求的接口函数，返回值放到：$return['data']中--byfyq
        $return['code']=-1;
    	return $return;
    }

    public function setMethod($method){
    	$this->method = $method;
    }
    public function getInput($paramsNmae){
        $post = \Yii::$app->request->post();
//        file_put_contents("/tmp/wx.log", date("D M d H:i:s Y") . " result:" . json_encode($post) ."\n", FILE_APPEND);
        if(isset($post[$paramsNmae])){
            return $post[$paramsNmae];
        }else{
            return false;
        }
    }

    public function registerApi($apiName,$method,$parameter,$auth=true){
    	if(isset($this->methodManage[$apiName])){
    		return 0;
    	}
    	$this->methodManage[$apiName]['method'] = $method;
    	$this->methodManage[$apiName]['parameter'] = $parameter;
    	$this->methodManage[$apiName]['auth'] = $auth;
    }
    public function authAccessToken(){
        if($this->methodManage[$this->method]['auth']){
    	    $post = \Yii::$app->request->post();
            $info = $post["info"];
            $info = json_decode($info, true);
            $model = new IctWebService();
            if($model->authToken($info["uid"], $info["auth_token"])){
                return 1;
            }else{
                return 0;
            }
        }
        return 1;
    }
}

?>
