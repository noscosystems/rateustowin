<?php
	use \application\components\helpers\Excel_XML;

	$xls = new Excel_XML();
	$xls->addArray($report);
	$xls->generateXML('excel');