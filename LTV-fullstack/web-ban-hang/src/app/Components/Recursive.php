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

    public function categoryRecursive($id = 0, $text = ''): string
    {
        foreach ($this->data as $value) {
            if ($value->parent_id == $id) {
                $this->htmlSelect .= '<option value="' . $value->id . '">' . $text . $value->name . '</option>';
                $this->categoryRecursive($value->id, $text . '--');
            }
        }

        return $this->htmlSelect;
    }
}



