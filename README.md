# Table

## Installation

```
composer require phptheme/table:dev-master
```

## Usage

```
use PhpTheme\Table\Table;

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

echo $table->toString();
```

## Testing

#### Windows

vendor\bin\phpunit.bat vendor\phptheme\table\tests

#### Linux

./vendor/bin/phpunit vendor/phptheme/table/tests