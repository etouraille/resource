<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 27/09/14
 * Time: 16:54
 */

namespace OP\WriteBlog\Writer;


class Skyrock {

    protected $client;

    public function __construct()
    {
        $this->client = new \OP\Clients\Skyrock();
        $this->client->setAccessToken();
    }

    public function newPost($title,$content)
    {
        $this->client->getClient()->post(
            'https://api.skyrock.com/v2/blog/new_post.json',
            array('title'=>$title,'text'=>$content)
        );
    }

    public function newPage($title,$content)
    {
        $this->newPost($title,$content);
    }

}