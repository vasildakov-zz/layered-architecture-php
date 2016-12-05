<?php
namespace Presentation\Api\Action;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\Validator;

class SignUpFilter
{
    public function __construct()
    {
        //
    }


    /**
     * @return InputFilter
     */
    public function __invoke()
    {
        $filter =  new InputFilter();
        $factory = new InputFactory();

        $filter->add($factory->createInput(array(
            'name' => 'email',
            'required' => true,
            'filters' => array(),
            'validators' => [
                [
                    'name' => Validator\NotEmpty::class
                ],
                [
                    'name' => Validator\EmailAddress::class
                ],
            ],
        )));

        $filter->add($factory->createInput(array(
            'name' => 'password',
            'required' => true,
            'filters' => array(),
            'validators' => [
                [
                    'name' => Validator\NotEmpty::class
                ],
                [
                    'name' => Validator\StringLength::class,
                    'options' => ['min' => 6, 'max' => 12],
                ],
            ],
        )));

        return $filter;
   }
}
