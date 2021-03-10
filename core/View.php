<?php


namespace core;
class View
{
public string $layout;

private $content;
public function __construct(string $layout){

    $this->layout = $layout;
    ob_start();
    require_once VIEWS."/layout/$this->layout.php";
    $this->content = ob_get_clean();
    }

public function render($view, $params=[])
{
    foreach ($params as $key => $value){
        $$key = $value;
    }
    ob_start();
    require_once VIEWS."/$view.php";
    $content = ob_get_clean();
    return str_replace('{{content}}', $content, $this->content);
}
}