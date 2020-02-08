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

class TableHeaderTest extends \PHPUnit\Framework\TestCase
{
    
    public function testIndex()
    {
        $table = new Table;

        $header = new TableHeader([
            'defaultAttributes' => [
                'class' => 'class_1'
            ],
            'attributes' => [
                'class' => ['class_2']
            ],
            'rows' => [
                [
                    'columns' => [
                        ['content' => 'col_1_1'],
                        ['content' => 'col_1_2']                        
                    ]
                ],
                [
                    'columns' => [
                        ['content' => 'col_2_1'],
                        ['content' => 'col_2_2']  
                    ]
                ]                
            ]
        ], $table);

        $content = $header->toString();

        $this->assertEquals($content, '<thead class="class_1 class_2">'
                . '<tr><th>col_1_1</th><th>col_1_2</th></tr>'
                . '<tr><th>col_2_1</th><th>col_2_2</th></tr>'
            . '</thead>');
    }

}