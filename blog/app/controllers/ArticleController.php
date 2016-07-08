<?php
use Phalcon\Paginator\Adapter\NativeArray as Paginator;
class articleController extends ControllerBase
{
    public function initialize(){
        $this->tag->setTitle('Blog');
        parent::initialize();
    }


    public function indexAction(){
        if($this->request->isPost()){
        	$title=$this->request->getPost('title', array('string', 'striptags'));
        	$content=$this->request->getPost('content');

        	$article= new Article();
        	$article->title=$title;
        	$article->content=str_replace("\n","<br>",$content);
        	$article->username=$this->session->get("auth")['name'];
        	$article->time=time();

        	if ($article->save() == false) {
                foreach ($user->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                $this->flash->success('发布成功！');
                return $this->forward('index/index');
            }

        }
    }

    public function detailAction($id){

        $article = Article::findFirst($id);
        if (!$article) {
            $this->flash->error("出错啦！");
            return $this->forward("index/index");
        }
        $article->pv=$article->pv+1;
        $article->save();

        $pv = Article::find(array(
            "order" => "pv desc",
            "limit" => 10
        ))->toArray();
        foreach ($pv as &$val2) {
            $val2['title']=$this->_summary($val2['title'],17,$tail=' ...');
        }
        
        $this->view->pv = $pv;
        $this->view->article=$article;
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

    public function managementAction(){
        $numberPage=1;
        $rs = Article::find(array(
            "username" => $this->session->get("auth")['name'],
            "order" => "time desc",
        ))->toArray();
    
        foreach ($rs as &$val) {
            $val['content']=$this->_summary($val['content'],200,$tail=' ......');
        }

        $paginator = new Paginator(array(
            "data"  => $rs,
            "limit" => 10,
            "page"  => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    public function delAction($id){
        $article = new Article();
        $article->id = $id;
        $ret = $article->delete();
        if ($ret) {
            $this->flash->success("删除成功！");
            return $this->forward("article/management");
        } else {
            $this->flash->error("删除失败");
            return $this->forward("article/management");
        }

    }

    public function alterAction($id=""){
        if(!$this->request->isPost()){
            $article = Article::find($id)->toArray();
            if (!$article) {
                $this->flash->error("警告！查找失败！");
                return $this->forward("article/management");
            }else{
                $this->tag->setDefault('title', $article[0]['title']);
                $this->tag->setDefault('content', $article[0]['content']);
                $this->tag->setDefault('id', $id);
            }
        }else{
            $article = Article::findFirst($this->request->getPost('id'));
            $article->title = $this->request->getPost('title', array('string', 'striptags'));
            $article->content=$this->request->getPost('content');
            // print_r($article->id);
            // print_r($article->title);
            // print_r($article->content);
            // exit();
            $ret = $article->save();

            if ($ret) {
                $this->flash->success("修改成功！");
                return $this->forward("article/management");
            } else {
                $this->flash->error("修改失败");
                return $this->forward("article/management");
            }

        }

    }


}
