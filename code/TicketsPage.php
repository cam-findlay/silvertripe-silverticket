<?php

class TicketsPage extends Page_Controller{
	/**
	 * @var string The URL segment that will point to this controller
	 */
	public static $url_segment;
	
	public static $allow_actions = array('index','show','add','edit','delete');
	
	/**
	 * Set the url for this controller and register it with {@link Director}
	 * @param string $url The URL to use
	 * @param $priority The priority of the URL rule
	 */
	public static function set_url($url, $priority = 50) {
		self::$url_segment = $url;
		Director::addRules($priority,array(
			$url => 'TicketsPage'
		));	
	}
	
	
	
	public function init(){
		parent::init();
		
	}
	
	public static function get_tickets($filter = null) {
		$tickets = Ticket::get();
		if($filter) $tickets->filter($filter);
		
		//@TODO - allow a cutom sort parameter via a search
		$tickets->sort('ID DESC');
		
		
		return $tickets;
	}
	
	public function index(){
		
		return $this->render(array(
			'Title' => "Tickets"
			
			));
		
	}
	/**
	 * Show the current open tickets
	 */	
	public function Tickets() {
	$filter = array("Status"=>"Open");
	return self::get_tickets($filter);
	
    
    
    
 
	}
	
	
}