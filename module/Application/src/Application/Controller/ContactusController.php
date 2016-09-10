<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;


use Zend\Mail;


class ContactusController extends AbstractActionController
{

    public function indexAction()
    {

/*
        $mail = new Mail\Message();
        $mail->setBody('This is the text of the email.');
        $mail->setFrom('no_reply@anytime-offices.com.au', 'Contact page');
        $mail->addTo('armandoscribano@hotmail.com', 'Name o. recipient');
        $mail->setSubject('TestSubject');
*/
        $request = $this->getRequest();
        $data = $request->getPost();

        if($request->isPost()) {


            $body = "Name: " . $data->email . "<br>";
            $body .= "Company: " . $data->company . "<br>";
            $body .= "Email: " . $data->email . "<br>";
            $body .= "Mobile: " . $data->mobile . "<br>";
            $body .= "Type: " . $data->type . "<br>";
            $body .= "Message: " . $data->message . "<br>";


// Setup SMTP transport using LOGIN authentication
            $transport = new SmtpTransport();
            $options = new SmtpOptions(array(
                'name' => 'anytime-offices.com.au',
                'host' => '52.63.255.18',
                'connection_class' => 'plain',
                'connection_config' => array(
                    'username' => 'administrator@anytime-offices.com.au',
                    'password' => 'test',
                ),
            ));

            $html = new MimePart($body);
            $html->type = "text/html";

            $body = new MimeMessage();
            $body->addPart($html);

            $message = new Message();
            $message->addTo('info@anytime-offices.com.au')
                ->addFrom('administrator@anytime-offices.com.au')
                ->setSubject('Enquiry form')
                ->setBody($body);
            $message->setBody($body);

            $transport->setOptions($options);
            $transport->send($message);
            return $this->redirect()->toUrl('/thankyou');
        }
        return new ViewModel();
    }


}
