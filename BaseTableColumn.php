<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Table;

use Closure;

abstract class BaseTableColumn extends \PhpTheme\Widget\Widget
{

    protected $_row;

    public $tag = 'td';

    public function __construct(array $params = [], BaseTableRow $row = null)
    {
        parent::__construct($params);

        $this->_row = $row;
    }

    public function getRow()
    {
        return $this->_row;
    }

    public function getGroup()
    {
        return $this->getRow()->getGroup();
    }

    public function getTable()
    {
        return $this->getRow()->getGroup()->getTable();
    }

}