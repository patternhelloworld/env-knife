<?php

namespace Arwg\EnvKnife;

class EnvRegex
{
    // \bconfig\([\t\s]*"((?:[^"\\]|\\"|\\[^"])*)"[\t\s]*\)[\t\s]*(?:\[[\t\s]*""[\t\s]*\]|)*

    const FUNC_LEFT_BORDER = '\b';
    const ALL_SPACES = '[\t\s]*';
    const DOUBLE_QUOTES_BASED_VALUE = '(?:\x{0022}(?:[^\x{0022}\x{005C}]|\x{005C}\x{0022}|\x{005C}[^\x{0022}])*\x{0022})';
    const SINGLE_QUOTES_BASED_VALUE = '(?:\x{0027}(?:[^\x{0027}\x{005C}]|\x{005C}\x{0027}|\x{005C}[^\x{0027}])*\x{0027})';

    const NUMERIC_VALUE = '(?:\d(?:,\d)*)';
    const BOOLEAN_VALUE = '(?:true|false)';

    const FUNC_RIGHT_BORDER = '';

    public $finalRegex = null;


    public function __construct($funcName)
    {
        $quotesPart = '(?:' . self::DOUBLE_QUOTES_BASED_VALUE . '|' . self::SINGLE_QUOTES_BASED_VALUE . ')';

        $aggregatedPart = '(?:' . self::NUMERIC_VALUE. '|' . self::BOOLEAN_VALUE . '|' . $quotesPart . '|,|' . self::ALL_SPACES . ')*';

        $argPart = '\(' . self::ALL_SPACES .
            $aggregatedPart .
            self::ALL_SPACES . '\)' . self::ALL_SPACES .
            '(?:\[' . self::ALL_SPACES .$quotesPart . self::ALL_SPACES . '\]|)*';

        $this->finalRegex = self::FUNC_LEFT_BORDER . $funcName . $argPart;
    }



}