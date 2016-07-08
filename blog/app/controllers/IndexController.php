<?php
use Phalcon\Paginator\Adapter\NativeArray as PaginatorArr;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Mvc\Model\Criteria;


class IndexController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Blog');
        parent::initialize();
    }
    private function _getpv(){
        $pv = Article::find(array(
            "order" => "pv desc",
            "limit" => 10
        ))->toArray();
        foreach ($pv as &$val2) {
            $val2['title']=$this->_summary($val2['title'],17,$tail=' ...');
        }
        
        $this->view->pv = $pv;
    }

	
	private function _summary($str,$num,$tail=''){
	    static $charset='utf-8';
	    $str=ltrim(html_entity_decode(strip_tags($str),ENT_QUOTES,'utf-8'));
	    if(mb_strlen($str,$charset)<=$num){
	        return $str;
	    }
	    else{
	        return mb_substr($str,0,$num,$charset).$tail;
	    }
	}

    public function indexAction(){
    	$numberPage=1;
        $numberPage = $this->request->getQuery("page", "int");
        $rs = Article::find(array(
	        "order" => "time desc",
	    ))->toArray();
    
        foreach ($rs as &$val) {
        	$val['content']=$this->_summary($val['content'],200,$tail=' ......');
        }

        // 如何控制页码数为有效的？

	    $paginator = new PaginatorArr(array(
            "data"  => $rs,
            "limit" => 6,
            "page"  => $numberPage
        ));

        
        //热点排行
        // $pv = Article::find(array(
        //     "order" => "pv desc",
        //     "limit" => 10
        // ))->toArray();
        // foreach ($pv as &$val2) {
        //     $val2['title']=$this->_summary($val2['title'],17,$tail=' ...');
        // }

        // $this->view->pv = $pv;
        $this->_getpv();
        $this->view->page = $paginator->getPaginate();
    }

    public function searchAction(){
        $numberPage = 1;
        if ($this->request->isPost()) {
            if(!$this->request->getPost()['content']){
                return $this->forward("index/index");
            }
            $query = Criteria::fromInput($this->di, "Article", $this->request->getPost());
            $this->persistent->searchParams = $query->getParams();
            $parameters = array();
            if ($this->persistent->searchParams) {
                $parameters = $this->persistent->searchParams;
                // echo "<pre>";
                // print_r($query);
                // echo "</pre>";
            }
            $article = Article::find($parameters)->toArray();
            foreach ($article as &$val2) {
                $val2['content']=$this->_summary($val2['content'],200,$tail=' ......');
            }

            if (count($article) == 0) {
                $this->flash->notice("提示：未找到关键字为'".$this->request->getPost()['content']."'的博客");
                return $this->forward("index/index");
            }else{
                $paginator = new PaginatorArr(array(
                    "data"  => $article,
                    "limit" => 6,
                    "page"  => $numberPage,
                    "order" => "time desc"
                ));
                $this->_getpv();
                $this->view->page = $paginator->getPaginate();
            }

        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }
    }
}
