<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 28/09/14
 * Time: 16:54
 */

namespace OP\WriteBlog\Writer;

require __DIR__.'/../../xmlrpc/xmlrpc.inc';
require __DIR__.'/../../xmlrpc/xmlrpc_wrappers.inc';
require __DIR__.'/../../xmlrpc/xmlrpcs.inc';

class OverBlog {

    protected $login;
    protected $password;

    public function __construct($login,$password)
    {
        $this->login = $login;
        $this->password = $password;


    }

    public function newPost($title,$content)
    {
        $curl = new \Curl\Curl();
        $curl->setHeader('content-type','text/xml');
        $curl->post('http://api.over-blog.com/mw',urlencode($this->getXml($title,$content)));
        var_dump($curl->response);
    }

    public function newPage($title,$content)
    {

    }

    public function getXml($title,$content)
    {

        $chaine = '<?xml version="1.0" encoding="utf-8"?>';
        $chaine.= '<methodCall>';
        $chaine .= '<methodName>metaWeblog.newPost</methodName>
                    <params>
                         <param><value><integer>1</integer></value></param>
                         <param><value><string>'.$this->login.'</string></value></param>
                         <param><value><string>'.$this->password.'</string></value></param>';
        $chaine .=      '<param>
                              <struct>
                                    <member>
                                        <name>title</name>
                                        <value><string>'.$title.'</string></value>
                                    </member>
                                    <member>
                                        <name>description</name>
                                        <value><string>'.$content.'</string></value>
                                    </member>
                                    <member>
                                        <name>categories</name>
                                        <value>
                                            <array>
                                                <data>
                                                    <value>Categorie</value>
                                                </data>
                                            </array>
                                        </value>
                                    </member>
                                </struct>
                          <param><value><string>'.$this->password.'</string></value></param>';
        $chaine.= '</params>';

        $tab = array();
        $tab[] = new \xmlrpcval(1,'int');
        $tab[] = new \xmlrpcval($this->login,'string');
        $tab[] = new \xmlrpcval($this->password,'string');
        $tab[] = new \xmlrpcval(
            array(
                'title'=>new \xmlrpcval($title,'string'),
                'description'=>new \xmlrpcval($content,'string'),
                'categories'=>
                    new \xmlrpcval(array(new \xmlrpcval('Categorie')),'array')
            ),'struct');
        $tab[]= new \xmlrpcval(1,'int');

        $tab = array();
        $tab[] = new \xmlrpcval(0,'int');
        $tab[] = new \xmlrpcval($this->login,'string');
        $tab[] = new \xmlrpcval($this->password,'string');


        $f=new \xmlrpcmsg('metaWeblog.newPost',
            $tab
        );


        $f=new \xmlrpcmsg('blogger.getUsersBlogs',$tab


        );
        /*
        $f->addParam(new \xmlrpcval(1,'int'));
        $f->addParam(new \xmlrpcval($this->login,'string'));
        $f->addParam(new \xmlrpcval($this->password,'string'));
        */
        print "<pre>Sending the following request:\n\n" . htmlentities($f->serialize()) . "\n\nDebug info of server data follows...\n\n";
        $c=new \xmlrpc_client("/mw", 'api.over-blog.com', 80);
        $c->setDebug(3);
        $f->request_charset_encoding = 'UTF-8';
        $r=&$c->send($f);

        if(!$r->faultCode())
        {
            $v=$r->value();
            print "</pre><br/>State number " . $stateno . " is "
                . htmlspecialchars($v->scalarval()) . "<br/>";
// print "<HR>I got this value back<BR><PRE>" .
// htmlentities($r->serialize()). "</PRE><HR>\n";
        }
        else
        {
            print "An error occurred: ";
            print "Code: " . htmlspecialchars($r->faultCode())
                . " Reason: '" . htmlspecialchars($r->faultString()) . "'</pre><br/>";
        }



    }


    function getDigest($pass)
    {
    $date = date('Y-m-d\TH:i:s+00:00');
    $nonce = md5(time());
    $chaine = '/DIGEST/'.$date.'/'.$nonce.'/'.md5($date.md5($pass).$nonce);
    return $chaine;
    }
}

