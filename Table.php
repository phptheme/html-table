<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Table;

use Closure;

class Table extends \PhpTheme\Widget\Widget
{

    const TABLE_HEADER = TableHeader::class;

    const TABLE_FOOTER = TableFooter::class;

    const TABLE_BODY = TableBody::class;

    public $tag = 'table';

    public $header = [];

    public $footer = [];

    public $body = [];

    protected $_header;

    protected $_footer;

    protected $_body;

    public function getHeader()
    {
        return $this->_header ?? $this->_header = $this->createHeader($this->header);
    }

    public function getFooter()
    {
        return $this->_footer ?? $this->_footer = $this->createFooter($this->footer);
    }

    public function getBody()
    {
        return $this->_body ?? $this->_body = $this->createBody($this->body);
    }

    public function getContent()
    {
        $body = $this->getBody();

        return $this->getHeader()->toString() . $body . $this->getFooter()->toString();
    }

    protected function createBody(array $options = [])
    {
        $class = $options['class'] ?? static::TABLE_BODY;

        return new $class($options, $this);
    }

    protected function createHeader(array $options = [])
    {
        $class = $options['class'] ?? static::TABLE_HEADER;

        return new $class($options, $this);
    }

    protected function createFooter(array $options = [])
    {
        $class = $options['class'] ?? static::TABLE_FOOTER;

        return new $class($options, $this);
    }

}