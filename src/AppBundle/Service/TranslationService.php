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
        $locale = $this->requestStack->getMasterRequest()->getLocale();
        $getter = 'get' . ucfirst($fieldName);

        if ($locale != self::DEFAULT_LOCALE) {
            $getter .= ucfirst($locale);
        }

        return $object->$getter();
    }

}
