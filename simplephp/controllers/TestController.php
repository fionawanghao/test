<?php
include_once SIMPLEPHP_PATH .'/SimpleView.php';
class TestController
{
	public function testAction(){
		SimpleView::set('a',5);
		SimpleView::display('test.html');
		
		
	}
}