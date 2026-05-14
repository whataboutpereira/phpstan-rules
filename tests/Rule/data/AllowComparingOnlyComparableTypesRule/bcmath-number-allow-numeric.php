<?php declare(strict_types = 1);

namespace AllowComparingOnlyComparableTypesRule;

use BcMath\Number;

class BcMathNumber {

    /**
     * @param numeric-string $ns
     */
    public function testBcMathNumbers(
        Number $number,
        string $ns,
        int $int,
    ): void {
        $number > $ns;
        $ns > $number;
        [$number] > [$ns];
        [$ns, $number, $int] > [$number, $number, $number];
    }
}
