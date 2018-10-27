<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 27/10/2018
 * Time: 19:14
 */

namespace App\Command;


use App\Domain\Models\User;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

final class UserCreationCommand extends Command
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepo;

    /**
     * @var EncoderFactoryInterface
     */
    private $passwordEncoder;

    /**
     * UserCreationCommand constructor.
     *
     * @param UserRepositoryInterface $userRepo
     * @param EncoderFactoryInterface $passwordEncoder
     */
    public function __construct(UserRepositoryInterface $userRepo, EncoderFactoryInterface $passwordEncoder)
    {
        $this->userRepo = $userRepo;
        $this->passwordEncoder = $passwordEncoder;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:create-user')
            ->setDescription('Création d\'un nouvel utilisateur')
            ->setHelp('Cette commande est utilisée pour créer un nouvel utilisateur')

            ->addArgument('username', InputArgument::REQUIRED, 'Nom')
            ->addArgument('password', InputArgument::REQUIRED, 'Password')
            ->addArgument('email', InputArgument::REQUIRED, 'Email');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $encoder = $this->passwordEncoder->getEncoder(User::class);

        $callable = \Closure::fromCallable([$encoder, 'encodePassword']);

        $user = new User(
            $input->getArgument('username'),
            $input->getArgument('password'),
            $callable,
            $input->getArgument('email'),
            'ROLE_ADMIN',
            $input->getArgument('username')
        );

            $this->userRepo->save($user);

            $output->writeln('Admin Created');
    }
}
