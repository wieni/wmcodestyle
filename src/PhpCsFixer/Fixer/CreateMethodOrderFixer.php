<?php

namespace Wieni\wmcodestyle\PhpCsFixer\Fixer;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\Tokenizer\CT;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;
use SplFileInfo;

class CreateMethodOrderFixer extends AbstractFixer
{
    public function getDefinition(): FixerDefinition
    {
        return new FixerDefinition(
            'Place static create methods right after the constructor.',
            []
        );
    }

    public function getName(): string
    {
        return implode('/', ['Wieni', parent::getName()]);
    }

    public function isCandidate(Tokens $tokens): bool
    {
        return $tokens->isAnyTokenKindsFound(Token::getClassyTokenKinds());
    }

    protected function applyFix(SplFileInfo $file, Tokens $tokens): void
    {
        for ($i = 1, $count = $tokens->count(); $i < $count; $i++) {
            if (!$tokens[$i]->isGivenKind(T_CLASS)) {
                continue;
            }

            $i = $tokens->getNextTokenOfKind($i, ['{']);
            $elements = $this->getElements($tokens, $i);

            if (!$elements) {
                continue;
            }

            $sorted = $this->sortElements($elements);
            $endIndex = $elements[\count($elements) - 1]['end'];

            if ($sorted !== $elements) {
                $this->sortTokens($tokens, $i, $endIndex, $sorted);
            }

            $i = $endIndex;
        }
    }

    protected function getElements(Tokens $tokens, int $startIndex): array
    {
        static $elementTokenKinds = [CT::T_USE_TRAIT, T_CONST, T_VARIABLE, T_FUNCTION];

        $startIndex++;
        $elements = [];

        while (true) {
            $element = [
                'start' => $startIndex,
                'visibility' => 'public',
                'static' => false,
            ];

            for ($i = $startIndex;; $i++) {
                $token = $tokens[$i];

                // class end
                if ($token->equals('}')) {
                    return $elements;
                }

                if ($token->isGivenKind(T_STATIC)) {
                    $element['static'] = true;

                    continue;
                }

                if ($token->isGivenKind([T_PROTECTED, T_PRIVATE])) {
                    $element['visibility'] = strtolower($token->getContent());

                    continue;
                }

                if (!$token->isGivenKind($elementTokenKinds)) {
                    continue;
                }

                $type = $this->detectElementType($tokens, $i);
                if (\is_array($type)) {
                    $element['type'] = $type[0];
                    $element['name'] = $type[1];
                } else {
                    $element['type'] = $type;
                }

                if ('property' === $element['type']) {
                    $element['name'] = $tokens[$i]->getContent();
                } elseif (\in_array($element['type'], ['use_trait', 'constant', 'method', 'magic'], true)) {
                    $element['name'] = $tokens[$tokens->getNextMeaningfulToken($i)]->getContent();
                }

                $element['end'] = $this->findElementEnd($tokens, $i);

                break;
            }

            $elements[] = $element;
            $startIndex = $element['end'] + 1;
        }

        return $elements;
    }

    protected function findElementEnd(Tokens $tokens, int $index): int
    {
        $index = $tokens->getNextTokenOfKind($index, ['{', ';']);

        if ($tokens[$index]->equals('{')) {
            $index = $tokens->findBlockEnd(Tokens::BLOCK_TYPE_CURLY_BRACE, $index);
        }

        for (++$index; $tokens[$index]->isWhitespace(" \t") || $tokens[$index]->isComment(); $index++);

        $index--;

        return $tokens[$index]->isWhitespace() ? $index - 1 : $index;
    }

    protected function sortElements(array $elements): array
    {
        foreach ($elements as $i => &$element) {
            $element['position'] = $i;

            if (
                $element['type'] === 'method'
                && $element['name'] === 'create'
                && $element['static']
            ) {
                $createIndex = $i;
            }

            if ($element['type'] === 'construct') {
                $constructIndex = $i;
            }
        }

        unset($element);
        if (!isset($constructIndex, $createIndex)) {
            return $elements;
        }
        if ($constructIndex + 1 === $createIndex) {
            return $elements;
        }

        $create = $elements[$createIndex];
        unset($elements[$createIndex]);

        return array_merge(
            array_slice($elements, 0, $constructIndex + 1),
            [$create],
            array_slice($elements, $constructIndex + 1)
        );
    }

    protected function sortTokens(Tokens $tokens, int $startIndex, int $endIndex, array $elements): void
    {
        $replaceTokens = [];

        foreach ($elements as $element) {
            for ($i = $element['start']; $i <= $element['end']; $i++) {
                $replaceTokens[] = clone $tokens[$i];
            }
        }

        $tokens->overrideRange($startIndex + 1, $endIndex, $replaceTokens);
    }

    /** @return array|string type or array of type and name */
    protected function detectElementType(Tokens $tokens, int $index)
    {
        $token = $tokens[$index];

        if ($token->isGivenKind(CT::T_USE_TRAIT)) {
            return 'use_trait';
        }

        if ($token->isGivenKind(T_CONST)) {
            return 'constant';
        }

        if ($token->isGivenKind(T_VARIABLE)) {
            return 'property';
        }

        $nameToken = $tokens[$tokens->getNextMeaningfulToken($index)];

        if ($nameToken->equals([T_STRING, '__construct'], false)) {
            return 'construct';
        }

        if ($nameToken->equals([T_STRING, '__destruct'], false)) {
            return 'destruct';
        }

        if (
        $nameToken->equalsAny([
            [T_STRING, 'setUpBeforeClass'],
            [T_STRING, 'tearDownAfterClass'],
            [T_STRING, 'setUp'],
            [T_STRING, 'tearDown'],
        ], false)
        ) {
            return ['phpunit', strtolower($nameToken->getContent())];
        }

        if (strpos($nameToken->getContent(), '__') === 0) {
            return 'magic';
        }

        return 'method';
    }
}
