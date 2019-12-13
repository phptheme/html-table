<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Html;

use Closure;

abstract class BaseTable extends Tag
{

    const TABLE_HEADER = TableHeader::class;

    const TABLE_FOOTER = TableFooter::class;

    const TABLE_BODY = TableBody::class;

    const TABLE_COLUMN = TableColumn::class;

    public $renderEmpty = false;

    public $columnOptions = [];

    public $tag = 'table';

    public $headerOptions = [
        'rowOptions' => [
            'columnOptions' => [
                'tag' => 'th'
            ]
        ]
    ];

    public $footerOptions = [
        'rowOptions' => [
            'tag' => 'tr'
        ]
    ];

    public $bodyOptions = [
        'rowOptions' => [
            'tag' => 'tr'
        ]
    ];

    protected $_header;

    protected $_footer;

    protected $_body;

    public function getHeader()
    {
        if (!$this->_header)
        {
            $this->_header = $this->createHeader();
        }

        return $this->_header;
    }

    public function getFooter()
    {
        if (!$this->_footer)
        {
            $this->_footer = $this->createFooter();
        }

        return $this->_footer;
    }

    public function getBody()
    {
        if (!$this->_body)
        {            
            $this->_body = $this->createBody();
        }

        return $this->_body;
    }

    public function getContent()
    {
        $body = $this->getBody();

        $content = $body->toString();

        $header = $this->getHeader()->toString();

        $footer = $this->getFooter()->toString();

        $content = $header . $content . $footer;

        return $content;
    }

    protected function createBody(array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->bodyOptions, $options);

        $class = static::TABLE_BODY;

        $body = new $class($this);

        foreach($options as $key => $value)
        {
            $body->$key = $value;
        }

        $body->getRows(); // create rows

        return $body;
    }

    protected function createHeader(array $options = [])
    {
        $params = HtmlHelper::mergeOptions($this->headerOptions, $options);

        $class = static::TABLE_HEADER;

        $header = new $class($this);

        foreach($params as $key => $value)
        {
            $header->$key = $value;
        }

        $header->getRows(); // create rows

        return $header;
    }

    protected function createFooter(array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->footerOptions, $options);

        $class = static::TABLE_FOOTER;

        $footer = new $class($this);

        foreach($options as $key => $value)
        {
            $footer->$key = $value;
        }

        $footer->getRows(); // create rows

        return $footer;
    }

    public function createColumn(array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->columnOptions, $options);

        if (array_key_exists('class', $options))
        {
            $class = $options['class'];

            unset($options['class']);
        }
        else
        {
            $class = static::TABLE_COLUMN;
        }

        $column = new $class($this);

        foreach($options as $key => $value)
        {
            $column->$key = $value;
        }

        return $column;
    }

}