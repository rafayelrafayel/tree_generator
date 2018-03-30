<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TreeBuilder
 *
 * @author Developer
 */

namespace app\helpers;

class TreeBuilder
{

    public static function bulid($data)
    {
        static $counter = 0;
         ++$counter;
        $treeContent = '';
        if ($data && !empty($data)) {
            $treeContent = "<ul class='folder-container' id='id_".$counter."'>";
            foreach ($data as $each) {

                if (isset($each['children'])) {
                    $treeContent .= '<li>'.self::getCheckBoxTemplate($each['name']);
                    $treeContent .= self::bulid($each['children']);
                    $treeContent .= '</li>';
                } else if (!isset($each['children'])) {
                    $treeContent .= '<li >'.self::getCheckBoxTemplate($each['name']).'</li>';
                }
            }

            $treeContent .= "</ul>";
        }
        return $treeContent;
    }

    private static function getCheckBoxTemplate($label)
    {
        return '<input class="checkbox-node-class" type="checkbox" name="selectedRole">
                                       '.$label;
       /* '<div class="checkbox">
                    <label>
                     <input class="checkbox-node-class" type="checkbox" value="">
                     <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                     '.$label.'
                     </label>
                  </div>';*/
    }
}