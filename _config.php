<?php

$dir = basename(rtrim(dirname(__FILE__),'/'));
// Check directory
if($dir != "silverticket") {
	user_error(sprintf(
		_t('Messages.WRONGDIRECTORY','The Postale module must be in a directory named "silverticket" (currently "%s")'),
		$dir
	), E_USER_ERROR);
}


// Check dependencies
if(!class_exists("TagField")) {
	user_error(_t('Messages.DATAOBJECTMANAGER','The Postale module requires TagField'),E_USER_ERROR);
}

TicketsPage::set_url('tickets');