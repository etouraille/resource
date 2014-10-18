<?php
/**
 * Created by PhpStorm.
 * User: etouraille
 * Date: 29/09/14
 * Time: 11:38
 */

namespace OP\WriteBlog\Content;


use OP\Model\PhraseAncre;
use OP\Model\PhraseClef;
use OP\Model\PhraseNeutre;

class Main {

    protected $idLanguageTitle;
    protected $neutralSentenceNumber;
    protected $anchorPosition;
    protected $idClient;
    protected $isBlank;

    protected $content;
    protected $title;


    public function __construct($idLanguageTitle,
                                $neutralSentenceNumber,
                                $anchorPosition,
                                $idClient,
                                $isBlank)
    {

            $this->idLanguageTitle = $idLanguageTitle;
            $this->idClient=$idClient;
            $this->neutralSentenceNumber=$neutralSentenceNumber;
            $this->anchorPosition=$anchorPosition;
            $this->isBlank=$isBlank;

            $this->setTitle();
            $this->setContent();
    }

    protected function getRandomRowAndSetUsed( $model,$idLanguage,$idClient = null )
    {

        $cond = array('used'=>0,'idLanguage'=>$idLanguage);
        if(isset($idClient))
        {
            $cond['idClient'] = $idClient;
        }
        $data = $model->getRows($cond);
        if(count($data) == 0)
        {
            $condUpdate = $cond;
            unset($condUpdate['used']);
            $model->update(array('used'=>0),$condUpdate);
            $data = $model->getRows($cond);
        }
        //mise à jour du compteur
        $n = count($data);
        $rand = rand(0,$n-1);
        $row = $data[$rand];
        $count = $data[$rand]['count'];
        $count++;

        //mise a jour
        $model->update(array('used'=>1,'count'=>$count),array('id'=>$row['id']));
        return $row;
    }

    protected function setTitle()
    {
        $model = new \OP\Model\Titre();
        $row = $this->getRandomRowAndSetUsed($model,$this->idLanguageTitle);
        $this->title = $row['phrase'];
    }

    protected function getClef($idLanguage,$idClient,$isBlank){
        $rowAncre = $this->getRandomRowAndSetUsed(new PhraseAncre(),$idLanguage);
        $rowClef = $this->getRandomRowAndSetUsed(new PhraseClef(),$idLanguage,$idClient);
        $phrase = $rowAncre['phrase'];
        $clef = $rowClef['phrase'];
        $url = $rowClef['url'];
        $blank = '';
        if($isBlank){
            $blank = ' target="_blank" ';
        }
        $link = sprintf('<a href="%s" %s>%s</a>',$url,$blank,$clef);
        return str_replace('[XXXXXX]',$link,$phrase);
    }

    protected function setContent()
    {
        $tab = array();
        $neutralModel = new PhraseNeutre();
        for($i=1;$i<= $this->neutralSentenceNumber;$i++)
        {
            $rowNeutral = $this->getRandomRowAndSetUsed($neutralModel,$this->idLanguageTitle);
            $tab[] = $rowNeutral['phrase'];
            if($this->anchorPosition == $i)
            {
                $tab[] = $this->getClef($this->idLanguageTitle,$this->idClient,$this->isBlank);
            }
        }
        $content = '';
        foreach($tab as $phrase){
            $content .= $phrase;
        }
        $this->content = $content;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent(){
        return $this->content;
    }

} 