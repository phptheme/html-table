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

class TableBodyTest extends \PHPUnit\Framework\TestCase
{
    
    public function testIndex()
    {
        $table = new Table;

        $body = new TableBody([
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

        $content = $body->toString();

        $this->assertEquals($content, '<tbody class="class_1 class_2">'
                . '<tr><td>col_1_1</td><td>col_1_2</td></tr>'
                . '<tr><td>col_2_1</td><td>col_2_2</td></tr>'
            . '</tbody>');
    }

}