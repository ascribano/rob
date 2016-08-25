<?php
// module/Album/src/Album/Form/AlbumForm.php:
namespace Form;
use Zend\Form\Form;
class UserForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('User');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'company',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Company',
            ),
        ));
        $this->add(array(
            'name' => 'first',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'First',
            ),
        ));
        $this->add(array(
            'name' => 'last',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Last',
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Email',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Password',
            ),
        ));
        
    }
}