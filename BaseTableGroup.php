<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Table;

use PhpTheme\HtmlHelper\HtmlHelper;

abstract class BaseTableGroup extends \PhpTheme\Widget\Widget
{

    const TABLE_ROW = TableBodyRow::class;    

    protected $_table;

    protected $_rows;

    public $rows = [];

    public $tag = 'tbody';

    public $defaultRowOptions = [];

    public $rowOptions = [];

    public function __construct(array $params = [], Table $table = null)
    {
        parent::__construct($params);

        $this->_table = $table;
    }

    public function getTable()
    {
        return $this->_table;
    }

    public function getRows()
    {
        if ($this->_rows !== null)
        {
            return $this->_rows;
        }

        $this->_rows = [];

        foreach($this->rows as $options)
        {
            $this->_rows[] = $this->createRow($options);
        }    

        return $this->_rows;
    }

    public function getContent()
    {
        $return = '';

        foreach($this->getRows() as $row)
        {
            $return .= $row->toString();
        }

        return $return;
    }

    public function createRow(array $options)
    {
        $options = HtmlHelper::mergeOptions($this->defaultRowOptions, $this->rowOptions, $options);

        if (array_key_exists('class', $options))
        {
            $class = $options['class'];

            unset($options['class']);
        }
        else
        {
            $class = static::TABLE_ROW;
        }

        return new $class($options, $this);
    }

}