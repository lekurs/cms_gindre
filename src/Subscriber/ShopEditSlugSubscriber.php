<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 10:38
 */

namespace App\Subscriber;


use App\Services\Interfaces\SlugHelperInterface;
use App\Subscriber\Interfaces\ShopEditSlugSubscriberInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ShopEditSlugSubscriber implements EventSubscriberInterface, ShopEditSlugSubscriberInterface
{
    /**
     * @var SlugHelperInterface
     */
    private $slugHelper;

    /**
     * ShopEditSlugSubscriber constructor.
     *
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(SlugHelperInterface $slugHelper)
    {
        $this->slugHelper = $slugHelper;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            FormEvents::SUBMIT => 'onSubmit',
        ];
    }

    /**
     * @param FormEvent $event
     */
    public function onSubmit(FormEvent $event): void
    {
        $event->getData()->slug = $this->slugHelper->replace($event->getData()->name);
    }
}
