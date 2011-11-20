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
        $page['type'] = $this->process_page_types($page);
        
        $this->pages[] = $page;

        if($page['url'] == $this->active_url) $this->active_url = $page['url'];

        foreach ($page['type'] as $type) {
            if(!array_key_exists($type, $this->page_types)){
                $this->page_types[$type] = array();
            }
            $title_override = $page[$type . '_title'];
            if($title_override) $page['title'] = $page[$type . '_title'];
            $this->page_types[$type][] = $page;
        }
    }

    function process_page_types($page){
        //type might be a string or an array (or unset)
        $types = array();
        if(array_key_exists('type', $page)) $types = $page['type'];
        if(is_string($types) && strlen($types)) $types = array($types);

        //add this page to any types that is has a title for
        foreach($page as $key=>$value){
            if(preg_match("/^(.+)_title$/", $key, $matches)){
                $types[] = $matches[1];
            }
        }

        return array_unique($types);
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