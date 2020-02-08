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

####Result HTML:

```
<table class="class_1 class_2">'
    <thead>
        <tr>
            <th>head_1_1</th>
            <th>head_1_2</th>
        </tr>
        <tr>
            <th>head_2_1</th>
            <th>head_2_2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>col_1_1</td>
            <td>col_1_2</td>
        </tr>
        <tr>
            <td>col_2_1</td>
            <td>col_2_2</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td>foot_1_1</td>
            <td>foot_1_2</td>
        </tr>
        <tr>
            <td>foot_2_1</td>
            <td>foot_2_2</td>
        </tr>
    </tfoot>
</table>
```

## Testing

#### Windows

vendor\bin\phpunit.bat vendor\phptheme\table\tests

#### Linux

./vendor/bin/phpunit vendor/phptheme/table/tests