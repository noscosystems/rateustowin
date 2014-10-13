<?php

    /**
     * Access Rule
     *
     * AccessRule represents an access rule that is managed by AccessControlFilter.
     *
     * @author Zander Baldwin <mynameiszanders@gmail.com>
     * @package application.components
     */
    class AccessRule extends YiiAccessRule
    {

        /**
         * @var integer $priv
         * The minimum required user priviledge level.
         */
        public $priv;

        /**
         * Checks whether the Web user is allowed to perform the specified action.
         * @param CWebUser $user
         * @param CController $controller
         * @param CAction $action
         * @param string $ip
         * @param string $verb
         * @return integer
         */
        public function isUserAllowed($user, $controller, $action, $ip, $verb)
        {
            if(
                $this->isActionMatched($action)
             && $this->isUserMatched($user)
             && $this->isRoleMatched($user)
             && $this->isPrivMatched($user)
             && $this->isIpMatched($ip)
             && $this->isVerbMatched($verb)
             && $this->isControllerMatched($controller)
             && $this->isExpressionMatched($user)
            ) {
                return $this->allow ? 1 : -1;
            }
            else {
                return 0;
            }
        }

        /**
         * Is Privilege Level Matched?
         *
         * @access protected
         * @param WebUser $user
         * @return true
         */
        protected function isPrivMatched($user)
        {
            // Check if a privilege level has been set for this access rule.
            if(isset($this->priv) && is_int($this->priv)) {
                // Check if the user has been set a privilege level. If they haven't, set it to zero.
                $privilege = isset($user->priv) && preg_match('/^[1-9][0-9]*$/', $user->priv)
                    ? (int) $user->priv
                    : 0;
                // Check that the user has at least the required privilege level.
                return ($privilege >= $this->priv);
            }
            // Always return true so that this matching gets applied for the rule.
            return true;
        }

    }
