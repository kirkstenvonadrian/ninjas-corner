<?php defined('SYSPATH') or die('No direct script access.');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Model_Applicant extends Jelly_Model
{
    public static function initialize(Jelly_Meta $meta)
    {
        $meta->table('applicants')
                ->fields(array(
                    'id'    =>  new Field_Primary(),
                    'user'  =>  new Field_BelongsTo(array('foreign' => 'user.id')),
                    'name'  =>  new Field_String(array(
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
