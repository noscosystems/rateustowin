<?php

    namespace application\components;

    use \Yii;
    use \CException;
    use application\components\auth\Filter as AccessControlFilter;

    /**
     * Controller
     *
     * Controller is the customized base controller class. All controller classes for this application should extend
     * from this base class.
     */
    abstract class Controller extends \CController
    {

        /**
         * @var string $layout
         * The default layout for the controller view.
         */
        public $layout = '//layouts/column1';

        /**
         * @var array $menu
         * Context menu items. This property will be assigned to CMenu::items.
         */
        public $menu = array();

        /**
         * @var array $breadcrumbs
         * The breadcrumbs of the current page. The value of this property will be assigned to CBreadcrumbs::links.
         */
        public $breadcrumbs = array();

        /**
         * Filter: Access Control
         *
         * @access public
         * @param CFilterChain $filterChain
         * @return void
         */
        public function filterAccessControl($filterChain)
        {
            // Make sure that the accessRules() method returns an array; we don't need to check if it exists because
            // it's defined in CController.
            if(!is_array($rules = $this->accessRules())) {
                return;
            }
            // Create a new instance of the custom AccessControlFilter class.
            $filter = new AccessControlFilter;
            // Assign to it the rules defined in the Controller.
            $filter->setRules($rules);
            // Run the filter and the rest in the chain.
            $filter->filter($filterChain);
        }

    }
