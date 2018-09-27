<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 27/09/2018
 * Time: 17:13
 */

namespace App\Subscriber;


use App\Services\Interfaces\SlugHelperInterface;
use App\Subscriber\Interfaces\ContactEditSlugSubscriberInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ContactEditSlugSubscriber implements EventSubscriberInterface, ContactEditSlugSubscriberInterface
{
    /**
     * @var SlugHelperInterface
     */
    private $slugHelper;

    /**
     * ContactEditSlugSubscriber constructor.
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
    public static function getSubscribedEvents()
    {
        return [
            FormEvents::SUBMIT => 'onSubmit'
        ];
    }

    /**
     * @param FormEvent $event
     */
    public function onSubmit(FormEvent $event)
    {
        $event->getData()->slug = $this->slugHelper->replace($event->getData()->name . '-' . $event->getData()->lastName);
    }
}
