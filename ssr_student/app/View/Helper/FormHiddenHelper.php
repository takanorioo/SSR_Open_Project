<?php
class FormHiddenHelper extends AppHelper {
    function set() {
        $html = NULL;
        if(!empty($this->request->data)) {
            foreach($this->request->data as $model_name => $items) {
                if(is_array($items)) {
                    foreach($items as $item_key => $item) {
                        if(!is_array($item)) {
                            $html .= '<input type="hidden" name="data[' . $model_name . '][' . $item_key . ']" value="' . h($item) . '" />' . "
                                ";
                        }else{
                            foreach($item as $item_array_key => $item_array) {
                                $html .= '<input type="hidden" name="data[' . $model_name . '][' . $item_key . '][' . $item_array_key . ']" value="' . h($item_array) . '" />';
                            }
                        }
                    }
                }
            }
        }

        return $html;
    }
}
?>
