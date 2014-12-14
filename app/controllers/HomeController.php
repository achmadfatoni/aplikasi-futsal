<?php

class HomeController extends BaseController
{

    private $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function getIndex()
    {
        $promo = $this->page->find(PAGE_PROMO);
        $data = array(
            'promo' => $promo->contents,
        );
        return View::make('home.index', $data);
    }
}
