<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class TranslationService
{
    const DEFAULT_LOCALE = 'ru';

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getTranslatedField($object, $fieldName)
    {
        $locale = explode('_', $this->requestStack->getMasterRequest()->getLocale());
        $getter = 'get' . ucfirst($fieldName);

        if ($locale[0] != self::DEFAULT_LOCALE) {
            $getter .= ucfirst($locale[0]);
        }

        return method_exists($object, $getter) ? $object->$getter() : '';
    }

}
