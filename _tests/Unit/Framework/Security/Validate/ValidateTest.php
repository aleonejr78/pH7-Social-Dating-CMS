<?php
/**
 * @author           Pierre-Henry Soria <hi@ph7.me>
 * @copyright        (c) 2018, Pierre-Henry Soria. All Rights Reserved.
 * @license          GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package          PH7 / Test / Unit / Framework / Security / Validate
 */

namespace PH7\Test\Unit\Framework\Security\Validate;

use PH7\Framework\Security\Validate\Validate;
use PHPUnit_Framework_TestCase;

class ValidateTest extends PHPUnit_Framework_TestCase
{
    /** @var Validate */
    private $oValidate;

    protected function setUp()
    {
        $this->oValidate = new Validate();
    }

    /**
     * @dataProvider validHexCodesProvider
     */
    public function testValidHexCode($sHexCode)
    {
        $this->assertTrue($this->oValidate->hex($sHexCode));
    }

    /**
     * @dataProvider invalidHexCodesProvider
     */
    public function testInvalidHexCode($sHexCode)
    {
        $this->assertFalse($this->oValidate->hex($sHexCode));
    }

    /**
     * @return array
     */
    public function validHexCodesProvider()
    {
        return [
            ['#eee'],
            ['#EEE'],
            ['#eeeeee']
        ];
    }

    /**
     * @return array
     */
    public function invalidHexCodesProvider()
    {
        return [
            ['eee'],
            ['#fffffff'],
            ['#cc']
        ];
    }
}
