<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Table\Tests;

use PhpTheme\Table\TableHeaderColumn;
use PhpTheme\Table\TableHeaderRow;
use PhpTheme\Table\TableHeader;
use PhpTheme\Table\Table;

class TableHeaderColumnTest extends \PHPUnit\Framework\TestCase
{
    
    public function testIndex()
    {
        $table = new Table;

        $header = new TableHeader([], $table);

        $row = new TableHeaderRow([], $header);

        $column = new TableHeaderColumn([
            'content' => 'content',
            'defaultAttributes' => [
                'class' => 'class_1'
            ],
            'attributes' => [
                'class' => ['class_2']
            ]

        ], $row);

        $content = $column->toString();

        $this->assertEquals($content, '<th class="class_1 class_2">content</th>');
    }

}