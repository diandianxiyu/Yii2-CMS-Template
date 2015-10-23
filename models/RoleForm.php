<?php

namespace app\models;

use Yii;
use app\models\AuthItem;
use yii\rbac\Item;


class RoleForm extends AuthItem
{
	
    public function init() {

        parent::init();
        $this->type = Item::TYPE_ROLE;

    }

}
