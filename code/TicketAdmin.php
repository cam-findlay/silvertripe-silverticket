<?php
class TicketAdmin extends ModelAdmin {
	public static $managed_models = array('Ticket','Component','Version');	
	
	static $url_segment = 'tickets';
	
	static $menu_title = 'Tickets';

	
	
	}