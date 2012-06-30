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
			'Title' => "Tickets",
			'TicketsForm' => self::TicketsForm()
		));
		
	}
	/**
	 * Show the current open tickets
	 */	
	public function TicketsForm() {
	
	$config = GridFieldConfig::create();
	// Provide a header row with filter controls
	$config->addComponent(new GridFieldFilterHeader());
	// Provide a default set of columns based on $summary_fields
	$config->addComponent(new GridFieldDataColumns());
	// Provide a header row with sort controls
	$config->addComponent(new GridFieldSortableHeader());
	// Paginate results to 25 items per page, and show a footer with pagination controls
	$config->addComponent(new GridFieldPaginator(25));
	
	//@TODO - add some way of filtering via a search
	$filter = array('Status'=>'Open');
	
	$fields = new GridField("Tickets", "All Tickets", self::get_tickets($filter), $config);
	
	/*$tickets->setDisplayFields(array(
    'TicketNum' => 'Ticket #',
    'Title' => 'Summary',
    'Version.Title' => 'Version',
    'Status' => 'Status',
    'Priority' => 'Priority'
    		));*/
	
	
	return new Form("TicketForm", $this, new FieldSet($fields), new FieldSet());;
	}
	
	
}