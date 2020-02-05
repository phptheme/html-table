<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Table;

use Closure;

class TableColumn extends \PhpTheme\Tag\Tag
{

    public $table;

    public $tag = 'td';

    public function __construct(Table $table)
    {
        parent::__construct();

        $this->table = $table;
    }

}