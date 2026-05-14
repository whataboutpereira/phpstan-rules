<?php declare(strict_types = 1);

namespace ShipMonk\PHPStan\Rule;

use LogicException;
use PHPStan\Rules\Rule;
use ShipMonk\PHPStan\RuleTestCase;

/**
 * @extends RuleTestCase<AllowComparingOnlyComparableTypesRule>
 */
class AllowComparingOnlyComparableTypesRuleTest extends RuleTestCase
{

    private ?bool $allowNumericString = null;

    protected function getRule(): Rule
    {
        if ($this->allowNumericString === null) {
            throw new LogicException('allowNumericString must be set');
        }

        return new AllowComparingOnlyComparableTypesRule($this->allowNumericString);
    }

    public function testClass(): void
    {
        $this->allowNumericString = false;
        $this->analyseFile(__DIR__ . '/data/AllowComparingOnlyComparableTypesRule/code.php');
    }

    public function testBcMathNumberWithNumericString(): void
    {
        $this->allowNumericString = true;
        $this->analyseFile(__DIR__ . '/data/AllowComparingOnlyComparableTypesRule/bcmath-number-allow-numeric.php');
    }

}
