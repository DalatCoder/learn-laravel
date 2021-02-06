<?php


namespace App\Components;


class Recursive
{
    private $data;
    private $htmlSelect;

    public function __construct($data)
    {
        $this->data = $data;
        $this->htmlSelect = '';
    }

    public function categoryRecursive($parent_id = null, $id = 0, $text = ''): string
    {
        foreach ($this->data as $value) {
            if ($value->parent_id == $id) {
                if (!empty($parent_id) && $value->id == $parent_id) {
                    $this->htmlSelect .= '<option selected value="' . $value->id . '">' . $text . $value->name . '</option>';
                } else {
                    $this->htmlSelect .= '<option value="' . $value->id . '">' . $text . $value->name . '</option>';
                }

                $this->categoryRecursive($parent_id, $value->id, $text . '--');
            }
        }

        return $this->htmlSelect;
    }
}



