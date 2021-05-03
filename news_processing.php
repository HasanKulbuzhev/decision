<?php
class News{
    protected $content;
    protected $url;
    public $shortDescription;
    public function __construct(string $content,$url)
    {
        $this->content = $content;
        $this->url = $url;
    }
    public function cut()
    {
        $this->shortDescription = rtrim(mb_substr($this->content,0,140)).'...';
        return $this;
    }
    public function add_url()
    {
        $last_word_position = strrpos($this->shortDescription,' ')+1;
        $url = '<a href="'.$this->url.'" >'.substr($this->shortDescription,$last_word_position).'</a>';
        $this->shortDescription = substr_replace($this->shortDescription,$url,$last_word_position);
        return $this;
    }
    public function test()
    {
        return $this->shortDescription = rtrim(mb_substr($this->content,0,140)).'...';
    }
}
$news = new News('Этот кандидат крассавчик и молодец','Это ссылка на полную новость');
echo $news->cut()->add_url()->shortDescription;
