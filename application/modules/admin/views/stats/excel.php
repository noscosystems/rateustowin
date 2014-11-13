<?php
	use \application\components\helpers\Excel_XML;

	$xls = new Excel_XML();
	$xls->XlsAttr($headerArray, $report, 'results - '.date('d-m-Y H-i'));
	