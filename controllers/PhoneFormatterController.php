<?php

namespace app\controllers;

use app\models\PhoneListForm;
use Yii;
use yii\web\Controller;
use app\components\PhoneNormalizer;
use yii\web\UploadedFile;

class PhoneFormatterController extends Controller
{

    public function actionIndex()
    {
        $phoneListForm = new PhoneListForm();

        return $this->render('form', [
            'phoneListForm' => $phoneListForm,
        ]);
    }

    public function actionNormalizePhoneNumbers()
    {
        $phoneListForm = new PhoneListForm();

        $normalizedPhoneNumbers = [];

        if (Yii::$app->request->isPost) {
            $phoneListForm->csvList = UploadedFile::getInstance($phoneListForm, 'csvList');
            if ($phoneListForm->upload()) {
                $file = fopen('uploads/' . $phoneListForm->csvList->name, 'r');
                fgetcsv($file);
                while (($data = fgetcsv($file)) !== false) {
                    $normalizedPhoneNumber = PhoneNormalizer::normalizePhoneNumber($data[0], $data[1]);
                    $normalizedPhoneNumbers[] = $normalizedPhoneNumber;
                }
            }
        }

        return json_encode($normalizedPhoneNumbers);
    }
}