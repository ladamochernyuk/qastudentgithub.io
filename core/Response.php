<?php
class Response
{
    public array $header;
    private string $content;
    private string $version;
    private string $charset;
    private string $statusText;
    private int $statusCode;
    private array $statusTexts = [
        200 => "Ok",
        302 => "Found",
        400 => "Bad Request",
        401 => "Unauthorized",
        403 => "Forbidden",
        404 => "ooppsyy 404",
        500 => "Internal Server Error"
    ];

    public function __construct(string $content="", int $status=200, array $header=[])
    {
        $this->statusText = $this->statusTexts[$status];
        $this->version ="1.0";
        $this->charset = "UTF-8";
        $this->content = $content;
        $this->statusCode = $status;
        $this->header = $header;
    }
    

    public function send(){
        $this->sendHeader();
        $this->sendContent();
        $this->flushBuffer();
        return $this;
    }

    private function sendContent(){

        echo $this->content;
        return $this;
    }

    public function setContent(string $content=""){
        $this->content = $content;
        return $this;
    }
    private function flushBuffer(){

        flush();
    }
    private function sendHeader(){
        if(header_sent()){
            return $this;
        }
       header(sprintf('HTTP/%s %s %s', $this->version, $this->statusCode, $this->statusText), true, $this->statusCode);
        if(!array_key_exists('Content-Type', $this->header)){
            header('Content-Type: '.'text\html; charset='.$this->charset);
        }

        foreach ($this->header as $key => $value){
            header("$key: $value", true, $this->statusCode);
        }
    return $this;
}
}