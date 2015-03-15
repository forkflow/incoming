<?php
/**
 * Incoming
 *
 * @author    Trevor Suarez (Rican7)
 * @copyright (c) Trevor Suarez
 * @link      https://github.com/Rican7/incoming
 * @license   MIT
 */

namespace Incoming\Structure\Exception;

use BadMethodCallException;
use Exception;

/**
 * ReadOnlyException
 */
class ReadOnlyException extends BadMethodCallException
{

    /**
     * Constants
     */

    /**
     * @type string
     */
    const DEFAULT_MESSAGE = 'Illegal modification attempt';

    /**
     * The exception code for an exception with an attribute context
     *
     * @type int
     */
    const CODE_FOR_ATTRIBUTE = 1;

    /**
     * The message extension format for providing an attribute context's info
     *
     * @type string
     */
    const MESSAGE_EXTENSION_FOR_ATTRIBUTE_FORMAT = ' for attribute `%s`';

    /**
     * The message extension format for providing an attribute's value info
     * in addition to the the attribute's context
     *
     * @type string
     */
    const MESSAGE_EXTENSION_FOR_ATTRIBUTE_WITH_VALUE_FORMAT = ' and value `%s`';


    /**
     * Properties
     */

    /**
     * @type string
     */
    protected $message = self::DEFAULT_MESSAGE;


    /**
     * Methods
     */

    /**
     * Create an exception instance with an attribute's context
     *
     * @param string $name
     * @param mixed|null $value
     * @param int $code
     * @param Exception|null $previous
     * @return ReadOnlyException
     */
    public static function forAttribute(
        $name,
        $value = null,
        $code = self::CODE_FOR_ATTRIBUTE,
        Exception $previous = null
    ) {
        $message = self::DEFAULT_MESSAGE;

        if (null !== $value) {
            $message .= sprintf(
                self::MESSAGE_EXTENSION_FOR_ATTRIBUTE_FORMAT . self::MESSAGE_EXTENSION_FOR_ATTRIBUTE_WITH_VALUE_FORMAT,
                $name,
                var_export($value, true)
            );
        } else {
            $message .= sprintf(
                self::MESSAGE_EXTENSION_FOR_ATTRIBUTE_FORMAT,
                $name
            );
        }

        return new static($message, $code, $previous);
    }
}
