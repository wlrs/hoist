<?

class hoist{
    public $active_url = false;
    public $active_page = false;
    public $page_types = array();
    public $pages = array();
    public $template_dir = '';
    public $page_dir = '';

    function __construct($raw_pages = array()){
        $this->active_url = $this->strip_trailing_slash($_SERVER['REQUEST_URI']);

        foreach($raw_pages as $page){
            $this->process_page($page);            
        }
    }

    function process_page($page = array()){
        $page['active'] = false;
        if(!array_key_exists('headline', $page)) $page['headline'] = $page['title'];
        if(!array_key_exists('override', $page)) $page['override'] = false;
        $page['url'] = $this->strip_trailing_slash($page['url']);
        if($page['url'] == $this->active_url){
            $page['active'] = true;
            $this->active_page = $page;
        }
        $this->pages[] = $page;

        if(!is_array($page['type'])) $page['type'] = array($page['type']);
        foreach ($page['type'] as $type) {
            if(!array_key_exists('$type', $this->page_types)){
                $this->page_types[$type] = array();
            }
            $title_override = $page[$type . '_title'];
            if($title_override) $page['title'] = $page[$type . '_title'];
            $this->page_types[$type][] = $page;
        }
    }

    function strip_trailing_slash($string = ''){
        $string = preg_replace("/\/+$/", '', $string);
        if(!strlen($string)) $string = '/';
        return $string;
    }

    function display($page = false){
        if(!$page) $page = $this->active_page;
        if(!$page){
            header('HTTP/1.0 404 Not Found');
            die('error: no page to display');
        }
        if(!$page['override']) require $this->template_dir . 'header.php';
        require $this->page_dir . $page['content'];
        if(!$page['override']) require $this->template_dir . 'footer.php';
    }
}