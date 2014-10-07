<?php

    class m130810_133917_default_admin_branch extends CDbMigration
    {

        /**
         * Migrate: Up
         *
         * @access public
         * @return void
         */
        public function up()
        {
            $this->insert('{{branches}}', array(
                'name'        => 'Admin Branch',
                'company'       => null,
                'address'       => '123 Fake Street',
                'postcode'      => 'AB12 3CD',
                'email'         => 'admin@system62.com',
                'active'        => 1,
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
            $this->delete('{{branches}}');
        }

    }
