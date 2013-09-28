<?php
class QuestionnaireFormHelper extends FormHelper {
    function errorMessage() {
        $html = NULL;
        // get & show error message
        if (!empty($this->validationErrors) && !empty($this->validationErrors['Questionnaire'])) {
            $error_message = $this->validationErrors['Questionnaire'];
            $html .= '<p>';
                foreach($error_message AS $value) {
                    $html .= '<span class="red">' . h($value[0]) . '</span><br>';
                }
            $html .= '</p>';
        }
        if (!empty($form_info[0]['Questionnaire']['description'])) {
            $html .= '<p class="form_description">' . nl2br(h($form_info[0]['Questionnaire']['description'])) . '</p>';
        }
        return $html;
    }

    function flashEditContent($form_content) {
        $html = NULL;

        $html .= '<dl>';
        foreach ($form_content AS $row) {
            if ($row['QuestionnaireRow']['is_must']) {
                $html .= '<dt class="must">';
            } else {
                $html .= '<dt class="arbitrary">';
            }
            $html .= $row['QuestionnaireRow']['question'];
            $html .= '</dt>';
            $html .= '<dd>';
            foreach ($row['QuestionnaireElement'] AS $element) {
                if (!empty($element['prev_text'])) {
                    $html .= '<p class="note">' . h($element['prev_text']) . '</p>';
                }
                if ($element['type'] === '0') {
                    foreach ($element['QuestionnaireOption'] AS $option) {
                        $html .= $this->input("Questionnaire.{$row['QuestionnaireRow']['id']}.{$element['id']}.{$option['id']}", array('type' => 'text', 'class' => $element['class'], 'div' => false, 'label' => false, 'error' => false)) . '<br>';
                    }
                } else if ($element['type'] === '1') {
                    foreach ($element['QuestionnaireOption'] AS $option) {
                        $html .= $this->input("Questionnaire.{$row['QuestionnaireRow']['id']}.{$element['id']}.{$option['id']}", array('type' => 'textarea', 'class' => $element['class'], 'div' => false, 'label' => false, 'error' => false)) . '<br>';
                    }
                } else if ($element['type'] === '2') {
                    $html .= $this->input("Questionnaire.{$row['QuestionnaireRow']['id']}.{$element['id']}", array('type' => 'radio', 'class' => $element['class'], 'div' => false, 'legend' => false, 'error' => false, 'separator' => '<br>', 'options' => Set::classicExtract($element['QuestionnaireOption'], '{n}.value')));
                } else if ($element['type'] === '3') {
                    foreach ($element['QuestionnaireOption'] AS $option) {
                        $html .= $this->input("Questionnaire.{$row['QuestionnaireRow']['id']}.{$element['id']}.{$option['id']}", array('type' => 'checkbox', 'class' => $element['class'], 'div' => false,  'label' => false, 'error' => false));
                        $html .= '<label for="Questionnaire' . $row['QuestionnaireRow']['id'] . $element['id'] . $option['id'] . '">' . h($option['value']) . '</label><br>';
                    }
                } else if ($element['type'] === '4') {
                    $html .= $this->input("Questionnaire.{$row['QuestionnaireRow']['id']}.{$element['id']}", array('type' => 'select', 'class' => $element['class'], 'div' => false, 'label' => false, 'error' => false, 'options' => Set::classicExtract($element['QuestionnaireOption'], '{n}.value'))) . '<br>';
                }
                if (!empty($element['post_text'])) {
                    $html .= '<p class="note">' . h($element['post_text']) . '</p>';
                }
            }
            $html .= '</dd>';
        }
        $html .= '</dl>';
        return $html;
    }


    function flashConfirmContent($form_content) {
        $html = NULL;
        $html .= '<dl>';
        foreach ($form_content AS $row) {
            if ($row['QuestionnaireRow']['is_must']) {
                $html .= '<dt class="must">' . $row['QuestionnaireRow']['question'] . '</dt>';
            } else {
                $html .= '<dt class="arbitrary">' . $row['QuestionnaireRow']['question'] . '</dt>';
            }
            $html .= '<dd>';
            foreach ($row['QuestionnaireElement'] AS $element) {
                if (!empty($element['prev_text'])) {
                     $html .= '<strong>' . h($element['prev_text']) . '</strong><br>';
                }
                if ($element['type'] === '0') {
                    foreach ($element['QuestionnaireOption'] AS $option) {
                        $html .= $this->input("Questionnaire.{$row['QuestionnaireRow']['id']}.{$element['id']}.{$option['id']}", array('type' => 'hidden', 'value'=> $this->request->data['Questionnaire'][$row['QuestionnaireRow']['id']][$element['id']][$option['id']]));
                        $html .= h($this->request->data['Questionnaire'][$row['QuestionnaireRow']['id']][$element['id']][$option['id']]) . '<br><br>';
                    }
                } else if ($element['type'] === '1') {
                    foreach ($element['QuestionnaireOption'] AS $option) {
                        $html .= $this->input("Questionnaire.{$row['QuestionnaireRow']['id']}.{$element['id']}.{$option['id']}", array('type' => 'hidden', 'value'=> $this->request->data['Questionnaire'][$row['QuestionnaireRow']['id']][$element['id']][$option['id']]));
                        $html .= h($this->request->data['Questionnaire'][$row['QuestionnaireRow']['id']][$element['id']][$option['id']]) . '<br><br>';
                    }
                } else if ($element['type'] === '2') {
                    foreach ($element['QuestionnaireOption'] AS $option_key => $option) {
                        if ($this->request->data['Questionnaire'][$row['QuestionnaireRow']['id']][$element['id']] == $option_key) {
                            $html .= $this->input("Questionnaire.{$row['QuestionnaireRow']['id']}.{$element['id']}", array('type' => 'hidden', 'value'=> $this->request->data['Questionnaire'][$row['QuestionnaireRow']['id']][$element['id']]));
                            $html .= '・' . h($option['value']) . '<br>';
                        }
                    }
                } else if ($element['type'] === '3') {
                    foreach ($element['QuestionnaireOption'] AS $option) {
                        if ($this->request->data['Questionnaire'][$row['QuestionnaireRow']['id']][$element['id']][$option['id']] === '1') {
                            $html .= $this->input("Questionnaire.{$row['QuestionnaireRow']['id']}.{$element['id']}.{$option['id']}", array('type' => 'hidden', 'value'=> $this->request->data['Questionnaire'][$row['QuestionnaireRow']['id']][$element['id']][$option['id']]));
                            $html .= '・' . h($option['value']) . '<br>';
                        }
                    }
                } else if ($element['type'] === '4') {
                    foreach ($element['QuestionnaireOption'] AS $option_key => $option) {
                        if ($this->request->data['Questionnaire'][$row['QuestionnaireRow']['id']][$element['id']] == $option_key) {
                            $html .= $this->input("Questionnaire.{$row['QuestionnaireRow']['id']}.{$element['id']}.{$option['id']}", array('type' => 'hidden', 'value'=> $this->request->data['Questionnaire'][$row['QuestionnaireRow']['id']][$element['id']]));
                            $html .= '・' . h($option['value']) . '<br>';
                        }
                    }
                }
            }
            $html .= '</dd>';
        }
        $html .= '</dl>';
        return $html;
    }

}
?>
