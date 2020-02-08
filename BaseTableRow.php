<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Table;

use PhpTheme\HtmlHelper\HtmlHelper;

abstract class BaseTableRow extends \PhpTheme\Widget\Widget
{

    public $tag = 'tr';

    public $columns = [];

    public $columnOptions = [];

    public $defaultColumnOptions = [];

    protected $_group;

    protected $_columns;

    public function __construct(array $params = [], BaseTableGroup $group = null)
    {
        parent::__construct($params);

        $this->_group = $group;
    }

    public function getGroup()
    {
        return $this->_group;
    }

    public function getTable()
    {
        return $this->getGroup()->getTable();
    }

    public function createColumn(array $options = [])
    {
        $options = HtmlHelper::mergeOptions($this->defaultColumnOptions, $this->columnOptions, $options);

        if (array_key_exists('class', $options))
        {
            $class = $options['class'];

            unset($options['class']);
        }
        else
        {
            $class = static::TABLE_COLUMN;
        }

        return new $class($options, $this);
    }

    public function getColumns()
    {
        if ($this->_columns !== null)
        {
            return $this->_columns;
        }

        $this->_columns = [];

        foreach($this->columns as $params)
        {
            if (is_object($params))
            {
                $this->_columns[] = $params;
            }
            else
            {
                if (!is_array($params))
                {
                    $params = ['content' => $params];
                }

                $this->_columns[] = $this->createColumn($params);
            }
        }

        return $this->_columns;
    }

    public function getContent()
    {
        $return = '';

        foreach($this->getColumns() as $column)
        {
            $return .= $column->toString();
        }

        return $return;
    }

}