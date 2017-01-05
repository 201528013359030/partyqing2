<?php

namespace common\models;

use Yii;

use yii\base\Model;
class Form extends Model
{
    public $formRules;
    public $formAttr;
    public $attrValue;

    public function __construct($formRules,$formAttr=[],$attrValue=[])
    {
    //  print_r($formRules);
        $this->formRules = $formRules;
        $this->formAttr = $formAttr;
        $this->attrValue = $attrValue;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return $this->formRules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return $this->formAttr;
    }
    public function __get($name) {
        if(isset($this->attrValue[$name])){
            return $this->attrValue[$name];
        }else{
            return ;
        }
    }
    public function __set($name,$value){
        $this->attrValue[$name]  = $value;
    }
}
?>