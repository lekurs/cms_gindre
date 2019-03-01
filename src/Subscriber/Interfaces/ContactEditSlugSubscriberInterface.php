<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 27/09/2018
 * Time: 17:13
 */

namespace App\Subscriber\Interfaces;


use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormEvent;

interface ContactEditSlugSubscriberInterface
{
    /**
     * ContactEditSlugSubscriberInterface constructor.
     *
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(SlugHelperInterface $slugHelper);

    /**
     * @param FormEvent $event
     * @return mixed
     */
    public function onSubmit(FormEvent $event);
}
