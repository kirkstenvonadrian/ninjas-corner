<?php defined('SYSPATH') or die('No direct script access.');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Model_Employer extends Jelly_Model
{
    public static function initialize(Jelly_Meta $meta)
    {
        $meta->table('employers')
                ->fields(array(
                    'id'    =>  new Field_Primary(),
                    'user'  =>  new Field_BelongsTo(array('foreign' => 'user.id')),
                    'company'  =>  new Field_String(array(
                        'rules' => array(
                            'not_empty' => Null,),
                    )),
                    'description'  => new Field_Text(array(
                        'rules' => array(
                            'not_empty' => Null,),
                    )),
                    'website'  => new Field_String(),
                    'person'  => new Field_String(array(
                        'rules' => array(
                            'not_empty' => Null,),
                    )),
                    'address'  => new Field_String(array(
                        'rules' => array(
                            'not_empty' => Null,),
                    )),
                    'city'  => new Field_String(array(
                        'rules' => array(
                            'not_empty' => Null,),
                    )),
                    'zipcode'  => new Field_String(array(
                        'rules' => array(
                            'not_empty' => Null,),
                    )),
                    'country'  => new Field_String(array(
                        'rules' => array(
                            'not_empty' => Null,),
                    )),
                    'telephone'  => new Field_String(array(
                        'rules' => array(
                            'not_empty' => Null,),
                    )),
                ));
    }
}
?>
