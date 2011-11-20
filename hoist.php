<?

class hoist{
    public $active_url = false;
    public $active_page = false;
    public $groups = array();
    public $pages = array();
    public $header = 'header.php';
    public $footer = 'footer.php';
    public $required_fields = array('url', 'content');

    function __construct($raw_pages = array()){
        $this->active_url = $this->strip_trailing_slash($_SERVER['REQUEST_URI']);

        foreach($raw_pages as $page){
            $this->process_page($page);            
        }
    }

    function process_page($page = array()){
        foreach($required_fields as $field){
            if(!array_key_exists($field, $page)){
                echo "No $field for this page:";
                $this->d($page);
                die();
            }
        }
        
        if(!file_exists($page['content'])){
            echo "I can't find the content file for this page:";
            $this->d($page);
            echo "If it helps, I'm trying to find it from here: " . $_SERVER['DOCUMENT_ROOT'];
            die();
        }

        $page['active'] = false;
        if(!array_key_exists('headline', $page)) $page['headline'] = $page['title'];
        if(!array_key_exists('override', $page)) $page['override'] = false;

        $page['url'] = $this->strip_trailing_slash($page['url']);
        if($page['url'] == $this->active_url && !$this->active_page){
            $this->active_page = $page;
            $page['active'] = true;
        }
        $page['groups'] = $this->process_groups($page);
        $this->pages[] = $page;

        foreach ($page['groups'] as $group) {
            if(!array_key_exists($group, $this->groups)){
                $this->groups[$group] = array();
            }
            $title_override = $page[$group . '_title'];
            if($title_override) $page['title'] = $title_override;
            $this->groups[$group][] = $page;
        }
    }

    function process_groups($page){
        //'groups' might be a string or an array (or unset)
        $groups = array();
        if(array_key_exists('groups', $page)) $groups = $page['groups'];
        if(is_string($groups) && strlen($groups)) $groups = array($groups);

        //add this page to any types that is has a title for
        foreach($page as $key=>$value){
            if(preg_match("/^(.+)_title$/", $key, $matches)){
                $groups[] = $matches[1];
            }
        }

        return array_unique($groups);
    }

    function display($page = false){
        if(!$page) $page = $this->active_page;
        if(!$page){
            header('HTTP/1.0 404 Not Found');
            die('error: no page to display');
        }

        $hoist = $this;
        if(!$page['override']) require $this->header;
        require $page['content'];
        if(!$page['override']) require $this->footer;
    }

    function strip_trailing_slash($string = ''){
        $string = preg_replace("/\/+$/", '', $string);
        if(!strlen($string)) $string = '/';
        return $string;
    }

    function d($o){
        echo "<pre>";
        print_r($o);
        echo "</pre><br />";
    }
}