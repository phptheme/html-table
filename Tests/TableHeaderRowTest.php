<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Table\Tests;

use PhpTheme\Table\TableHeaderRow;
use PhpTheme\Table\TableHeader;
use PhpTheme\Table\Table;

class TableHeaderRowTest extends \PHPUnit\Framework\TestCase
{
    
    public function testIndex()
    {
        $table = new Table;

        $header = new TableHeader([], $table);

        $row = new TableHeaderRow([
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
        ], $header);

        $content = $row->toString();

        $this->assertEquals($content, '<tr class="class_1 class_2"><th>col_1</th><th>col_2</th></tr>');
    }

}