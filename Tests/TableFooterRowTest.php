<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Table\Tests;

use PhpTheme\Table\TableFooterRow;
use PhpTheme\Table\TableFooter;
use PhpTheme\Table\Table;

class TableFooterRowTest extends \PHPUnit\Framework\TestCase
{
    
    public function testIndex()
    {
        $table = new Table;

        $footer = new TableFooter([], $table);

        $row = new TableFooterRow([
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
        ], $footer);

        $content = $row->toString();

        $this->assertEquals($content, '<tr class="class_1 class_2"><td>col_1</td><td>col_2</td></tr>');
    }

}