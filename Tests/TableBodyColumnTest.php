<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Table\Tests;

use PhpTheme\Table\TableBodyColumn;
use PhpTheme\Table\TableBodyRow;
use PhpTheme\Table\TableBody;
use PhpTheme\Table\Table;

class TableBodyColumnTest extends \PHPUnit\Framework\TestCase
{

    public function testIndex()
    {
        $table = new Table;

        $body = new TableBody([], $table);

        $row = new TableBodyRow([], $body);

        $column = new TableBodyColumn([
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