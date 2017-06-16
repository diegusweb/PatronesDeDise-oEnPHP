<?php

/**
 * Created by PhpStorm.
 * User: ideasoft
 * Date: 6/16/2017
 * Time: 5:23 PM
 * we need  to consider the use of the facade pattern in those cases that
 * the code that we want to use consist of too many clases and methods
 * and all we want is a simple interface preferably one method that can do
 * all the job for us
 */
class shareFacade
{
    // Holds a reference to all of the classes.
    protected $twitter;
    protected $google;
    protected $reddit;

    // The objects are injected to the constructor.
    public function __construct($twitter, $google, $reddit)
    {
        $this->twitter = $twitter;
        $this->google = $google;
        $this->reddit = $reddit;
    }

    public function shared($url, $title, $status)
    {
        $this->twitter->tweet($status, $url);
        $this->google->share($url);
        $this->reddit->reddit($url, $title);
    }
}


// Class to tweet on Twitter.
class CodeTwit {
    function tweet($status, $url)
    {
        var_dump('Tweeted:'.$status.' from:'.$url);
    }
}

// Class to share on Google plus.
class Googlize {
    function share($url)
    {
        var_dump('Shared on Google plus:'.$url);
    }
}

// Class to share in Reddit.
class Reddiator {
    function reddit($url, $title)
    {
        var_dump('Reddit! url:'.$url.' title:'.$title);
    }
}

//Create the onjects from the classes
$twitterOnj = new CodeTwit();
$gooleObj = new Googlize();
$redditObj = new Reddiator();

// Pass the objects to the class facade object.
$shareObj = new shareFacade($twitterOnj, $gooleObj, $redditObj);

$shareObj->shared('http://myBlog.com/post-awsome','My greatest post','Read my greatest post ever.');
