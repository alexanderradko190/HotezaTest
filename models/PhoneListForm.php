<?php

namespace app\models;

use yii\base\Model;

class PhoneListForm extends Model
{
    public $csvList;

    public function rules()
    {
        return [
            [['csvList'], 'file', 'skipOnEmpty' => false, 'extensions' => 'csv'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->csvList->saveAs('uploads/' . $this->csvList->baseName . '.' . $this->csvList->extension);
            return true;
        } else {
            return false;
        }
    }
}