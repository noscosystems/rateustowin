<?php

    class m131207_180002_admin_role extends CDbMigration
    {

        /**
         * Migrate: Up
         *
         * @access public
         * @return void
         */
        public function up()
        {
            // Administration Authorisation Item.
            $this->insert('{{auth_items}}', array(
                'id'    => 1,
                'name'  => 'admin',
                'type'  => \application\components\auth\Item::TYPE_ROLE,
            ));
            // Authorisation Assignment to Administrator.
            $this->insert('{{auth_assignments}}', array(
                'item'  => 1,
                'user'  => 1,
            ));
            $this->insert('{{auth_items}}', array(
                'id'    => 2,
                'name'  => 'access administration',
                'type'  => \application\components\auth\Item::TYPE_TASK,
            ));
            $this->insert('{{auth_hierarchy}}', array(
                'parent'    => 1,
                'child'     => 2,
            ));
        }

        /**
         * Migrate: Down
         *
         * @access public
         * @return void
         */
        public function down()
        {
            // Delete assignment.
            $this->delete(
                '{{auth_assignments}}',
                array('AND',
                    'user = :user',
                    'item = :item',
                ),
                array(
                    ':user' => 1,
                    ':item' => 1,
                )
            );
            // Delete Hierarchy.
            $this->delete(
                '{{auth_hierarchy}}',
                array('AND',
                    'parent = :parent',
                    'child = :child',
                ),
                array(
                    ':parent' => 1,
                    ':child' => 2,
                )
            );
            // Delete item.
            $this->delete(
                '{{auth_items}}',
                array('AND',
                    'item IN (:parent, :child)',
                ),
                array(
                    ':parent' => 1,
                    ':child' => 2,
                )
            );
        }

    }
