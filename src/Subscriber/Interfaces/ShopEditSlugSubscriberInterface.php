<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 10:38
 */

namespace App\Subscriber\Interfaces;


use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormEvent;

interface ShopEditSlugSubscriberInterface
{
    /**
     * ShopEditSlugSubscriberInterface constructor.
     *
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(SlugHelperInterface $slugHelper);

    /**
     * @return array
     */
    public static function getSubscribedEvents(): array;

    /**
     * @param FormEvent $event
     */
    public function onSubmit(FormEvent $event): void;
}
