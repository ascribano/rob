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


class GetinvolvedController extends AbstractActionController
{

    public function indexAction()
    {

        $request = $this->getRequest();
        $data = $request->getPost();

        if($request->isPost()) {


            $body = "Name: " . $data->email . "<br>";
            $body .= "Company: " . $data->company . "<br>";
            $body .= "Email: " . $data->email . "<br>";
            $body .= "Mobile: " . $data->mobile . "<br>";
            $body .= "Other: " . $data->other . "<br>";
            $body .= "Name of the person referred: " . $data->namepersonreferred . "<br>";
            $body .= "company2: " . $data->company2 . "<br>";
            $body .= "enquireabout: " . $data->enquireabout . "<br>";
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
                ->setSubject('Referral details')
                ->setBody($body);
            $message->setBody($body);

            $transport->setOptions($options);
            $transport->send($message);
            return $this->redirect()->toUrl('/thankyou');
        }
		return new ViewModel();
    }
}
