<?php

	try {
		$x = 8;
	} catch (Exception $e) {
		echo $this->getMessage($e);
	}

	echo $x;