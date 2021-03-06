<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var yii\widgets\ActiveForm       $form
 * @var dektrium\user\models\Profile $profile
 */

?>

<?= $form->field($profile, 'name') ?>
<?= $form->field($profile, 'public_email') ?>
<?= $form->field($profile, 'website') ?>
<?php // echo $form->field($profile, 'location') Remarked By Harlan ?>

<!--Added By Harlan-->
<?php
//If the creator has a location assigned he will not be able
//to change the location of users.
if(\Yii::$app->user->identity->profile->location){     
     if(isset($profile->locationMod)){
          echo $form->field($profile->locationMod, 'pin_prison_institute_name')->textInput(['readonly' => true]);
     }
}
else{
     echo $form->field($profile, 'location')->dropDownList(
              \yii\helpers\ArrayHelper::map(app\models\PrisonInstitute::find()->all(), 'pin_id', 'pin_prison_institute_name'),           // Flat array ('id'=>'label')
                 ['prompt'=>'--All Institutes--',
                     ]    // options
             );      
}
?>
<!--~~~~~~~~~~~~~~~~~~-->

<?= $form->field($profile, 'gravatar_email') ?>
<?= $form->field($profile, 'bio')->textarea() ?>
