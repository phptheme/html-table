<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Table\Tests;

use PhpTheme\Table\TableFooterColumn;
use PhpTheme\Table\TableFooterRow;
use PhpTheme\Table\TableFooter;
use PhpTheme\Table\Table;

class TableFooterColumnTest extends \PHPUnit\Framework\TestCase
{
    
    public function testIndex()
    {
        $table = new Table;

        $footer = new TableFooter([], $table);

        $row = new TableFooterRow([], $footer);

        $column = new TableFooterColumn([
            'content' => 'content',
            'defaultAttributes' => [
                'class' => 'class_1'
            ],
            'attributes' => [
                'class' => ['class_2']
            ]

        ], $row);

        $content = $column->toString();

        $this->assertEquals($content, '<td class="class_1 class_2">content</td>');
    }

}