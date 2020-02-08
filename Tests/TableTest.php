<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace PhpTheme\Table\Tests;

use PhpTheme\Table\Table;

class TableTest extends \PHPUnit\Framework\TestCase
{
    
    public function testIndex()
    {
        $table = new Table([
            'defaultAttributes' => [
                'class' => 'class_1'
            ],
            'attributes' => [
                'class' => ['class_2']
            ],
            'header' => [
                'rows' => [
                    [
                        'columns' => [
                            ['content' => 'head_1_1'],
                            ['content' => 'head_1_2']                        
                        ]
                    ],
                    [
                        'columns' => [
                            ['content' => 'head_2_1'],
                            ['content' => 'head_2_2']  
                        ]
                    ]
                ]
            ],
            'body' => [
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
            ],
            'footer' => [
                'rows' => [
                    [
                        'columns' => [
                            ['content' => 'foot_1_1'],
                            ['content' => 'foot_1_2']                        
                        ]
                    ],
                    [
                        'columns' => [
                            ['content' => 'foot_2_1'],
                            ['content' => 'foot_2_2']  
                        ]
                    ]
                ]
            ]
        ]);

        $content = $table->toString();

        $this->assertEquals($content, '<table class="class_1 class_2">'
                . '<thead>'
                    . '<tr><th>head_1_1</th><th>head_1_2</th></tr>'
                    . '<tr><th>head_2_1</th><th>head_2_2</th></tr>'
                . '</thead>'
                .'<tbody>'
                    . '<tr><td>col_1_1</td><td>col_1_2</td></tr>'
                    . '<tr><td>col_2_1</td><td>col_2_2</td></tr>'
                . '</tbody>'
                .'<tfoot>'
                    . '<tr><td>foot_1_1</td><td>foot_1_2</td></tr>'
                    . '<tr><td>foot_2_1</td><td>foot_2_2</td></tr>'
                . '</tfoot>'
            . '</table>');
    }

}