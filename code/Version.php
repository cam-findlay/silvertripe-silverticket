<?php
class Version extends DataObject {
    static $db = array(
        'Title' => 'Varchar(200)',
    );

    static $has_many = array(
        'Tickets' => 'Ticket'
    );
}