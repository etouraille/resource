<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 27/09/14
 * Time: 16:54
 */

namespace OP\WriteBlog\Writer;


class Blogger {

    protected $idBlogger;
    protected $blogger;
    protected $client;


    public function __construct($idBlogger)
    {
        $this->idBlogger = $idBlogger;
        $this->client = new \OP\Clients\Google();
        $this->client->setAccessToken();
        $this->blogger = new \Google_Service_Blogger($this->client->getClient());
    }

    public function newPost($title,$content)
    {
        $myPost = new \Google_Service_Blogger_Post();
        $myPost->setTitle($title);
        $myPost->setContent($content);

        $this->blogger->posts->insert($this->idBlogger, $myPost); //post id needs here - put your blogger blog id
        $this->client->refreshToken();

    }

    public function newPage($title,$content)
    {
        $this->newPost($title,$content);
    }

}