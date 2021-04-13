<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MessageRepository;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(): Response
    {
        $template = 'default/index.html.twig';
        $args = [
        ];

        return $this->render($template, $args);
    }
    /**
     * @Route("/about", name="about")
     */

    public function about(): Response
    {
        $template = 'default/about.html.twig';
        $args = [
        ];

        return $this->render($template, $args);
    }

    /**
     * @Route("/sitemap", name="sitemap")
     */

    public function sitemap(): Response
    {
        $template = 'default/sitemap.html.twig';
        $args = [
        ];

        return $this->render($template, $args);
    }

    /**
     * @Route("/employers", name="employers")
     */

    public function employers(): Response
    {
        $template = 'default/employers.html.twig';
        $args = [
        ];

        return $this->render($template, $args);
    }

    /**
     * @Route("/cv", name="cv")
     */
    public function CV(MessageRepository $messageRepository): Response
    {

        $template = 'default/cv.html.twig';
        $args = [
            'messages' => $messageRepository->findAll(),
        ];

        return $this->render($template, $args);
    }

    /**
     * @Route("/mymessages", name="mymessages")
     */
    public function myMessages(MessageRepository $messageRepository): Response
    {
        $author = $this->getUser();
        $messages = $messageRepository->findByAuthor($author);

        $template = "default/mymessages.html.twig";
        $args = [
            'messages' => $messages
        ];
        return $this->render($template, $args);
    }
}
