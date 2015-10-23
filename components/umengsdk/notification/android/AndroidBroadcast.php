<?php

namespace app\components\umengsdk\notification\android;

use app\components\umengsdk\notification\AndroidNotification;

class AndroidBroadcast extends AndroidNotification {
	function  __construct() {
		parent::__construct();
		$this->data["type"] = "broadcast";
	}
}