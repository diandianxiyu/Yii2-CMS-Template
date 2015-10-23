<?php

namespace app\components\umengsdk\notification\android;

use app\components\umengsdk\notification\AndroidNotification;


class AndroidUnicast extends AndroidNotification {
	function __construct() {
		parent::__construct();
		$this->data["type"] = "unicast";
		$this->data["device_tokens"] = NULL;
	}

}