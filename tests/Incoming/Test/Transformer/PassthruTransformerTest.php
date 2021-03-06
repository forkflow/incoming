<?php
/**
 * Incoming
 *
 * @author    Trevor Suarez (Rican7)
 * @copyright (c) Trevor Suarez
 * @link      https://github.com/Rican7/incoming
 * @license   MIT
 */

namespace Incoming\Test\Transformer;

use Incoming\Transformer\PassthruTransformer;
use PHPUnit_Framework_TestCase;

/**
 * PassthruTransformerTest
 */
class PassthruTransformerTest extends PHPUnit_Framework_TestCase
{

    public function testTransform()
    {
        $input = ['test', 'stuff'];

        $output = (new PassthruTransformer())->transform($input);

        $this->assertSame($input, $output);
    }
}
