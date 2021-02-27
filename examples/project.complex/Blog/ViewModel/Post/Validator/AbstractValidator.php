<?php

namespace Blog\ViewModel\Post\Validator;

use GI\Validator\Container\Recursive\Recursive;
use Blog\ViewModel\I18n\Glossary;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\ViewModel\I18n\GlossaryInterface;
use GI\Validator\Simple\Existence\NotEmptyInterface;

/**
 * Class AbstractValidator
 * @package Blog\ViewModel\Post\Validator
 *
 * @method NotEmptyInterface getTitle()
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

        $param = $this->giTranslate(GlossaryInterface::class, Glossary::class,'title');
        $this->getTitle()->setValidatedParam($param);

        $param = $this->giTranslate(GlossaryInterface::class, Glossary::class,'text');
        $this->getText()->setValidatedParam($param);
    }

    /**
     * @return array
     */
    protected function getContents()
    {
        return [
            'title' => $this->giGetValidatorFactory()->createNotEmpty(),
            'text' => $this->giGetValidatorFactory()->createNotEmpty()
        ];
    }
}