<?php

namespace Blog\ViewModel\Comment\Validator;

use GI\Validator\Container\Recursive\Recursive;
use Blog\ViewModel\I18n\Glossary;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\ViewModel\I18n\GlossaryInterface;
use GI\Validator\Simple\Existence\NotEmptyInterface;

/**
 * Class AbstractValidator
 * @package Blog\ViewModel\Comment\Validator
 *
 * @method NotEmptyInterface getText()
 */
abstract class AbstractValidator extends Recursive implements ValidatorInterface
{
    use ServiceLocatorAwareTrait;


    /**
     * AbstractValidator constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $param = $this->giTranslate(GlossaryInterface::class, Glossary::class,'text');
        $this->getText()->setValidatedParam($param);
    }

    /**
     * @return array
     */
    protected function getContents()
    {
        return [
            'text' => $this->giGetValidatorFactory()->createNotEmpty()
        ];
    }
}