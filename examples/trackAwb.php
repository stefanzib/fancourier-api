<?php
// initialize examples instance and autoloader
require __DIR__.'/_init.php';

// create a new request object
$request = new Fancourier\Request\TrackAwb();
$request
	->addAwb('2339300120170')
    ->setLanguage('ro');

/*
Functions in TrackAwb REQUEST (only the set* functions are shown, the get* functions simply return the set values)
->addAwb($awb)
->setAwb($awb)	// alias for addAwb()
->resetAwbs()	// clear currently added awb numbers
->setLanguage()	// set the language "ro" or "en"
*/

$response = $fan->trackAwb($request);

/*
Functions in TrackAwb RESPONSE (only get* functions are available)
->getData() 		// returns the unprocessed response of the API as an array (available in all response objects)
->getAll() 			// returns an array of AwbTracker objects
->getAwb($awbNo) 	// returns the AwbTracker object for the specified awb number
*/

if ($response->isOk()) {
    print_r($response->getData());
    echo '<pre>'. print_r($response->getAll(), 1) . '</pre>';
} else {
    var_dump($response->getErrorMessage());
}

/*
The AwbTracker object has the following functions:
->getAwbNumber()
->getReturnAwbNumber()
->getRedirectionAwbNumber()
->getReimbursementAwbNumber()
->getOpodAwbNumber()
->getMessage()
->getContent()
->hasConfirmation()
->getConfirmation()
->getOTD()
->getEvents()
->getStatus()
*/