<?php

    namespace application\components\form;

    use \Yii;
    use \CException;

    /**
     * Active Form Widget
     *
     * @author      Zander Baldwin <mynameiszanders@gmail.com>
     * @link        https://github.com/mynameiszanders/yii-forms
     * @copyright   2013 Zander Baldwin
     * @license     MIT/X11 <http://j.mp/license>
     * @package     application.components
     */
    class Active extends \CActiveForm
    {

        /**
         * Render: Input Field
         *
         * @access public
         * @param \CForm $form
         * @param string $field
         * @param array $htmlOptions
         * @return string
         */
        public function input(\CForm $form, $attribute, $htmlOptions = array())
        {
            // Firstly, does the element with the specified field name exist?
            if(!isset($form->elements[$attribute])) {
                throw new CException(
                    is_string($attribute)
                        ? Yii::t('application', 'Invalid form element identifier "{element}" was passed to "application\\components\\Form.input()".', array('{element}' => $attribute))
                        : Yii::t('application', 'Invalid data type passed to "application\\components\\Form.input()". A string is required to identify a form element.')
                );
            }
            // Assign the $element variable the instance of the actual element, instead of just its string identifier.
            $element = $form->elements[$attribute];
            // If the element type maps to a method of CHtml, use that to render it.
            if(isset($element::$coreTypes[$element->type])) {
                $method = $element::$coreTypes[$element->type];
                // Merge the HTML options passed with the attributes set in the form configuration, this is also used to
                // override options in the form configuration on a per-theme basis.
                $htmlOptions = \CMap::mergeArray($element->attributes, $htmlOptions);
                // HACK: This isn't optimised. It's just a quick, dirty fix for an annoying problem.
                // See Issue (GitHub): mynameiszanders/chaser#17.
                if(in_array($element->type, array('date', 'time')) || in_array($method, array('activeDateField', 'activeTimeField'))) {
                    $this->convertTimestamp($form->model, $element->name, $element->type);
                }
                // Render element.
                return strpos($method, 'List') !== false
                    // If the method contains the word "List", then it means that it needs items to populate that list.
                    ? \CHtml::$method($form->model, $element->name, $element->items, $htmlOptions)
                    // Otherwise we can omit that requirement and skip items, jumping straight to the HTML options.
                    : \CHtml::$method($form->model, $element->name, $htmlOptions);
            }
            // If it doesn't map to a method of CHtml, then assume that the type specified is a widget to run.
            else {
                $element->attributes['htmlOptions'] = isset($element->attributes['htmlOptions'])
                    ? \CMap::mergeArray($element->attributes['htmlOptions'], $htmlOptions)
                    : $htmlOptions;
                $element->attributes['model'] = $form->model;
                $element->attributes['attribute'] = $element->name;
                ob_start();
                $form->getOwner()->widget($element->type, $element->attributes);
                return ob_get_clean();
            }
        }


        /**
         * Render: Button
         *
         * @access public
         * @param \CForm $form
         * @param string $button
         * @param array $htmlOptions
         * @return string
         */
        public function button(\CForm $form, $attribute, array $htmlOptions = array())
        {
            // Firstly, does the button with the specified name exist?
            if(!isset($form->buttons[$attribute])) {
                throw new CException(
                    is_string($attribute)
                        ? Yii::t('application', 'Invalid form button identifier "{button}" was passed to "application\\components\\Form.button()".', array('{button}' => $attribute))
                        : Yii::t('application', 'Invalid data type passed to "application\\components\\Form.button()". A string is required to identify a form button.')
                );
            }
            // Assign the $button variable the instance of the actual button, instead of just its string identifier.
            $button = $form->buttons[$attribute];
            // If the button type maps to a method of CHtml, use that to render it.
            if(isset($button::$coreTypes[$button->type])) {
                $method = $button::$coreTypes[$button->type];
                // Merge the HTML options passed with the attributes set in the form configuration, this is also used to
                // override options in the form configuration on a per-theme basis.
                $button->attributes = \CMap::mergeArray($button->attributes, $htmlOptions);
                switch($method) {
                    case 'linkButton':
                        $attributes['params'][$this->name] = isset($button->attributes['params'][$this->name])
                            ? $attributes['params'][$this->name]
                            : 1;
                        break;
                    case 'htmlButton':
                        switch($button->type) {
                            case 'htmlSubmit':
                                $button->attributes['type'] = 'submit';
                                break;
                            case 'htmlReset':
                                $button->attributes['type'] = 'reset';
                                break;
                            default:
                                $button->attributes['type'] = 'button';
                                break;
                        }
                        $button->attributes['name'] = $button->name;
                        break;
                    default:
                        $button->attributes['name'] = $button->name;
                }
                return $method === 'imageButton'
                    ? \CHtml::$method(isset($button->attributes['src']) ? $button->attributes['src'] : '', $button->attributes)
                    : \CHtml::$method($button->label, $button->attributes);
            }
            else {
                $button->attributes['htmlOptions'] = isset($button->attributes['htmlOptions'])
                    ? \CMap::mergeArray($button->attributes['htmlOptions'], $htmlOptions)
                    : $htmlOptions;
                $button->attributes['name'] = $button->name;
                ob_start();
                $form->getOwner()->widget($button->type, $button->attributes);
                return ob_get_clean();
            }
        }


        /**
         * Label
         *
         * A wrapper for CHtml::activeLabel(). It overrides the label() method in the parent class, CActiveForm, to
         * allow for form objects to be passed as well as form models.
         *
         * @access public
         * @param CForm|CModel $formModel
         * @param string $attribute
         * @param array $htmlOptions
         * @return string
         */
        public function label($formModel, $attribute, $htmlOptions = array())
        {
            if($formModel instanceof \CForm && isset($formModel->model) && $formModel->model instanceof \CModel) {
                $formModel = $formModel->model;
            }
            return parent::label($formModel, $attribute, $htmlOptions);
        }


        /**
         * Label (Extra)
         *
         * A wrapper for CHtml::activeLabelEx(). It overrides the labelEx() method in the parent class, CActiveForm, to
         * allow for form objects to be passed as well as form models.
         *
         * @access public
         * @param CForm|CModel $formModel
         * @param string $attribute
         * @param array $htmlOptions
         * @return string
         */
        public function labelEx($formModel, $attribute, $htmlOptions = array())
        {
            if($formModel instanceof \CForm && isset($formModel->model) && $formModel->model instanceof \CModel) {
                $formModel = $formModel->model;
            }
            return parent::labelEx($formModel, $attribute, $htmlOptions);
        }


        /**
         * Error
         *
         * A wrapper for the error() method in the parent class, CActiveForm, to allow for form objects to be passed as
         * well as form models. It also disabled the client and AJAX validation by default.
         *
         * @access public
         * @param CForm|CModel $formModel
         * @param string $attribute
         * @param array $htmlOptions
         * @param boolean $enableAjaxValidation
         * @param boolean $enableClientValidation
         * @return string
         */
        public function error($formModel, $attribute, $htmlOptions = array(), $enableAjaxValidation = false, $enableClientValidation = false)
        {
            if($formModel instanceof \CForm && isset($formModel->model) && $formModel->model instanceof \CModel) {
                $formModel = $formModel->model;
            }
            return parent::error($formModel, $attribute, $htmlOptions, $enableAjaxValidation, $enableClientValidation);
        }


        /**
         * Error Summary
         *
         * A wrapper for the errorSummary() method in the parent class, CActiveForm, to allow for form objects to be
         * passed as well as form models.
         *
         * @access public
         * @param CForm|CModel $formModel
         * @param string $header
         * @param string $footer
         * @param array $htmlOptions
         * @return string
         */
        public function errorSummary($formModel, $header = null, $footer = null, $htmlOptions = array())
        {
            if($formModel instanceof \CForm && isset($formModel->model) && $formModel->model instanceof \CModel) {
                $formModel = $formModel->model;
            }
            return parent::errorSummary($formModel, $header, $footer, $htmlOptions);
        }


        /**
         * Hint
         *
         * @access public
         * @param CForm $form
         * @param string $attribute
         * @param string $tag
         * @param array $htmlOptions
         * @return string
         */
        public function hint(\CForm $form, $attribute, $tag = null, $htmlOptions = array())
        {
            // Check that a hint exists for the form attribute specified. If one doesn't just return an empty string.
            // Only check the data type of the hint, and not the value. This allows for an empty string to be defined in
            // the form configuration to echo the hint tag (with HTML options), without the hint having any content.
            if(!isset($form->elements[$attribute]->hint) || !is_string($form->elements[$attribute]->hint)) {
                return '';
            }
            // Return the value of the hint, wrapping in a HTML tag if specified; raw text (on its own) otherwise.
            return is_string($tag)
                ? \CHtml::tag($tag, $htmlOptions, $form->elements[$attribute]->hint)
                : $form->elements[$attribute]->hint;
        }

        /**
         * Date Field
         *
         * Renders a date field for a model attribute (automatically converting timestamps into RFC3339 date format).
         * This method is a wrapper of `CHtml::activeDateField` which you should check for detailed information about
         * the parameters for this method.
         *
         * @access public
         * @param CModel $model
         * @param string $attribute
         * @param array $htmlOptions
         * @return string
         */
        public function dateField($model, $attribute, $htmlOptions = array())
        {
            $this->convertTimestamp($model, $attribute);
            return parent::dateField($model, $attribute, $htmlOptions);
        }


        /**
         * Time Field
         *
         * Renders a time field for a model attribute (automatically converting timestamps into RFC3339 date format).
         * This method is a wrapper of `CHtml::activeTimeField` which you should check for detailed information about
         * the parameters for this method.
         *
         * @access public
         * @param CModel $model
         * @param string $attribute
         * @param array $htmlOptions
         * @return string
         */
        public function timeField($model,$attribute,$htmlOptions=array())
        {
            $this->convertTimestamp($model, $attribute);
            return CHtml::activeTimeField($model,$attribute,$htmlOptions);
        }


        /**
         * Convert Timestamp
         *
         * If the model attribute is a timestamp (an integer), then convert it into RFC3339 format for use in HTML5's
         * date input field.
         *
         * @access public
         * @param CModel $model
         * @param string $attribute
         * @return void
         */
        public function convertTimestamp(\CModel $model, $attribute, $type = 'date')
        {
            if(isset($model->$attribute) && preg_match('/^(\\-?[1-9][0-9]*|0)$/', $model->$attribute)) {
                $model->$attribute = date($type == 'time' ? 'H:i' : 'Y-m-d', $model->$attribute);
            }
        }

    }
