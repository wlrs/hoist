<?

class Hoist{
    public $active_url = false;
    public $active_page = false;
    public $page_types = array();
    public $pages = array();

    function __construct($raw_pages = array()){
        $this->active_url = $this->strip_trailing_slash($_SERVER['REQUEST_URI']);

        foreach($raw_pages as $page){
            if(!array_key_exists('menu_title', $page)) $page['menu_title'] = $page['title'];
            if(!array_key_exists('h2', $page)) $page['h2'] = $page['title'];
            $page['url'] = $this->strip_trailing_slash($page['url']);
            $this->pages[] = $page;
        }
    }

    function strip_trailing_slash($string = ''){
        $string = preg_replace("/\/+$/", '', $string);
        if(!strlen($string)) $string = '/';
        return $string;
    }

    function display(){
        if(!$this->active_page['override']) require 'header.php';
        require $this->$active_page['content'];
        if(!$this->active_page['override']) require 'footer.php';
    }
}