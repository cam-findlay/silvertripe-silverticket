<?php

$dir = basename(rtrim(dirname(__FILE__),'/'));
// Check directory
if($dir != "silverticket") {
	user_error(sprintf(
		_t('Messages.WRONGDIRECTORY','The Postale module must be in a directory named "silverticket" (currently "%s")'),
		$dir
	), E_USER_ERROR);
}


TicketsPage::set_url('tickets');