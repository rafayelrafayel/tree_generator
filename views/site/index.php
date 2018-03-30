<?php

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Tree Generator';
?>
<div class="site-index">

    <div  class="container-fluid">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <?php
            $form        = ActiveForm::begin([
                    'id' => 'active-form',
                    'options' => [
                        'class' => 'changePass',
                        'enctype' => 'multipart/form-data',
                        'template' => '{label} <div class="row"><div class="col-md-4">{input}{error}{hint}</div></div>',
                    ],
            ]);
            echo $form->field($model, 'json_string')->textarea(['maxlength' => true,
                'rows' => 5])->label('Json String');
            ?>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><?=
                    \Yii::t('app', 'Process');
                    ?></button>
            </div>
            <?php ActiveForm::end(); ?>
            <div class="tree-container">
                <?php if ($message): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?= $message; ?>
                    </div>
                <?php endif; ?>
                <?= \app\helpers\TreeBuilder::bulid($json_array) ?>
            </div>
        </div>

    </div>
</div>
