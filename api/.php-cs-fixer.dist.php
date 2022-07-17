<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
;

return (new PhpCsFixer\Config())
    ->setLineEnding("\n")
    ->setRules([
        '@Symfony' => true,
        '@PSR12' => true,
        '@PhpCsFixer' => true,
        'array_syntax' => ['syntax' => 'short'],
        'class_attributes_separation' => ['elements' => ['method' => 'one', 'property' => 'one']],
        'multiline_comment_opening_closing' => true,
        'concat_space' => ['spacing' => 'one'],
        'control_structure_continuation_position' => true,
        'list_syntax' => ['syntax' => 'short'],
        'lowercase_cast' => true,
        'lowercase_keywords' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'nullable_type_declaration_for_default_null_value' => true,
        'ordered_imports' => true,
        'phpdoc_align' => ['align' => 'left'],
        'phpdoc_tag_casing' => true,
        'phpdoc_to_comment' => false,
        'simplified_if_return' => true,
        'single_line_throw' => true,
    ])
    ->setFinder($finder)
;
