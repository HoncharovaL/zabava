<?php

namespace AppBundle\Twig\Extension;

use AppBundle\Service\TranslationService;

class TranslationExtension extends \Twig_Extension
{
    /**
     * @var TranslationService
     */
    private $translator;

    /**
     * @param TranslationService $translator
     */
    public function __construct(TranslationService $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_Function('get_translated', [$this->translator, 'getTranslatedField']),
        ];
    }
}
