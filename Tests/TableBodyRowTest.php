<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Table\Tests;

use PhpTheme\Table\TableBodyRow;
use PhpTheme\Table\TableBody;
use PhpTheme\Table\Table;

class TableBodyRowTest extends \PHPUnit\Framework\TestCase
{
    
    public function testIndex()
    {
        $table = new Table;

        $body = new TableBody([], $table);

        $row = new TableBodyRow([
            'columns' => [
                ['content' => 'col_1'],
                ['content' => 'col_2']
            ],
            'defaultAttributes' => [
                'class' => 'class_1'
            ],
            'attributes' => [
                'class' => ['class_2']
            ]
        ], $body);

        $content = $row->toString();

        $this->assertEquals($content, '<tr class="class_1 class_2"><td>col_1</td><td>col_2</td></tr>');
    }

}