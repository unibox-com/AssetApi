<?php
namespace Opr\Controller;
use Think\Controller;
use Common\Common;

class EmptyController extends Controller {

    public function index() {
        redirect('/index.html');
    }
}
