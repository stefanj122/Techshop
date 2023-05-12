<?php

$finder = PhpCsFixer\Finder::create()
    // ->exclude('somedir')
    // ->notPath('src/Symfony/Component/Translation/Tests/fixtures/resources.php')
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();

return $config->setRules(
    [
        '@PhpCsFixer' => true,
        'strict_param' => false,
        'array_syntax' => ['syntax' => 'short'],
        'braces' => [
            'allow_single_line_closure' => true,
            'position_after_functions_and_oop_constructs' => 'same',
        ],
        'curly_braces_position' => [
            'functions_opening_brace' => 'same_line',
            'classes_opening_brace' => 'same_line',
        ],
    ]
)
    ->setFinder($finder);
