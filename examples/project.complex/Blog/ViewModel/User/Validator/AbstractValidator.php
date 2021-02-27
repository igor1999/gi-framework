<?php

namespace Blog\ViewModel\User\Validator;

use GI\Validator\Container\Recursive\Recursive;
use Blog\ViewModel\I18n\Glossary;

use Blog\ServiceLocator\ServiceLocatorAwareTrait;

use Blog\ViewModel\I18n\GlossaryInterface;
use GI\Validator\Simple\Existence\NotEmptyInterface;

/**
 * Class AbstractValidator
 * @package Blog\ViewModel\User\Validator
 *
 * @method NotEmptyInterface getLogin()
 * @method NotEmptyInterface getEmail()
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

        $param = $this->giTranslate(GlossaryInterface::class, Glossary::class,'login');
        $this->getLogin()->setValidatedParam($param);

        $param = $this->giTranslate(GlossaryInterface::class, Glossary::class,'email');
        $this->getEmail()->setValidatedParam($param);
    }

    /**
     * @return array
     */
    protected function getContents()
    {
        return [
            'login' => $this->giGetValidatorFactory()->createNotEmpty(),
            'email' => $this->giGetValidatorFactory()->createNotEmpty()
        ];
    }
}