<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use PhpCsFixer\Runner\Parallel\ParallelConfig;

$finder = (new Finder())
    ->in(__DIR__ . '/config')
    ->in(__DIR__ . '/migrations')
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
;

$rules = [
//        '@PSR12' => true,
//        'strict_param' => true,
//        'array_syntax' => ['syntax' => 'short'],
//        'ordered_imports' => true,
//        'no_unused_imports' => true,
//        'no_superfluous_phpdoc_tags' => true,
//        'phpdoc_align' => ['align' => 'left'],
//        'yoda_style' => false,
//        'single_quote' => true,
//        'binary_operator_spaces' => [
//            'operators' => ['=>' => 'align_single_space_minimal', '=' => 'align_single_space_minimal']
//        ],
    '@PHP80Migration' => true,
    '@PHP81Migration' => true,
    '@PHP82Migration' => true,
    '@PHP83Migration' => true,
    '@PHP84Migration' => true,
    '@PhpCsFixer' => true,
    '@Symfony:risky' => true,
    'declare_strict_types' => true,
    'global_namespace_import' => true,
    'concat_space' => false,
    'method_argument_space' => false,
    'single_line_throw' => false,
    'php_unit_test_class_requires_covers' => false,
    'types_spaces' => ['space_multiple_catch' => 'single'],
    'phpdoc_order' => ['order' => ['param', 'throws', 'return']],
    'phpdoc_separation' => ['groups' => [['ORM\\*'], ['Assert\\*'], ['Serializer\\*'], ['Constraints\\*']]],
];

return (new Config())
    ->setCacheFile(__DIR__ . '/var/cache/.php-cs-fixer.cache')
    ->setParallelConfig(new ParallelConfig(4))
    ->setRiskyAllowed(true)
    ->setLineEnding("\n")
    ->setRules($rules)
    ->setFinder($finder);
